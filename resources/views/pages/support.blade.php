@extends('layouts.app')

@section('title', 'Support Center - NexBuy')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-gray-50 to-gray-100 dark:from-gray-900 dark:to-gray-800">
    <!-- Header Section -->
    <div class="bg-white dark:bg-gray-800 shadow-sm reveal-on-scroll">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="text-center">
                <h1 class="text-4xl font-bold text-gray-900 dark:text-white mb-4 reveal-child">
                    Support Center
                </h1>
                <p class="text-lg text-gray-600 dark:text-gray-400 reveal-child">
                    We're here to help you with any questions or issues you may have.
                </p>
            </div>
        </div>
    </div>

    <!-- Support Options -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 reveal-on-scroll">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-16">
            <!-- Help Articles -->
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl p-8 text-center reveal-child">
                <div class="w-16 h-16 bg-blue-100 dark:bg-blue-900 rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg class="w-8 h-8 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-4">Help Articles</h3>
                <p class="text-gray-600 dark:text-gray-400 mb-6">
                    Browse our comprehensive knowledge base for quick answers to common questions.
                </p>
                <a href="{{ route('faq') }}" class="inline-block bg-blue-600 text-white px-6 py-3 rounded-xl font-semibold hover:bg-blue-700 transition-colors duration-300">
                    Browse Articles
                </a>
            </div>

            <!-- Contact Support -->
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl p-8 text-center reveal-child">
                <div class="w-16 h-16 bg-green-100 dark:bg-green-900 rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg class="w-8 h-8 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-4">Contact Support</h3>
                <p class="text-gray-600 dark:text-gray-400 mb-6">
                    Get in touch with our support team for personalized assistance.
                </p>
                <a href="{{ route('contact') }}" class="inline-block bg-green-600 text-white px-6 py-3 rounded-xl font-semibold hover:bg-green-700 transition-colors duration-300">
                    Contact Us
                </a>
            </div>

            <!-- Live Chat -->
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl p-8 text-center reveal-child">
                <div class="w-16 h-16 bg-purple-100 dark:bg-purple-900 rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg class="w-8 h-8 text-purple-600 dark:text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-4">Live Chat</h3>
                <p class="text-gray-600 dark:text-gray-400 mb-6">
                    Chat with our support team in real-time for immediate assistance.
                </p>
                <button class="inline-block bg-purple-600 text-white px-6 py-3 rounded-xl font-semibold hover:bg-purple-700 transition-colors duration-300">
                    Start Chat
                </button>
            </div>
        </div>

        <!-- Common Issues -->
        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl p-8 reveal-child">
            <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-8 text-center">
                Common Issues & Solutions
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Issue 1 -->
                <div class="border border-gray-200 dark:border-gray-700 rounded-xl p-6">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-3">
                        Order Not Received
                    </h3>
                    <p class="text-gray-600 dark:text-gray-400 mb-4">
                        If your order hasn't arrived within the expected timeframe, here are some steps to take:
                    </p>
                    <ul class="text-sm text-gray-600 dark:text-gray-400 space-y-2">
                        <li>• Check your order tracking number</li>
                        <li>• Verify your shipping address</li>
                        <li>• Contact our support team</li>
                    </ul>
                </div>

                <!-- Issue 2 -->
                <div class="border border-gray-200 dark:border-gray-700 rounded-xl p-6">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-3">
                        Payment Problems
                    </h3>
                    <p class="text-gray-600 dark:text-gray-400 mb-4">
                        Having trouble with payment? Here are some common solutions:
                    </p>
                    <ul class="text-sm text-gray-600 dark:text-gray-400 space-y-2">
                        <li>• Verify your payment method</li>
                        <li>• Check for sufficient funds</li>
                        <li>• Try a different payment option</li>
                    </ul>
                </div>

                <!-- Issue 3 -->
                <div class="border border-gray-200 dark:border-gray-700 rounded-xl p-6">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-3">
                        Return Request
                    </h3>
                    <p class="text-gray-600 dark:text-gray-400 mb-4">
                        Need to return an item? Follow these simple steps:
                    </p>
                    <ul class="text-sm text-gray-600 dark:text-gray-400 space-y-2">
                        <li>• Go to your order history</li>
                        <li>• Select the item to return</li>
                        <li>• Print return label and ship</li>
                    </ul>
                </div>

                <!-- Issue 4 -->
                <div class="border border-gray-200 dark:border-gray-700 rounded-xl p-6">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-3">
                        Account Access
                    </h3>
                    <p class="text-gray-600 dark:text-gray-400 mb-4">
                        Can't access your account? Here's how to resolve it:
                    </p>
                    <ul class="text-sm text-gray-600 dark:text-gray-400 space-y-2">
                        <li>• Use password reset function</li>
                        <li>• Check your email for verification</li>
                        <li>• Contact support if needed</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Support Resources -->
    <div class="bg-white dark:bg-gray-800 py-16 reveal-on-scroll">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-6 reveal-child">
                    Additional Support Resources
                </h2>
                <p class="text-lg text-gray-600 dark:text-gray-400 reveal-child">
                    Explore these resources to get the help you need quickly and efficiently.
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Resource 1 -->
                <div class="text-center reveal-child">
                    <div class="w-16 h-16 bg-blue-100 dark:bg-blue-900 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">User Guide</h3>
                    <p class="text-sm text-gray-600 dark:text-gray-400">Step-by-step instructions for using our platform</p>
                </div>

                <!-- Resource 2 -->
                <div class="text-center reveal-child">
                    <div class="w-16 h-16 bg-green-100 dark:bg-green-900 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Video Tutorials</h3>
                    <p class="text-sm text-gray-600 dark:text-gray-400">Visual guides to help you navigate our site</p>
                </div>

                <!-- Resource 3 -->
                <div class="text-center reveal-child">
                    <div class="w-16 h-16 bg-purple-100 dark:bg-purple-900 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-purple-600 dark:text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Community Forum</h3>
                    <p class="text-sm text-gray-600 dark:text-gray-400">Connect with other customers and share tips</p>
                </div>

                <!-- Resource 4 -->
                <div class="text-center reveal-child">
                    <div class="w-16 h-16 bg-orange-100 dark:bg-orange-900 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-orange-600 dark:text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">24/7 Support</h3>
                    <p class="text-sm text-gray-600 dark:text-gray-400">Round-the-clock assistance when you need it most</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Contact CTA -->
    <div class="bg-gradient-to-br from-blue-600 to-purple-600 py-16 reveal-on-scroll">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl font-bold text-white mb-6 reveal-child">
                Still Need Help?
            </h2>
            <p class="text-lg text-blue-100 mb-8 reveal-child">
                Our support team is ready to assist you with any questions or concerns.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center items-center reveal-child">
                <a href="{{ route('contact') }}" class="bg-white text-blue-600 px-8 py-4 rounded-xl font-bold text-lg hover:scale-105 transition-all duration-500 shadow-xl">
                    Contact Support
                </a>
                <a href="{{ route('faq') }}" class="border-2 border-white text-white px-8 py-4 rounded-xl font-bold text-lg hover:bg-white hover:text-blue-600 transition-all duration-500">
                    Browse FAQ
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
