@extends('layouts.app')

@section('title', 'Checkout - NexBuy')
@section('meta_description', 'Complete your purchase with secure checkout at NexBuy. Enter shipping and payment information.')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-gray-50 to-gray-100 dark:from-gray-900 dark:to-gray-800">
    <!-- Header -->
    <div class="bg-white dark:bg-gray-900 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Checkout</h1>
                    <p class="text-gray-600 dark:text-gray-400 mt-2">Complete your purchase</p>
                </div>
                <a href="{{ route('cart.index') }}" class="inline-flex items-center text-blue-600 hover:text-blue-700 dark:text-blue-400 dark:hover:text-blue-300 font-medium">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Back to Cart
                </a>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Checkout Form -->
            <div class="lg:col-span-2">
                <form x-data="{ step: 1, paymentMethod: 'card' }" class="space-y-8">
                    <!-- Step 1: Shipping Information -->
                    <div x-show="step === 1" class="bg-white dark:bg-gray-900 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700">
                        <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                            <h2 class="text-xl font-semibold text-gray-900 dark:text-white">Shipping Information</h2>
                        </div>
                        
                        <div class="p-6 space-y-6">
                            <!-- Name Fields -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="first_name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">First Name</label>
                                    <input type="text" id="first_name" name="first_name" required
                                           class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:text-white">
                                </div>
                                <div>
                                    <label for="last_name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Last Name</label>
                                    <input type="text" id="last_name" name="last_name" required
                                           class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:text-white">
                                </div>
                            </div>
                            
                            <!-- Email and Phone -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Email Address</label>
                                    <input type="email" id="email" name="email" required
                                           class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:text-white">
                                </div>
                                <div>
                                    <label for="phone" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Phone Number</label>
                                    <input type="tel" id="phone" name="phone" required
                                           class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:text-white">
                                </div>
                            </div>
                            
                            <!-- Address -->
                            <div>
                                <label for="address" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Street Address</label>
                                <input type="text" id="address" name="address" required
                                       class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:text-white">
                            </div>
                            
                            <!-- City, State, ZIP -->
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                <div>
                                    <label for="city" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">City</label>
                                    <input type="text" id="city" name="city" required
                                           class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:text-white">
                                </div>
                                <div>
                                    <label for="state" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">State</label>
                                    <input type="text" id="state" name="state" required
                                           class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:text-white">
                                </div>
                                <div>
                                    <label for="zip" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">ZIP Code</label>
                                    <input type="text" id="zip" name="zip" required
                                           class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:text-white">
                                </div>
                            </div>
                            
                            <!-- Country -->
                            <div>
                                <label for="country" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Country</label>
                                <select id="country" name="country" required
                                        class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:text-white">
                                    <option value="">Select Country</option>
                                    <option value="US">United States</option>
                                    <option value="CA">Canada</option>
                                    <option value="UK">United Kingdom</option>
                                    <option value="AU">Australia</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Step 2: Payment Information -->
                    <div x-show="step === 2" class="bg-white dark:bg-gray-900 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700">
                        <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                            <h2 class="text-xl font-semibold text-gray-900 dark:text-white">Payment Information</h2>
                        </div>
                        
                        <div class="p-6 space-y-6">
                            <!-- Payment Method -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-4">Payment Method</label>
                                <div class="space-y-3">
                                    <label class="flex items-center">
                                        <input type="radio" x-model="paymentMethod" value="card" class="text-blue-600 focus:ring-blue-500">
                                        <span class="ml-3 text-gray-700 dark:text-gray-300">Credit/Debit Card</span>
                                    </label>
                                    <label class="flex items-center">
                                        <input type="radio" x-model="paymentMethod" value="paypal" class="text-blue-600 focus:ring-blue-500">
                                        <span class="ml-3 text-gray-700 dark:text-gray-300">PayPal</span>
                                    </label>
                                </div>
                            </div>
                            
                            <!-- Card Information -->
                            <div x-show="paymentMethod === 'card'" class="space-y-6">
                                <div>
                                    <label for="card_number" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Card Number</label>
                                    <input type="text" id="card_number" name="card_number" placeholder="1234 5678 9012 3456"
                                           class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:text-white">
                                </div>
                                
                                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                    <div>
                                        <label for="expiry" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Expiry Date</label>
                                        <input type="text" id="expiry" name="expiry" placeholder="MM/YY"
                                               class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:text-white">
                                    </div>
                                    <div>
                                        <label for="cvv" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">CVV</label>
                                        <input type="text" id="cvv" name="cvv" placeholder="123"
                                               class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:text-white">
                                    </div>
                                    <div>
                                        <label for="name_on_card" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Name on Card</label>
                                        <input type="text" id="name_on_card" name="name_on_card"
                                               class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:text-white">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Navigation Buttons -->
                    <div class="flex justify-between">
                        <button type="button" x-show="step > 1" @click="step--"
                                class="px-6 py-3 border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-800 transition-colors duration-200">
                            Previous
                        </button>
                        <button type="button" x-show="step < 2" @click="step++"
                                class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition-colors duration-200">
                            Next
                        </button>
                        <button type="submit" x-show="step === 2"
                                class="px-6 py-3 bg-green-600 hover:bg-green-700 text-white rounded-lg transition-colors duration-200">
                            Place Order
                        </button>
                    </div>
                </form>
            </div>
            
            <!-- Order Summary -->
            <div class="lg:col-span-1">
                <div class="bg-white dark:bg-gray-900 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 sticky top-8">
                    <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                        <h2 class="text-xl font-semibold text-gray-900 dark:text-white">Order Summary</h2>
                    </div>
                    
                    <div class="p-6 space-y-4">
                        <!-- Cart Items -->
                        @if($cart && $cart->items->count() > 0)
                            <div class="space-y-4">
                                @foreach($cart->items as $item)
                                    <div class="flex items-center space-x-3">
                                        <img src="{{ $item->product->featured_image_url ?? asset('images/placeholder.jpg') }}" 
                                             alt="{{ $item->product->name }}"
                                             class="w-12 h-12 object-cover rounded-lg">
                                        <div class="flex-1 min-w-0">
                                            <h4 class="text-sm font-medium text-gray-900 dark:text-white truncate">
                                                {{ $item->product->name }}
                                            </h4>
                                            <p class="text-sm text-gray-500 dark:text-gray-400">
                                                Qty: {{ $item->quantity }}
                                            </p>
                                        </div>
                                        <p class="text-sm font-medium text-gray-900 dark:text-white">
                                            ${{ number_format($item->price * $item->quantity, 2) }}
                                        </p>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                        
                        <!-- Totals -->
                        <div class="border-t border-gray-200 dark:border-gray-700 pt-4 space-y-3">
                            <div class="flex justify-between text-sm">
                                <span class="text-gray-600 dark:text-gray-400">Subtotal</span>
                                <span class="text-gray-900 dark:text-white">${{ number_format($cart->subtotal ?? 0, 2) }}</span>
                            </div>
                            <div class="flex justify-between text-sm">
                                <span class="text-gray-600 dark:text-gray-400">Tax</span>
                                <span class="text-gray-900 dark:text-white">${{ number_format($cart->tax ?? 0, 2) }}</span>
                            </div>
                            <div class="flex justify-between text-sm">
                                <span class="text-gray-600 dark:text-gray-400">Shipping</span>
                                <span class="text-gray-900 dark:text-white">${{ number_format($cart->shipping_cost ?? 0, 2) }}</span>
                            </div>
                            <div class="border-t border-gray-200 dark:border-gray-700 pt-3">
                                <div class="flex justify-between text-lg font-semibold">
                                    <span class="text-gray-900 dark:text-white">Total</span>
                                    <span class="text-gray-900 dark:text-white">${{ number_format($cart->total ?? 0, 2) }}</span>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Security Notice -->
                        <div class="text-center pt-4">
                            <div class="flex items-center justify-center text-sm text-gray-500 dark:text-gray-400">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                </svg>
                                Secure checkout with SSL encryption
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
