<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\AdminController;
use App\Models\Order;
use App\Models\OrderStatusEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends AdminController
{
    public function index(Request $request)
    {
        $query = Order::with(['user', 'items.product'])
            ->withCount('items');

        // Search functionality
        if ($request->filled('search')) {
            $query->where(function($q) use ($request) {
                $q->where('order_number', 'like', "%{$request->search}%")
                  ->orWhereHas('user', function($userQuery) use ($request) {
                      $userQuery->where('name', 'like', "%{$request->search}%")
                               ->orWhere('email', 'like', "%{$request->search}%");
                  });
            });
        }

        // Status filter
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Date range filter
        if ($request->filled('date_from')) {
            $query->whereDate('created_at', '>=', $request->date_from);
        }
        if ($request->filled('date_to')) {
            $query->whereDate('created_at', '<=', $request->date_to);
        }

        // Amount range filter
        if ($request->filled('amount_min')) {
            $query->where('total_amount', '>=', $request->amount_min);
        }
        if ($request->filled('amount_max')) {
            $query->where('total_amount', '<=', $request->amount_max);
        }

        $orders = $query->latest()->paginate(15);

        // Get order statistics
        $stats = [
            'total_orders' => Order::count(),
            'pending_orders' => Order::where('status', 'pending')->count(),
            'processing_orders' => Order::where('status', 'processing')->count(),
            'completed_orders' => Order::where('status', 'completed')->count(),
            'cancelled_orders' => Order::where('status', 'cancelled')->count(),
            'total_revenue' => Order::where('status', 'completed')->sum('total_amount'),
        ];

        return view('admin.orders.index', compact('orders', 'stats'));
    }

    public function show(Order $order)
    {
        $order->load(['user', 'items.product', 'statusEvents.user', 'address']);
        return view('admin.orders.show', compact('order'));
    }

    public function edit(Order $order)
    {
        $order->load(['user', 'items.product', 'statusEvents.user', 'address']);
        return view('admin.orders.edit', compact('order'));
    }

    public function update(Request $request, Order $order)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,processing,shipped,delivered,completed,cancelled,refunded',
            'notes' => 'nullable|string',
            'tracking_number' => 'nullable|string|max:255',
            'shipping_date' => 'nullable|date',
            'delivery_date' => 'nullable|date',
        ]);

        $oldStatus = $order->status;
        $order->update($validated);

        // Create status event if status changed
        if ($oldStatus !== $validated['status']) {
            OrderStatusEvent::create([
                'order_id' => $order->id,
                'status' => $validated['status'],
                'note' => $validated['notes'] ?? null,
                'created_at' => now(),
            ]);
        }

        return redirect()->route('admin.orders.show', $order)
            ->with('success', 'Order updated successfully.');
    }

    public function destroy(Order $order)
    {
        // Only allow deletion of cancelled orders
        if ($order->status !== 'cancelled') {
            return redirect()->route('admin.orders.index')
                ->with('error', 'Only cancelled orders can be deleted.');
        }

        $order->delete();

        return redirect()->route('admin.orders.index')
            ->with('success', 'Order deleted successfully.');
    }

    public function bulkAction(Request $request)
    {
        $request->validate([
            'action' => 'required|in:delete,update_status',
            'orders' => 'required|array',
            'orders.*' => 'exists:orders,id',
            'status' => 'required_if:action,update_status|in:pending,processing,shipped,delivered,completed,cancelled,refunded'
        ]);

        $orders = Order::whereIn('id', $request->orders);

        switch ($request->action) {
            case 'delete':
                // Only allow deletion of cancelled orders
                $orders->where('status', 'cancelled')->delete();
                $message = 'Cancelled orders deleted successfully.';
                break;
            case 'update_status':
                $orders->update(['status' => $request->status]);
                $message = 'Order statuses updated successfully.';
                break;
        }

        return redirect()->route('admin.orders.index')->with('success', $message);
    }

    public function updateStatus(Request $request, Order $order)
    {
        $request->validate([
            'status' => 'required|in:pending,processing,shipped,delivered,completed,cancelled,refunded',
            'notes' => 'nullable|string',
            'tracking_number' => 'nullable|string|max:255',
        ]);

        $oldStatus = $order->status;
        $order->update(['status' => $request->status]);

        // Create status event
        OrderStatusEvent::create([
            'order_id' => $order->id,
            'status' => $request->status,
            'note' => $request->notes,
            'created_at' => now(),
        ]);

        return $this->successResponse('Order status updated successfully', [
            'status' => $order->status,
            'status_event' => $order->statusEvents()->latest()->first()
        ]);
    }

    public function export(Request $request)
    {
        $query = Order::with(['user', 'items.product']);

        // Apply filters
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }
        if ($request->filled('date_from')) {
            $query->whereDate('created_at', '>=', $request->date_from);
        }
        if ($request->filled('date_to')) {
            $query->whereDate('created_at', '<=', $request->date_to);
        }

        $orders = $query->get();

        // Generate CSV
        $filename = 'orders_' . date('Y-m-d_H-i-s') . '.csv';
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
        ];

        $callback = function() use ($orders) {
            $file = fopen('php://output', 'w');
            
            // CSV headers
            fputcsv($file, [
                'Order ID', 'Order Number', 'Customer', 'Email', 'Status', 
                'Total Amount', 'Items Count', 'Created Date', 'Updated Date'
            ]);

            foreach ($orders as $order) {
                fputcsv($file, [
                    $order->id,
                    $order->order_number,
                    $order->user->name,
                    $order->user->email,
                    $order->status,
                    $order->total_amount,
                    $order->items->count(),
                    $order->created_at->format('Y-m-d H:i:s'),
                    $order->updated_at->format('Y-m-d H:i:s'),
                ]);
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}
