@extends('layouts.admin')

@section('title', 'Order Details')

@section('content')
<div class="space-y-8">
    <!-- Header -->
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Order #{{ $order->order_number }}</h1>
            <p class="text-gray-600 dark:text-gray-400 mt-2">
                Placed on {{ $order->created_at->format('M d, Y \a\t g:i A') }}
            </p>
        </div>
        <div class="flex items-center space-x-3">
            <a href="{{ route('admin.orders.edit', $order) }}" class="admin-btn admin-btn-primary">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                </svg>
                Edit Order
            </a>
            <a href="{{ route('admin.orders.index') }}" class="admin-btn admin-btn-secondary">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Back to Orders
            </a>
        </div>
    </div>

    <!-- Order Status Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="admin-card">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-blue-100 dark:bg-blue-900/20">
                    <svg class="w-6 h-6 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <div class="ml-4">
                    <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400">Order Status</h3>
                    <p class="text-lg font-semibold text-gray-900 dark:text-white">{{ ucfirst($order->status) }}</p>
                </div>
            </div>
        </div>

        <div class="admin-card">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-green-100 dark:bg-green-900/20">
                    <svg class="w-6 h-6 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
                    </svg>
                </div>
                <div class="ml-4">
                    <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400">Payment Status</h3>
                    <p class="text-lg font-semibold text-gray-900 dark:text-white">{{ ucfirst($order->payment_status) }}</p>
                </div>
            </div>
        </div>

        <div class="admin-card">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-purple-100 dark:bg-purple-900/20">
                    <svg class="w-6 h-6 text-purple-600 dark:text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                    </svg>
                </div>
                <div class="ml-4">
                    <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400">Total Amount</h3>
                    <p class="text-lg font-semibold text-gray-900 dark:text-white">${{ number_format($order->total_amount, 2) }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Customer Information -->
        <div class="lg:col-span-1">
            <div class="admin-card">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Customer Information</h3>
                <div class="space-y-3">
                    <div>
                        <label class="text-sm font-medium text-gray-500 dark:text-gray-400">Name</label>
                        <p class="text-gray-900 dark:text-white">{{ $order->customer_name }}</p>
                    </div>
                    <div>
                        <label class="text-sm font-medium text-gray-500 dark:text-gray-400">Email</label>
                        <p class="text-gray-900 dark:text-white">{{ $order->customer_email }}</p>
                    </div>
                    <div>
                        <label class="text-sm font-medium text-gray-500 dark:text-gray-400">Phone</label>
                        <p class="text-gray-900 dark:text-white">{{ $order->customer_phone ?? 'N/A' }}</p>
                    </div>
                    @if($order->user)
                    <div>
                        <label class="text-sm font-medium text-gray-500 dark:text-gray-400">User Account</label>
                        <p class="text-gray-900 dark:text-white">{{ $order->user->name }}</p>
                    </div>
                    @endif
                </div>
            </div>

            <!-- Shipping Information -->
            <div class="admin-card mt-6">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Shipping Information</h3>
                <div class="space-y-3">
                    <div>
                        <label class="text-sm font-medium text-gray-500 dark:text-gray-400">Address</label>
                        <p class="text-gray-900 dark:text-white">{{ $order->shipping_address }}</p>
                    </div>
                    <div>
                        <label class="text-sm font-medium text-gray-500 dark:text-gray-400">City</label>
                        <p class="text-gray-900 dark:text-white">{{ $order->shipping_city }}</p>
                    </div>
                    <div>
                        <label class="text-sm font-medium text-gray-500 dark:text-gray-400">State</label>
                        <p class="text-gray-900 dark:text-white">{{ $order->shipping_state }}</p>
                    </div>
                    <div>
                        <label class="text-sm font-medium text-gray-500 dark:text-gray-400">ZIP Code</label>
                        <p class="text-gray-900 dark:text-white">{{ $order->shipping_zip_code }}</p>
                    </div>
                    <div>
                        <label class="text-sm font-medium text-gray-500 dark:text-gray-400">Country</label>
                        <p class="text-gray-900 dark:text-white">{{ $order->shipping_country }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Order Items -->
        <div class="lg:col-span-2">
            <div class="admin-card">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Order Items</h3>
                <div class="overflow-hidden">
                    <table class="admin-table">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($order->items ?? [] as $item)
                            <tr>
                                <td>
                                    <div class="flex items-center">
                                        @if($item->product && $item->product->featured_image_url)
                                        <img src="{{ $item->product->featured_image_url }}" alt="{{ $item->product->name }}" class="w-10 h-10 rounded object-cover mr-3">
                                        @endif
                                        <div>
                                            <p class="font-medium text-gray-900 dark:text-white">{{ $item->product->name ?? 'Product Not Found' }}</p>
                                            @if($item->product)
                                            <p class="text-sm text-gray-500 dark:text-gray-400">SKU: {{ $item->product->sku ?? 'N/A' }}</p>
                                            @endif
                                        </div>
                                    </div>
                                </td>
                                <td class="text-gray-900 dark:text-white">${{ number_format($item->price, 2) }}</td>
                                <td class="text-gray-900 dark:text-white">{{ $item->quantity }}</td>
                                <td class="text-gray-900 dark:text-white">${{ number_format($item->price * $item->quantity, 2) }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="text-center text-gray-500 dark:text-gray-400 py-4">No items found</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Order Summary -->
                <div class="mt-6 border-t border-gray-200 dark:border-gray-700 pt-6">
                    <div class="space-y-2">
                        <div class="flex justify-between">
                            <span class="text-gray-600 dark:text-gray-400">Subtotal:</span>
                            <span class="text-gray-900 dark:text-white">${{ number_format($order->subtotal ?? 0, 2) }}</span>
                        </div>
                        @if($order->tax_amount > 0)
                        <div class="flex justify-between">
                            <span class="text-gray-600 dark:text-gray-400">Tax:</span>
                            <span class="text-gray-900 dark:text-white">${{ number_format($order->tax_amount, 2) }}</span>
                        </div>
                        @endif
                        @if($order->shipping_amount > 0)
                        <div class="flex justify-between">
                            <span class="text-gray-600 dark:text-gray-400">Shipping:</span>
                            <span class="text-gray-900 dark:text-white">${{ number_format($order->shipping_amount, 2) }}</span>
                        </div>
                        @endif
                        @if($order->discount_amount > 0)
                        <div class="flex justify-between">
                            <span class="text-gray-600 dark:text-gray-400">Discount:</span>
                            <span class="text-gray-900 dark:text-white">-${{ number_format($order->discount_amount, 2) }}</span>
                        </div>
                        @endif
                        <div class="flex justify-between text-lg font-semibold border-t border-gray-200 dark:border-gray-700 pt-2">
                            <span class="text-gray-900 dark:text-white">Total:</span>
                            <span class="text-gray-900 dark:text-white">${{ number_format($order->total_amount, 2) }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Order Notes -->
            @if($order->notes)
            <div class="admin-card mt-6">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Order Notes</h3>
                <p class="text-gray-700 dark:text-gray-300">{{ $order->notes }}</p>
            </div>
            @endif

            <!-- Order Timeline -->
            <div class="admin-card mt-6">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Order Timeline</h3>
                <div class="space-y-4">
                    <div class="flex items-start">
                        <div class="flex-shrink-0">
                            <div class="w-8 h-8 bg-green-100 dark:bg-green-900/20 rounded-full flex items-center justify-center">
                                <svg class="w-4 h-4 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-900 dark:text-white">Order Placed</p>
                            <p class="text-sm text-gray-500 dark:text-gray-400">{{ $order->created_at->format('M d, Y \a\t g:i A') }}</p>
                        </div>
                    </div>

                    @if($order->updated_at != $order->created_at)
                    <div class="flex items-start">
                        <div class="flex-shrink-0">
                            <div class="w-8 h-8 bg-blue-100 dark:bg-blue-900/20 rounded-full flex items-center justify-center">
                                <svg class="w-4 h-4 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-900 dark:text-white">Order Updated</p>
                            <p class="text-sm text-gray-500 dark:text-gray-400">{{ $order->updated_at->format('M d, Y \a\t g:i A') }}</p>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
