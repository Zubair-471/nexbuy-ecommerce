@extends('layouts.app')

@section('title', 'Privacy Policy - NexBuy')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-gray-50 to-gray-100 dark:from-gray-900 dark:to-gray-800">
    <!-- Header Section -->
    <div class="bg-white dark:bg-gray-800 shadow-sm reveal-on-scroll">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="text-center">
                <h1 class="text-4xl font-bold text-gray-900 dark:text-white mb-4 reveal-child">
                    Privacy Policy
                </h1>
                <p class="text-lg text-gray-600 dark:text-gray-400 reveal-child">
                    Learn how we collect, use, and protect your personal information.
                </p>
            </div>
        </div>
    </div>

    <!-- Privacy Content -->
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12 reveal-on-scroll">
        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl p-8">
            <div class="prose prose-lg dark:prose-invert max-w-none">
                <div class="space-y-8">
                    <!-- Information Collection -->
                    <section class="reveal-child">
                        <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">
                            1. Information We Collect
                        </h2>
                        <p class="text-gray-600 dark:text-gray-400 mb-4">
                            We collect information you provide directly to us, such as when you create an account, make a purchase, or contact us for support.
                        </p>
                        <p class="text-gray-600 dark:text-gray-400 mb-4">
                            This may include:
                        </p>
                        <ul class="list-disc list-inside text-gray-600 dark:text-gray-400 space-y-2 ml-4">
                            <li>Name, email address, and contact information</li>
                            <li>Billing and shipping addresses</li>
                            <li>Payment information (processed securely)</li>
                            <li>Order history and preferences</li>
                            <li>Communications with our support team</li>
                        </ul>
                    </section>

                    <!-- How We Use Information -->
                    <section class="reveal-child">
                        <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">
                            2. How We Use Your Information
                        </h2>
                        <p class="text-gray-600 dark:text-gray-400 mb-4">
                            We use the information we collect to:
                        </p>
                        <ul class="list-disc list-inside text-gray-600 dark:text-gray-400 space-y-2 ml-4">
                            <li>Process and fulfill your orders</li>
                            <li>Provide customer support and respond to inquiries</li>
                            <li>Send order confirmations and updates</li>
                            <li>Improve our products and services</li>
                            <li>Send marketing communications (with your consent)</li>
                            <li>Prevent fraud and ensure security</li>
                        </ul>
                    </section>

                    <!-- Information Sharing -->
                    <section class="reveal-child">
                        <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">
                            3. Information Sharing
                        </h2>
                        <p class="text-gray-600 dark:text-gray-400 mb-4">
                            We do not sell, trade, or otherwise transfer your personal information to third parties without your consent, except in the following circumstances:
                        </p>
                        <ul class="list-disc list-inside text-gray-600 dark:text-gray-400 space-y-2 ml-4">
                            <li>Service providers who assist in our operations</li>
                            <li>Payment processors for secure transactions</li>
                            <li>Shipping partners for order delivery</li>
                            <li>Legal requirements or law enforcement</li>
                        </ul>
                    </section>

                    <!-- Data Security -->
                    <section class="reveal-child">
                        <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">
                            4. Data Security
                        </h2>
                        <p class="text-gray-600 dark:text-gray-400">
                            We implement appropriate security measures to protect your personal information against unauthorized access, alteration, disclosure, or destruction. This includes encryption, secure servers, and regular security assessments.
                        </p>
                    </section>

                    <!-- Cookies and Tracking -->
                    <section class="reveal-child">
                        <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">
                            5. Cookies and Tracking
                        </h2>
                        <p class="text-gray-600 dark:text-gray-400 mb-4">
                            We use cookies and similar technologies to enhance your browsing experience, analyze site traffic, and personalize content. You can control cookie settings through your browser preferences.
                        </p>
                        <p class="text-gray-600 dark:text-gray-400">
                            Third-party services like Google Analytics may also collect information about your use of our website.
                        </p>
                    </section>

                    <!-- Your Rights -->
                    <section class="reveal-child">
                        <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">
                            6. Your Rights and Choices
                        </h2>
                        <p class="text-gray-600 dark:text-gray-400 mb-4">
                            You have the right to:
                        </p>
                        <ul class="list-disc list-inside text-gray-600 dark:text-gray-400 space-y-2 ml-4">
                            <li>Access and update your personal information</li>
                            <li>Request deletion of your data</li>
                            <li>Opt-out of marketing communications</li>
                            <li>Control cookie preferences</li>
                            <li>Request information about data processing</li>
                        </ul>
                    </section>

                    <!-- Data Retention -->
                    <section class="reveal-child">
                        <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">
                            7. Data Retention
                        </h2>
                        <p class="text-gray-600 dark:text-gray-400">
                            We retain your personal information for as long as necessary to provide our services, comply with legal obligations, resolve disputes, and enforce our agreements. Account information is typically retained while your account is active.
                        </p>
                    </section>

                    <!-- Children's Privacy -->
                    <section class="reveal-child">
                        <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">
                            8. Children's Privacy
                        </h2>
                        <p class="text-gray-600 dark:text-gray-400">
                            Our services are not intended for children under 13 years of age. We do not knowingly collect personal information from children under 13. If you believe we have collected such information, please contact us immediately.
                        </p>
                    </section>

                    <!-- Changes to Policy -->
                    <section class="reveal-child">
                        <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">
                            9. Changes to This Policy
                        </h2>
                        <p class="text-gray-600 dark:text-gray-400">
                            We may update this Privacy Policy from time to time. We will notify you of any changes by posting the new policy on this page and updating the "Last Updated" date. Your continued use of our services constitutes acceptance of the updated policy.
                        </p>
                    </section>

                    <!-- Contact Information -->
                    <section class="reveal-child">
                        <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">
                            10. Contact Us
                        </h2>
                        <p class="text-gray-600 dark:text-gray-400">
                            If you have any questions about this Privacy Policy or our data practices, please contact us at:
                        </p>
                        <div class="mt-4 p-4 bg-gray-50 dark:bg-gray-700 rounded-xl">
                            <p class="text-gray-600 dark:text-gray-400">
                                <strong>Email:</strong> <a href="mailto:privacy@nexbuy.com" class="text-blue-600 dark:text-blue-400 hover:underline">privacy@nexbuy.com</a><br>
                                <strong>Address:</strong> 123 Commerce Street, Business District, NY 10001<br>
                                <strong>Phone:</strong> +1 (555) 123-4567
                            </p>
                        </div>
                    </section>
                </div>

                <!-- Last Updated -->
                <div class="mt-12 pt-8 border-t border-gray-200 dark:border-gray-700 text-center reveal-child">
                    <p class="text-sm text-gray-500 dark:text-gray-400">
                        <strong>Last Updated:</strong> {{ date('F j, Y') }}
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Contact Section -->
    <div class="bg-white dark:bg-gray-800 py-16 reveal-on-scroll">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-6 reveal-child">
                Questions About Privacy?
            </h2>
            <p class="text-lg text-gray-600 dark:text-gray-400 mb-8 reveal-child">
                We're committed to transparency and protecting your privacy. Contact us if you need clarification.
            </p>
            <a href="{{ route('contact') }}" class="inline-flex items-center space-x-3 bg-gradient-to-r from-blue-600 to-purple-600 text-white px-8 py-4 rounded-xl font-bold text-lg hover:scale-105 transition-all duration-500 shadow-xl hover:shadow-2xl reveal-child">
                <span>Contact Us</span>
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                </svg>
            </a>
        </div>
    </div>
</div>
@endsection
