@extends('layouts.app')

@section('title', 'Shopping Cart - NexBuy')
@section('meta_description', 'Review your shopping cart items, update quantities, and proceed to checkout at NexBuy.')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-gray-50 to-gray-100 dark:from-gray-900 dark:to-gray-800">
    <!-- Header -->
    <div class="bg-white dark:bg-gray-900 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Shopping Cart</h1>
                    <p class="text-gray-600 dark:text-gray-400 mt-2">Review your items and proceed to checkout</p>
                </div>
                <a href="{{ route('products.index') }}" class="inline-flex items-center text-blue-600 hover:text-blue-700 dark:text-blue-400 dark:hover:text-blue-300 font-medium">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    Continue Shopping
                </a>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        @if($cart && $cart->items->count() > 0)
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Cart Items -->
                <div class="lg:col-span-2">
                    <div class="bg-white dark:bg-gray-900 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700">
                        <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                            <h2 class="text-xl font-semibold text-gray-900 dark:text-white">
                                Cart Items ({{ $cart->items->count() }})
                            </h2>
                        </div>
                        
                        <div class="divide-y divide-gray-200 dark:divide-gray-700">
                            @foreach($cart->items as $item)
                                <div class="p-6">
                                    <div class="flex items-center space-x-4">
                                        <!-- Product Image -->
                                        <div class="flex-shrink-0">
                                            <img src="{{ $item->product->featured_image_url ?? asset('images/placeholder.jpg') }}" 
                                                 alt="{{ $item->product->name }}"
                                                 class="w-20 h-20 object-cover rounded-lg">
                                        </div>
                                        
                                        <!-- Product Details -->
                                        <div class="flex-1 min-w-0">
                                            <div class="flex items-center justify-between">
                                                <div>
                                                    <h3 class="text-lg font-medium text-gray-900 dark:text-white">
                                                        <a href="{{ route('products.show', $item->product) }}" class="hover:text-blue-600 dark:hover:text-blue-400">
                                                            {{ $item->product->name }}
                                                        </a>
                                                    </h3>
                                                    <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">
                                                        SKU: {{ $item->product->sku }}
                                                    </p>
                                                </div>
                                                
                                                <!-- Price -->
                                                <div class="text-right">
                                                    <p class="text-lg font-semibold text-gray-900 dark:text-white">
                                                        ${{ number_format($item->price, 2) }}
                                                    </p>
                                                </div>
                                            </div>
                                            
                                            <!-- Quantity and Actions -->
                                            <div class="flex items-center justify-between mt-4">
                                                <form action="{{ route('cart.update', $item->id) }}" method="POST" class="flex items-center space-x-3">
                                                    @csrf
                                                    @method('PATCH')
                                                    <label class="text-sm font-medium text-gray-700 dark:text-gray-300">Quantity:</label>
                                                    <div class="flex items-center border border-gray-300 dark:border-gray-600 rounded-lg">
                                                        <button type="button" onclick="updateQuantity({{ $item->id }}, -1)" class="px-3 py-1 text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
                                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"></path>
                                                            </svg>
                                                        </button>
                                                        <input type="number" name="quantity" value="{{ $item->quantity }}" min="1" max="99" class="w-16 px-2 py-1 text-center text-gray-900 dark:text-white bg-transparent border-0 focus:ring-0">
                                                        <button type="button" onclick="updateQuantity({{ $item->id }}, 1)" class="px-3 py-1 text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
                                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                                            </svg>
                                                        </button>
                                                    </div>
                                                    <button type="submit" class="text-blue-600 hover:text-blue-700 dark:text-blue-400 dark:hover:text-blue-300 font-medium text-sm">
                                                        Update
                                                    </button>
                                                </form>
                                                
                                                <!-- Remove Button -->
                                                <form action="{{ route('cart.remove', $item->id) }}" method="POST" class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-red-600 hover:text-red-700 dark:text-red-400 dark:hover:text-red-300 font-medium text-sm" onclick="return confirm('Are you sure you want to remove this item?')">
                                                        Remove
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                
                <!-- Order Summary -->
                <div class="lg:col-span-1">
                    <div class="bg-white dark:bg-gray-900 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 sticky top-8">
                        <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                            <h2 class="text-xl font-semibold text-gray-900 dark:text-white">Order Summary</h2>
                        </div>
                        
                        <div class="p-6 space-y-4">
                            <!-- Subtotal -->
                            <div class="flex justify-between text-sm">
                                <span class="text-gray-600 dark:text-gray-400">Subtotal</span>
                                <span class="text-gray-900 dark:text-white">${{ number_format($cart->subtotal, 2) }}</span>
                            </div>
                            
                            <!-- Tax -->
                            <div class="flex justify-between text-sm">
                                <span class="text-gray-600 dark:text-gray-400">Tax</span>
                                <span class="text-gray-900 dark:text-white">${{ number_format($cart->tax, 2) }}</span>
                            </div>
                            
                            <!-- Shipping -->
                            <div class="flex justify-between text-sm">
                                <span class="text-gray-600 dark:text-gray-400">Shipping</span>
                                <span class="text-gray-900 dark:text-white">${{ number_format($cart->shipping_cost, 2) }}</span>
                            </div>
                            
                            <!-- Divider -->
                            <div class="border-t border-gray-200 dark:border-gray-700 pt-4">
                                <div class="flex justify-between text-lg font-semibold">
                                    <span class="text-gray-900 dark:text-white">Total</span>
                                    <span class="text-gray-900 dark:text-white">${{ number_format($cart->total, 2) }}</span>
                                </div>
                            </div>
                            
                            <!-- Checkout Button -->
                            <div class="pt-4">
                                <a href="{{ route('checkout.index') }}" 
                                   class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-lg transition-colors duration-200 flex items-center justify-center">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4m0 0L7 13m0 0l-2.5 5M7 13l2.5 5m6-5v6a2 2 0 01-2 2H9a2 2 0 01-2-2v-6m8 0V9a2 2 0 00-2-2H9a2 2 0 00-2 2v4.01"></path>
                                    </svg>
                                    Proceed to Checkout
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <!-- Empty Cart -->
            <div class="text-center py-16">
                <div class="mx-auto w-24 h-24 bg-gray-200 dark:bg-gray-700 rounded-full flex items-center justify-center mb-6">
                    <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4m0 0L7 13m0 0l-2.5 5M7 13l2.5 5m6-5v6a2 2 0 01-2 2H9a2 2 0 01-2-2v-6m8 0V9a2 2 0 00-2-2H9a2 2 0 00-2 2v4.01"></path>
                    </svg>
                </div>
                <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4">
                    Your cart is empty
                </h2>
                <p class="text-gray-600 dark:text-gray-400 mb-8 max-w-md mx-auto">
                    Looks like you haven't added any items to your cart yet. Start shopping to discover amazing products!
                </p>
                <a href="{{ route('products.index') }}" class="inline-flex items-center px-8 py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg transition-colors duration-200">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    Start Shopping
                </a>
            </div>
        @endif
    </div>
</div>

<script>
function updateQuantity(itemId, change) {
    const form = document.querySelector(`form[action*="cart/item/${itemId}"]`);
    const input = form.querySelector('input[name="quantity"]');
    if (input) {
        const newValue = Math.max(1, Math.min(99, parseInt(input.value) + change));
        input.value = newValue;
    }
}
</script>
@endsection
