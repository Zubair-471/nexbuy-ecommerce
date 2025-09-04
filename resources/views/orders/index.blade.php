@extends('layouts.app')

@section('title', 'My Orders - NexBuy')
@section('meta_description', 'View your order history and track your purchases at NexBuy.')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-gray-50 to-gray-100 dark:from-gray-900 dark:to-gray-800">
    <!-- Header -->
    <div class="bg-white dark:bg-gray-900 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-3xl font-bold text-gray-900 dark:text-white">My Orders</h1>
                    <p class="text-gray-600 dark:text-gray-400 mt-2">Track your order history and status</p>
                </div>
                <a href="{{ route('home') }}" class="inline-flex items-center text-blue-600 hover:text-blue-700 dark:text-blue-400 dark:hover:text-blue-300 font-medium">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Back to Home
                </a>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        @if($orders->count() > 0)
            <div class="space-y-6">
                @foreach($orders as $order)
                    <div class="bg-white dark:bg-gray-900 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700">
                        <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center space-x-4">
                                    <div class="w-12 h-12 bg-blue-100 dark:bg-blue-900 rounded-lg flex items-center justify-center">
                                        <svg class="w-6 h-6 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                            Order #{{ $order->order_number }}
                                        </h3>
                                        <p class="text-sm text-gray-500 dark:text-gray-400">
                                            Placed on {{ $order->created_at->format('M d, Y \a\t g:i A') }}
                                        </p>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <p class="text-lg font-semibold text-gray-900 dark:text-white">
                                        ${{ number_format($order->total, 2) }}
                                    </p>
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                        @if($order->status === 'completed') bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200
                                        @elseif($order->status === 'processing') bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200
                                        @elseif($order->status === 'shipped') bg-purple-100 text-purple-800 dark:bg-purple-900 dark:text-purple-200
                                        @elseif($order->status === 'cancelled') bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200
                                        @else bg-gray-100 text-gray-800 dark:bg-gray-900 dark:text-gray-200 @endif">
                                        {{ ucfirst($order->status) }}
                                    </span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="p-6">
                            <!-- Order Items -->
                            <div class="space-y-4 mb-6">
                                @foreach($order->items as $item)
                                    <div class="flex items-center space-x-4">
                                        <img src="{{ $item->product->featured_image_url ?? asset('images/placeholder.jpg') }}" 
                                             alt="{{ $item->product->name }}"
                                             class="w-16 h-16 object-cover rounded-lg">
                                        <div class="flex-1 min-w-0">
                                            <h4 class="text-sm font-medium text-gray-900 dark:text-white">
                                                {{ $item->product->name }}
                                            </h4>
                                            <p class="text-sm text-gray-500 dark:text-gray-400">
                                                Qty: {{ $item->quantity }} • ${{ number_format($item->price, 2) }} each
                                            </p>
                                        </div>
                                        <p class="text-sm font-medium text-gray-900 dark:text-white">
                                            ${{ number_format($item->price * $item->quantity, 2) }}
                                        </p>
                                    </div>
                                @endforeach
                            </div>
                            
                            <!-- Order Summary -->
                            <div class="border-t border-gray-200 dark:border-gray-700 pt-4">
                                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-sm">
                                    <div>
                                        <p class="text-gray-500 dark:text-gray-400">Subtotal</p>
                                        <p class="font-medium text-gray-900 dark:text-white">${{ number_format($order->subtotal, 2) }}</p>
                                    </div>
                                    <div>
                                        <p class="text-gray-500 dark:text-gray-400">Shipping</p>
                                        <p class="font-medium text-gray-900 dark:text-white">${{ number_format($order->shipping_cost, 2) }}</p>
                                    </div>
                                    <div>
                                        <p class="text-gray-500 dark:text-gray-400">Total</p>
                                        <p class="font-semibold text-gray-900 dark:text-white">${{ number_format($order->total, 2) }}</p>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Actions -->
                            <div class="flex items-center justify-between mt-6 pt-4 border-t border-gray-200 dark:border-gray-700">
                                <div class="flex items-center space-x-4">
                                    <a href="{{ route('orders.show', $order) }}" class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-lg transition-colors duration-200">
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                        </svg>
                                        View Details
                                    </a>
                                    @if($order->status === 'completed')
                                        <a href="#" class="inline-flex items-center px-4 py-2 border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 text-sm font-medium rounded-lg hover:bg-gray-50 dark:hover:bg-gray-800 transition-colors duration-200">
                                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                                            </svg>
                                            Write Review
                                        </a>
                                    @endif
                                </div>
                                <div class="text-sm text-gray-500 dark:text-gray-400">
                                    {{ $order->items->count() }} item{{ $order->items->count() !== 1 ? 's' : '' }}
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            
            <!-- Pagination -->
            @if($orders->hasPages())
                <div class="mt-8 flex justify-center">
                    {{ $orders->links() }}
                </div>
            @endif
        @else
            <!-- Empty State -->
            <div class="text-center py-16">
                <div class="mx-auto w-24 h-24 bg-gray-200 dark:bg-gray-700 rounded-full flex items-center justify-center mb-6">
                    <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                    </svg>
                </div>
                <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4">
                    No orders yet
                </h2>
                <p class="text-gray-600 dark:text-gray-400 mb-8 max-w-md mx-auto">
                    Start shopping to see your order history here. Your completed orders will appear in this list.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('products.index') }}" class="inline-flex items-center px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition-colors duration-200">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                        Start Shopping
                    </a>
                    <a href="{{ route('home') }}" class="inline-flex items-center px-6 py-3 border-2 border-blue-600 text-blue-600 hover:bg-blue-600 hover:text-white font-medium rounded-lg transition-colors duration-200">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                        </svg>
                        Back to Home
                    </a>
                </div>
            </div>
        @endif
    </div>
</div>
@endsection
