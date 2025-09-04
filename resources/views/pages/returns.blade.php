@extends('layouts.app')

@section('title', 'Returns & Exchanges - NexBuy')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-gray-50 to-gray-100 dark:from-gray-900 dark:to-gray-800">
    <!-- Header Section -->
    <div class="bg-white dark:bg-gray-800 shadow-sm reveal-on-scroll">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="text-center">
                <h1 class="text-4xl font-bold text-gray-900 dark:text-white mb-4 reveal-child">
                    Returns & Exchanges
                </h1>
                <p class="text-lg text-gray-600 dark:text-gray-400 reveal-child">
                    Hassle-free returns and exchanges to ensure your complete satisfaction.
                </p>
            </div>
        </div>
    </div>

    <!-- Return Policy Overview -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 reveal-on-scroll">
        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl p-8 text-center reveal-child">
            <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-6">
                Our Return Policy
            </h2>
            <p class="text-lg text-gray-600 dark:text-gray-400 mb-8 max-w-3xl mx-auto">
                We want you to love every purchase. If you're not completely satisfied, we offer a 30-day return window for most items.
            </p>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="text-center">
                    <div class="w-16 h-16 bg-blue-100 dark:bg-blue-900 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">30 Days</h3>
                    <p class="text-gray-600 dark:text-gray-400">Return window from delivery date</p>
                </div>
                <div class="text-center">
                    <div class="w-16 h-16 bg-green-100 dark:bg-green-900 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Free Returns</h3>
                    <p class="text-gray-600 dark:text-gray-400">No return shipping fees</p>
                </div>
                <div class="text-center">
                    <div class="w-16 h-16 bg-purple-100 dark:bg-purple-900 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-purple-600 dark:text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Quick Refunds</h3>
                    <p class="text-gray-600 dark:text-gray-400">Processed within 5-7 business days</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Return Process -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 reveal-on-scroll">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-6 reveal-child">
                How to Return an Item
            </h2>
            <p class="text-lg text-gray-600 dark:text-gray-400 reveal-child">
                Follow these simple steps to return your item quickly and easily.
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <!-- Step 1 -->
            <div class="text-center reveal-child">
                <div class="w-16 h-16 bg-blue-100 dark:bg-blue-900 rounded-full flex items-center justify-center mx-auto mb-4">
                    <span class="text-2xl font-bold text-blue-600 dark:text-blue-400">1</span>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-3">Start Return</h3>
                <p class="text-gray-600 dark:text-gray-400">
                    Go to your order history and click "Return Item" for the product you want to return.
                </p>
            </div>

            <!-- Step 2 -->
            <div class="text-center reveal-child">
                <div class="w-16 h-16 bg-green-100 dark:bg-green-900 rounded-full flex items-center justify-center mx-auto mb-4">
                    <span class="text-2xl font-bold text-green-600 dark:text-green-400">2</span>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-3">Select Reason</h3>
                <p class="text-gray-600 dark:text-gray-400">
                    Choose your return reason and whether you want a refund or exchange.
                </p>
            </div>

            <!-- Step 3 -->
            <div class="text-center reveal-child">
                <div class="w-16 h-16 bg-purple-100 dark:bg-purple-900 rounded-full flex items-center justify-center mx-auto mb-4">
                    <span class="text-2xl font-bold text-purple-600 dark:text-purple-400">3</span>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-3">Print Label</h3>
                <p class="text-gray-600 dark:text-gray-400">
                    Print the prepaid return shipping label and package your item securely.
                </p>
            </div>

            <!-- Step 4 -->
            <div class="text-center reveal-child">
                <div class="w-16 h-16 bg-orange-100 dark:bg-orange-900 rounded-full flex items-center justify-center mx-auto mb-4">
                    <span class="text-2xl font-bold text-orange-600 dark:text-orange-400">4</span>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-3">Ship & Track</h3>
                <p class="text-gray-600 dark:text-gray-400">
                    Drop off your package and track the return process in your account.
                </p>
            </div>
        </div>
    </div>

    <!-- Return Requirements -->
    <div class="bg-white dark:bg-gray-800 py-16 reveal-on-scroll">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-6 reveal-child">
                    Return Requirements
                </h2>
                <p class="text-lg text-gray-600 dark:text-gray-400 reveal-child">
                    To ensure your return is processed quickly, please follow these guidelines.
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Requirements -->
                <div class="space-y-6 reveal-child">
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-4">
                        What We Accept
                    </h3>
                    <div class="space-y-4">
                        <div class="flex items-start space-x-3">
                            <div class="w-6 h-6 bg-green-100 dark:bg-green-900 rounded-full flex items-center justify-center flex-shrink-0 mt-0.5">
                                <svg class="w-4 h-4 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-900 dark:text-white">Original Packaging</h4>
                                <p class="text-sm text-gray-600 dark:text-gray-400">Item must be in original packaging with all tags attached</p>
                            </div>
                        </div>
                        <div class="flex items-start space-x-3">
                            <div class="w-6 h-6 bg-green-100 dark:bg-green-900 rounded-full flex items-center justify-center flex-shrink-0 mt-0.5">
                                <svg class="w-4 h-4 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-900 dark:text-white">Unused Condition</h4>
                                <p class="text-sm text-gray-600 dark:text-gray-400">Item must be unused and in the same condition as received</p>
                            </div>
                        </div>
                        <div class="flex items-start space-x-3">
                            <div class="w-6 h-6 bg-green-100 dark:bg-green-900 rounded-full flex items-center justify-center flex-shrink-0 mt-0.5">
                                <svg class="w-4 h-4 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-900 dark:text-white">Complete Items</h4>
                                <p class="text-sm text-gray-600 dark:text-gray-400">All parts, accessories, and documentation must be included</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Non-Returnable -->
                <div class="space-y-6 reveal-child">
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-4">
                        Non-Returnable Items
                    </h3>
                    <div class="space-y-4">
                        <div class="flex items-start space-x-3">
                            <div class="w-6 h-6 bg-red-100 dark:bg-red-900 rounded-full flex items-center justify-center flex-shrink-0 mt-0.5">
                                <svg class="w-4 h-4 text-red-600 dark:text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-900 dark:text-white">Personal Care Items</h4>
                                <p class="text-sm text-gray-600 dark:text-gray-400">Hygiene products, cosmetics, and personal care items</p>
                            </div>
                        </div>
                        <div class="flex items-start space-x-3">
                            <div class="w-6 h-6 bg-red-100 dark:bg-red-900 rounded-full flex items-center justify-center flex-shrink-0 mt-0.5">
                                <svg class="w-4 h-4 text-red-600 dark:text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-900 dark:text-white">Digital Products</h4>
                                <p class="text-sm text-gray-600 dark:text-gray-400">Software, digital downloads, and online services</p>
                            </div>
                        </div>
                        <div class="flex items-start space-x-3">
                            <div class="w-6 h-6 bg-red-100 dark:bg-red-900 rounded-full flex items-center justify-center flex-shrink-0 mt-0.5">
                                <svg class="w-4 h-4 text-red-600 dark:text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-900 dark:text-white">Custom Items</h4>
                                <p class="text-sm text-gray-600 dark:text-gray-400">Personalized or custom-made products</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Refund Information -->
    <div class="bg-gray-50 dark:bg-gray-900 py-16 reveal-on-scroll">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-6 reveal-child">
                    Refund Information
                </h2>
                <p class="text-lg text-gray-600 dark:text-gray-400 reveal-child">
                    Learn about our refund process and what to expect.
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Refund Timeline -->
                <div class="bg-white dark:bg-gray-800 rounded-xl p-6 reveal-child">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
                        Refund Timeline
                    </h3>
                    <div class="space-y-3 text-sm text-gray-600 dark:text-gray-400">
                        <div class="flex justify-between">
                            <span>Return Received</span>
                            <span>Day 1</span>
                        </div>
                        <div class="flex justify-between">
                            <span>Inspection & Processing</span>
                            <span>Days 2-3</span>
                        </div>
                        <div class="flex justify-between">
                            <span>Refund Issued</span>
                            <span>Days 4-5</span>
                        </div>
                        <div class="flex justify-between">
                            <span>Bank Processing</span>
                            <span>Days 6-7</span>
                        </div>
                    </div>
                </div>

                <!-- Refund Methods -->
                <div class="bg-white dark:bg-gray-800 rounded-xl p-6 reveal-child">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
                        Refund Methods
                    </h3>
                    <div class="space-y-3 text-sm text-gray-600 dark:text-gray-400">
                        <div class="flex items-center space-x-2">
                            <div class="w-2 h-2 bg-blue-500 rounded-full"></div>
                            <span>Original payment method</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <div class="w-2 h-2 bg-green-500 rounded-full"></div>
                            <span>Store credit (faster)</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <div class="w-2 h-2 bg-purple-500 rounded-full"></div>
                            <span>Exchange for different item</span>
                        </div>
                    </div>
                </div>

                <!-- Refund Amounts -->
                <div class="bg-white dark:bg-gray-800 rounded-xl p-6 reveal-child">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
                        Refund Amounts
                    </h3>
                    <div class="space-y-3 text-sm text-gray-600 dark:text-gray-400">
                        <div class="flex justify-between">
                            <span>Product Price</span>
                            <span>100%</span>
                        </div>
                        <div class="flex justify-between">
                            <span>Original Shipping</span>
                            <span>100%</span>
                        </div>
                        <div class="flex justify-between">
                            <span>Return Shipping</span>
                            <span>Free</span>
                        </div>
                        <div class="flex justify-between">
                            <span>Restocking Fee</span>
                            <span>None</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Exchange Information -->
    <div class="bg-white dark:bg-gray-800 py-16 reveal-on-scroll">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-6 reveal-child">
                    Exchange Information
                </h2>
                <p class="text-lg text-gray-600 dark:text-gray-400 reveal-child">
                    Want a different size, color, or item? We make exchanges easy.
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Exchange Process -->
                <div class="reveal-child">
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-4">
                        Exchange Process
                    </h3>
                    <div class="space-y-4 text-gray-600 dark:text-gray-400">
                        <p>When you choose to exchange an item, we'll:</p>
                        <ul class="list-disc list-inside space-y-2 ml-4">
                            <li>Process your return quickly</li>
                            <li>Ship your new item immediately</li>
                            <li>Cover all shipping costs</li>
                            <li>Ensure the exchange meets your needs</li>
                        </ul>
                    </div>
                </div>

                <!-- Exchange Options -->
                <div class="reveal-child">
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-4">
                        Exchange Options
                    </h3>
                    <div class="space-y-4 text-gray-600 dark:text-gray-400">
                        <p>You can exchange for:</p>
                        <ul class="list-disc list-inside space-y-2 ml-4">
                            <li>Different size or color of the same item</li>
                            <li>Another item of equal or lesser value</li>
                            <li>Store credit for future purchases</li>
                            <li>Partial refund if exchanging for lower-priced item</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Contact Section -->
    <div class="bg-gradient-to-br from-blue-600 to-purple-600 py-16 reveal-on-scroll">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl font-bold text-white mb-6 reveal-child">
                Need Help with Returns?
            </h2>
            <p class="text-lg text-blue-100 mb-8 reveal-child">
                Our customer service team is here to help with any questions about returns, exchanges, or refunds.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center items-center reveal-child">
                <a href="{{ route('contact') }}" class="bg-white text-blue-600 px-8 py-4 rounded-xl font-bold text-lg hover:scale-105 transition-all duration-500 shadow-xl">
                    Contact Support
                </a>
                <a href="{{ route('support') }}" class="border-2 border-white text-white px-8 py-4 rounded-xl font-bold text-lg hover:bg-white hover:text-blue-600 transition-all duration-500">
                    Visit Support Center
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
