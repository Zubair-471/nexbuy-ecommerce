@extends('layouts.app')

@section('title', 'FAQ - NexBuy')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-gray-50 to-gray-100 dark:from-gray-900 dark:to-gray-800">
    <!-- Header Section -->
    <div class="bg-white dark:bg-gray-800 shadow-sm reveal-on-scroll">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="text-center">
                <h1 class="text-4xl font-bold text-gray-900 dark:text-white mb-4 reveal-child">
                    Frequently Asked Questions
                </h1>
                <p class="text-lg text-gray-600 dark:text-gray-400 reveal-child">
                    Find answers to common questions about our products, services, and policies.
                </p>
            </div>
        </div>
    </div>

    <!-- FAQ Content -->
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12 reveal-on-scroll">
        <div class="space-y-8">
            <!-- General Questions -->
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl p-8 reveal-child">
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">
                    General Questions
                </h2>
                <div class="space-y-6">
                    <div class="border-b border-gray-200 dark:border-gray-700 pb-6 last:border-b-0">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-3">
                            What is NexBuy?
                        </h3>
                        <p class="text-gray-600 dark:text-gray-400">
                            NexBuy is your premium online marketplace for quality products. We offer a carefully curated selection of items with competitive prices and exceptional customer service.
                        </p>
                    </div>
                    
                    <div class="border-b border-gray-200 dark:border-gray-700 pb-6 last:border-b-0">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-3">
                            How do I create an account?
                        </h3>
                        <p class="text-gray-600 dark:text-gray-400">
                            Creating an account is easy! Click the "Sign Up" button in the top right corner, fill in your information, and you'll be ready to start shopping in minutes.
                        </p>
                    </div>
                    
                    <div class="border-b border-gray-200 dark:border-gray-700 pb-6 last:border-b-0">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-3">
                            Is my personal information secure?
                        </h3>
                        <p class="text-gray-600 dark:text-gray-400">
                            Absolutely! We use industry-standard encryption and security measures to protect your personal information. Your data is never shared with third parties.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Ordering & Shipping -->
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl p-8 reveal-child">
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">
                    Ordering & Shipping
                </h2>
                <div class="space-y-6">
                    <div class="border-b border-gray-200 dark:border-gray-700 pb-6 last:border-b-0">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-3">
                            How long does shipping take?
                        </h3>
                        <p class="text-gray-600 dark:text-gray-400">
                            Standard shipping typically takes 3-5 business days. Express shipping is available for faster delivery. Free shipping is included on orders over $50.
                        </p>
                    </div>
                    
                    <div class="border-b border-gray-200 dark:border-gray-700 pb-6 last:border-b-0">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-3">
                            Can I track my order?
                        </h3>
                        <p class="text-gray-600 dark:text-gray-400">
                            Yes! Once your order ships, you'll receive a tracking number via email. You can also track your order status in your account dashboard.
                        </p>
                    </div>
                    
                    <div class="border-b border-gray-200 dark:border-gray-700 pb-6 last:border-b-0">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-3">
                            Do you ship internationally?
                        </h3>
                        <p class="text-gray-600 dark:text-gray-400">
                            Currently, we ship to the United States and Canada. We're working on expanding our shipping options to more countries.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Returns & Exchanges -->
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl p-8 reveal-child">
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">
                    Returns & Exchanges
                </h2>
                <div class="space-y-6">
                    <div class="border-b border-gray-200 dark:border-gray-700 pb-6 last:border-b-0">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-3">
                            What is your return policy?
                        </h3>
                        <p class="text-gray-600 dark:text-gray-400">
                            We offer a 30-day return policy for most items. Products must be in their original condition with all packaging intact. Some items may have different return policies.
                        </p>
                    </div>
                    
                    <div class="border-b border-gray-200 dark:border-gray-700 pb-6 last:border-b-0">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-3">
                            How do I return an item?
                        </h3>
                        <p class="text-gray-600 dark:text-gray-400">
                            To return an item, go to your account dashboard, find the order, and click "Return Item." Follow the instructions to print a return label and ship the item back.
                        </p>
                    </div>
                    
                    <div class="border-b border-gray-200 dark:border-gray-700 pb-6 last:border-b-0">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-3">
                            When will I receive my refund?
                        </h3>
                        <p class="text-gray-600 dark:text-gray-400">
                            Refunds are typically processed within 5-7 business days after we receive your return. The time to appear in your account depends on your bank or credit card company.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Payment & Billing -->
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl p-8 reveal-child">
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">
                    Payment & Billing
                </h2>
                <div class="space-y-6">
                    <div class="border-b border-gray-200 dark:border-gray-700 pb-6 last:border-b-0">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-3">
                            What payment methods do you accept?
                        </h3>
                        <p class="text-gray-600 dark:text-gray-400">
                            We accept all major credit cards (Visa, MasterCard, American Express, Discover), PayPal, and Apple Pay. All payments are processed securely.
                        </p>
                    </div>
                    
                    <div class="border-b border-gray-200 dark:border-gray-700 pb-6 last:border-b-0">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-3">
                            Are there any hidden fees?
                        </h3>
                        <p class="text-gray-600 dark:text-gray-400">
                            No hidden fees! The price you see is the price you pay. We clearly display all costs including shipping and taxes before you complete your purchase.
                        </p>
                    </div>
                    
                    <div class="border-b border-gray-200 dark:border-gray-700 pb-6 last:border-b-0">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-3">
                            Is my payment information secure?
                        </h3>
                        <p class="text-gray-600 dark:text-gray-400">
                            Yes! We use industry-standard SSL encryption and never store your full credit card information. All payments are processed through secure payment gateways.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Contact Support Section -->
    <div class="bg-white dark:bg-gray-800 py-16 reveal-on-scroll">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-6 reveal-child">
                Still Have Questions?
            </h2>
            <p class="text-lg text-gray-600 dark:text-gray-400 mb-12 reveal-child">
                Can't find the answer you're looking for? Our support team is here to help!
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
