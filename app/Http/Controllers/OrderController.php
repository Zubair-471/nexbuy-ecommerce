<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = auth()->user()->orders()
            ->with(['items.productVariant.product'])
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('orders.index', compact('orders'));
    }

    public function show($orderNumber)
    {
        $order = auth()->user()->orders()
            ->with(['items.product', 'statusEvents'])
            ->where('order_number', $orderNumber)
            ->firstOrFail();

        return view('orders.show', compact('order'));
    }

    public function status($orderNumber)
    {
        $order = auth()->user()->orders()
            ->with(['statusEvents'])
            ->where('order_number', $orderNumber)
            ->firstOrFail();

        return response()->json([
            'status' => $order->status,
            'events' => $order->statusEvents->map(function ($event) {
                return [
                    'status' => $event->status,
                    'note' => $event->note,
                    'created_at' => $event->created_at->format('M d, Y H:i'),
                ];
            }),
        ]);
    }
}
