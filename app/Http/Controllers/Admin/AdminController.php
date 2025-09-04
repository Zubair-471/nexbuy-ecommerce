<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Models\User;
use App\Models\Product;
use App\Models\Order;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Get dashboard statistics.
     */
    protected function getStats(): array
    {
        try {
            $stats = [
                'total_users' => User::count(),
                'total_products' => Product::count(),
                'total_orders' => Order::count(),
                'total_revenue' => Order::where('status', 'completed')->sum('total_amount'),
                'pending_orders' => Order::where('status', 'pending')->count(),
                'low_stock_products' => Product::where('stock', '<', 10)->count(),
                'orders_growth' => $this->calculateGrowth('orders'),
                'revenue_growth' => $this->calculateGrowth('revenue'),
                'active_products' => Product::where('status', 'active')->count(),
            ];

            return $stats;
        } catch (\Exception $e) {
            // Return default stats if there's an error
            return [
                'total_users' => 0,
                'total_products' => 0,
                'total_orders' => 0,
                'total_revenue' => 0,
                'pending_orders' => 0,
                'low_stock_products' => 0,
                'orders_growth' => 0,
                'revenue_growth' => 0,
                'active_products' => 0,
            ];
        }
    }

    /**
     * Calculate growth percentage for orders and revenue.
     */
    protected function calculateGrowth($type): int
    {
        try {
            $currentPeriod = now()->subDays(30);
            $previousPeriod = now()->subDays(60)->subDays(30);

            if ($type === 'orders') {
                $current = Order::where('created_at', '>=', $currentPeriod)->count();
                $previous = Order::where('created_at', '>=', $previousPeriod)
                    ->where('created_at', '<', $currentPeriod)
                    ->count();
            } else { // revenue
                $current = Order::where('status', 'completed')
                    ->where('created_at', '>=', $currentPeriod)
                    ->sum('total_amount');
                $previous = Order::where('status', 'completed')
                    ->where('created_at', '>=', $previousPeriod)
                    ->where('created_at', '<', $currentPeriod)
                    ->sum('total_amount');
            }

            if ($previous == 0) {
                return $current > 0 ? 100 : 0;
            }

            return round((($current - $previous) / $previous) * 100);
        } catch (\Exception $e) {
            return 0;
        }
    }

    /**
     * Return a successful JSON response.
     */
    protected function successResponse(string $message = 'Operation completed successfully', $data = null, int $status = 200): JsonResponse
    {
        return response()->json([
            'success' => true,
            'message' => $message,
            'data' => $data
        ], $status);
    }

    /**
     * Return an error JSON response.
     */
    protected function errorResponse(string $message = 'An error occurred', $errors = null, int $status = 422): JsonResponse
    {
        return response()->json([
            'success' => false,
            'message' => $message,
            'errors' => $errors
        ], $status);
    }

    /**
     * Validate request and return validated data.
     */
    protected function validateRequest(Request $request, array $rules): array
    {
        return $request->validate($rules);
    }

    /**
     * Get paginated results with search and filters.
     */
    protected function getPaginatedResults($query, Request $request, int $perPage = 15)
    {
        // Search functionality
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('id', 'like', "%{$search}%");
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

        // Sort
        $sortBy = $request->get('sort_by', 'created_at');
        $sortDirection = $request->get('sort_direction', 'desc');
        
        return $query->orderBy($sortBy, $sortDirection)->paginate($perPage);
    }
}
