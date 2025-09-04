<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = auth()->user()->cart;
        $addresses = auth()->user()->addresses;
        
        if ($cart->items->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty.');
        }

        return view('checkout.index', compact('cart', 'addresses'));
    }

    public function placeOrder(Request $request)
    {
        $request->validate([
            'shipping_address' => 'required|array',
            'billing_address' => 'nullable|array',
            'payment_method' => 'required|in:cod,card',
        ]);

        $cart = auth()->user()->cart;
        
        if ($cart->items->isEmpty()) {
            return back()->with('error', 'Your cart is empty.');
        }

        // Check stock availability
        foreach ($cart->items as $item) {
            $product = $item->product;
            if ($product->stock < $item->quantity) {
                return back()->withErrors(['stock' => "Product '{$product->name}' has insufficient stock. Available: {$product->stock}, Requested: {$item->quantity}"]);
            }
        }

        // Calculate totals
        $subtotal = $cart->subtotal;
        $coupon = null;
        $discount = 0;

        if (session('applied_coupon')) {
            $coupon = \App\Models\Coupon::find(session('applied_coupon'));
            if ($coupon && $coupon->isValid()) {
                $discount = $coupon->calculateDiscount($subtotal);
            }
        }

        $tax = ($subtotal - $discount) * 0.1; // 10% tax
        $shipping = ($subtotal - $discount) > 50 ? 0 : 10; // Free shipping over $50
        $total = $subtotal - $discount + $tax + $shipping;

        // Create order
        $order = \App\Models\Order::create([
            'user_id' => auth()->id(),
            'order_number' => 'ORD-' . strtoupper(uniqid()),
            'status' => 'pending',
            'payment_status' => 'pending',
            'subtotal' => $subtotal,
            'discount' => $discount,
            'discount_amount' => $discount,
            'tax_amount' => $tax,
            'shipping_amount' => $shipping,
            'total_amount' => $total,
            'shipping_address' => $request->shipping_address['address'] ?? '',
            'shipping_city' => $request->shipping_address['city'] ?? '',
            'shipping_state' => $request->shipping_address['state'] ?? '',
            'shipping_zip_code' => $request->shipping_address['zip_code'] ?? '',
            'shipping_country' => $request->shipping_address['country'] ?? '',
            'payment_method' => $request->payment_method,
        ]);

        // Create order items
        foreach ($cart->items as $item) {
            \App\Models\OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item->product_id,
                'name' => $item->product->name,
                'sku' => $item->product->sku,
                'price' => $item->price_at_added,
                'quantity' => $item->quantity,
                'line_total' => $item->line_total,
            ]);

            // Update inventory
            $item->product->decrement('stock', $item->quantity);
        }

        // Create status event
        \App\Models\OrderStatusEvent::create([
            'order_id' => $order->id,
            'status' => 'pending',
            'note' => 'Order placed',
            'created_at' => now(),
        ]);

        // Clear cart
        $cart->items()->delete();
        session()->forget('applied_coupon');

        return redirect()->route('orders.show', $order->code)
            ->with('success', 'Order placed successfully!');
    }
}
