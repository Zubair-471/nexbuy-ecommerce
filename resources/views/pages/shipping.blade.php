@extends('layouts.app')

@section('title', 'Shipping Information - NexBuy')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-gray-50 to-gray-100 dark:from-gray-900 dark:to-gray-800">
    <!-- Header Section -->
    <div class="bg-white dark:bg-gray-800 shadow-sm reveal-on-scroll">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="text-center">
                <h1 class="text-4xl font-bold text-gray-900 dark:text-white mb-4 reveal-child">
                    Shipping Information
                </h1>
                <p class="text-lg text-gray-600 dark:text-gray-400 reveal-child">
                    Fast, reliable shipping to get your products to you quickly and safely.
                </p>
            </div>
        </div>
    </div>

    <!-- Shipping Options -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 reveal-on-scroll">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-16">
            <!-- Standard Shipping -->
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl p-8 text-center reveal-child">
                <div class="w-16 h-16 bg-blue-100 dark:bg-blue-900 rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg class="w-8 h-8 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-4">Standard Shipping</h3>
                <p class="text-gray-600 dark:text-gray-400 mb-6">
                    Free on orders over $50. 3-5 business days delivery.
                </p>
                <div class="text-2xl font-bold text-blue-600 dark:text-blue-400">
                    $4.99
                </div>
                <p class="text-sm text-gray-500 dark:text-gray-500">Orders under $50</p>
            </div>

            <!-- Express Shipping -->
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl p-8 text-center reveal-child">
                <div class="w-16 h-16 bg-green-100 dark:bg-green-900 rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg class="w-8 h-8 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-4">Express Shipping</h3>
                <p class="text-gray-600 dark:text-gray-400 mb-6">
                    1-2 business days delivery for faster service.
                </p>
                <div class="text-2xl font-bold text-green-600 dark:text-green-400">
                    $12.99
                </div>
                <p class="text-sm text-gray-500 dark:text-gray-500">All orders</p>
            </div>

            <!-- Overnight Shipping -->
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl p-8 text-center reveal-child">
                <div class="w-16 h-16 bg-purple-100 dark:bg-purple-900 rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg class="w-8 h-8 text-purple-600 dark:text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-4">Overnight Shipping</h3>
                <p class="text-gray-600 dark:text-gray-400 mb-6">
                    Next business day delivery for urgent orders.
                </p>
                <div class="text-2xl font-bold text-purple-600 dark:text-purple-400">
                    $24.99
                </div>
                <p class="text-sm text-gray-500 dark:text-gray-500">All orders</p>
            </div>
        </div>

        <!-- Shipping Details -->
        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl p-8 reveal-child">
            <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-8 text-center">
                Shipping Details & Policies
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Processing Time -->
                <div>
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
                        Order Processing
                    </h3>
                    <div class="space-y-3 text-gray-600 dark:text-gray-400">
                        <div class="flex items-center space-x-3">
                            <div class="w-2 h-2 bg-blue-500 rounded-full"></div>
                            <span>Orders placed before 2 PM EST ship same day</span>
                        </div>
                        <div class="flex items-center space-x-3">
                            <div class="w-2 h-2 bg-blue-500 rounded-full"></div>
                            <span>Orders placed after 2 PM EST ship next business day</span>
                        </div>
                        <div class="flex items-center space-x-3">
                            <div class="w-2 h-2 bg-blue-500 rounded-full"></div>
                            <span>Weekend orders ship Monday</span>
                        </div>
                        <div class="flex items-center space-x-3">
                            <div class="w-2 h-2 bg-blue-500 rounded-full"></div>
                            <span>Holiday orders may have extended processing</span>
                        </div>
                    </div>
                </div>

                <!-- Delivery Areas -->
                <div>
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
                        Delivery Areas
                    </h3>
                    <div class="space-y-3 text-gray-600 dark:text-gray-400">
                        <div class="flex items-center space-x-3">
                            <div class="w-2 h-2 bg-green-500 rounded-full"></div>
                            <span>Contiguous United States</span>
                        </div>
                        <div class="flex items-center space-x-3">
                            <div class="w-2 h-2 bg-green-500 rounded-full"></div>
                            <span>Alaska & Hawaii (additional fees apply)</span>
                        </div>
                        <div class="flex items-center space-x-3">
                            <div class="w-2 h-2 bg-green-500 rounded-full"></div>
                            <span>Canada (additional fees apply)</span>
                        </div>
                        <div class="flex items-center space-x-3">
                            <div class="w-2 h-2 bg-yellow-500 rounded-full"></div>
                            <span>International shipping available</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tracking & Updates -->
    <div class="bg-white dark:bg-gray-800 py-16 reveal-on-scroll">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-6 reveal-child">
                    Track Your Order
                </h2>
                <p class="text-lg text-gray-600 dark:text-gray-400 reveal-child">
                    Stay updated on your order status with real-time tracking and notifications.
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Order Confirmation -->
                <div class="text-center reveal-child">
                    <div class="w-16 h-16 bg-blue-100 dark:bg-blue-900 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Order Confirmation</h3>
                    <p class="text-sm text-gray-600 dark:text-gray-400">Immediate email confirmation with order details</p>
                </div>

                <!-- Shipping Notification -->
                <div class="text-center reveal-child">
                    <div class="w-16 h-16 bg-green-100 dark:bg-green-900 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Shipping Notification</h3>
                    <p class="text-sm text-gray-600 dark:text-gray-400">Email with tracking number when order ships</p>
                </div>

                <!-- Delivery Updates -->
                <div class="text-center reveal-child">
                    <div class="w-16 h-16 bg-purple-100 dark:bg-purple-900 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-purple-600 dark:text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Delivery Updates</h3>
                    <p class="text-sm text-gray-600 dark:text-gray-400">Real-time updates on delivery progress</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Shipping Policies -->
    <div class="bg-gray-50 dark:bg-gray-900 py-16 reveal-on-scroll">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-6 reveal-child">
                    Shipping Policies
                </h2>
                <p class="text-lg text-gray-600 dark:text-gray-400 reveal-child">
                    Important information about our shipping practices and policies.
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Policy 1 -->
                <div class="bg-white dark:bg-gray-800 rounded-xl p-6 reveal-child">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-3">
                        Signature Required
                    </h3>
                    <p class="text-gray-600 dark:text-gray-400">
                        Orders over $200 require signature upon delivery for security. If no one is available, the package will be held at the local post office or delivery center.
                    </p>
                </div>

                <!-- Policy 2 -->
                <div class="bg-white dark:bg-gray-800 rounded-xl p-6 reveal-child">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-3">
                        Weather Delays
                    </h3>
                    <p class="text-gray-600 dark:text-gray-400">
                        Severe weather conditions may cause delivery delays. We'll keep you updated on any weather-related shipping issues and work to minimize delays.
                    </p>
                </div>

                <!-- Policy 3 -->
                <div class="bg-white dark:bg-gray-800 rounded-xl p-6 reveal-child">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-3">
                        Address Verification
                    </h3>
                    <p class="text-gray-600 dark:text-gray-400">
                        Please ensure your shipping address is complete and accurate. Incorrect addresses may result in delivery delays or additional shipping fees.
                    </p>
                </div>

                <!-- Policy 4 -->
                <div class="bg-white dark:bg-gray-800 rounded-xl p-6 reveal-child">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-3">
                        Package Insurance
                    </h3>
                    <p class="text-gray-600 dark:text-gray-400">
                        All packages are insured for their full value. If your package is lost or damaged during shipping, we'll work with you to resolve the issue quickly.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Contact Section -->
    <div class="bg-white dark:bg-gray-800 py-16 reveal-on-scroll">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-6 reveal-child">
                Questions About Shipping?
            </h2>
            <p class="text-lg text-gray-600 dark:text-gray-400 mb-8 reveal-child">
                Our shipping team is here to help with any questions about delivery, tracking, or shipping policies.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center items-center reveal-child">
                <a href="{{ route('contact') }}" class="bg-gradient-to-r from-blue-600 to-purple-600 text-white px-8 py-4 rounded-xl font-bold text-lg hover:scale-105 transition-all duration-500 shadow-xl hover:shadow-2xl">
                    Contact Support
                </a>
                <a href="{{ route('support') }}" class="border-2 border-blue-600 text-blue-600 dark:text-blue-400 px-8 py-4 rounded-xl font-bold text-lg hover:bg-blue-600 hover:text-white transition-all duration-500">
                    Visit Support Center
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
