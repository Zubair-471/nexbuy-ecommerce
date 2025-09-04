@extends('layouts.app')

@section('title', 'Terms of Service - NexBuy')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-gray-50 to-gray-100 dark:from-gray-900 dark:to-gray-800">
    <!-- Header Section -->
    <div class="bg-white dark:bg-gray-800 shadow-sm reveal-on-scroll">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="text-center">
                <h1 class="text-4xl font-bold text-gray-900 dark:text-white mb-4 reveal-child">
                    Terms of Service
                </h1>
                <p class="text-lg text-gray-600 dark:text-gray-400 reveal-child">
                    Please read these terms carefully before using our services.
                </p>
            </div>
        </div>
    </div>

    <!-- Terms Content -->
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12 reveal-on-scroll">
        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl p-8">
            <div class="prose prose-lg dark:prose-invert max-w-none">
                <div class="space-y-8">
                    <!-- Acceptance of Terms -->
                    <section class="reveal-child">
                        <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">
                            1. Acceptance of Terms
                        </h2>
                        <p class="text-gray-600 dark:text-gray-400 mb-4">
                            By accessing and using NexBuy's website and services, you accept and agree to be bound by the terms and provision of this agreement.
                        </p>
                        <p class="text-gray-600 dark:text-gray-400">
                            If you do not agree to abide by the above, please do not use this service.
                        </p>
                    </section>

                    <!-- Use License -->
                    <section class="reveal-child">
                        <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">
                            2. Use License
                        </h2>
                        <p class="text-gray-600 dark:text-gray-400 mb-4">
                            Permission is granted to temporarily download one copy of the materials (information or software) on NexBuy's website for personal, non-commercial transitory viewing only.
                        </p>
                        <p class="text-gray-600 dark:text-gray-400 mb-4">
                            This is the grant of a license, not a transfer of title, and under this license you may not:
                        </p>
                        <ul class="list-disc list-inside text-gray-600 dark:text-gray-400 space-y-2 ml-4">
                            <li>modify or copy the materials</li>
                            <li>use the materials for any commercial purpose or for any public display</li>
                            <li>attempt to reverse engineer any software contained on the website</li>
                            <li>remove any copyright or other proprietary notations from the materials</li>
                        </ul>
                    </section>

                    <!-- Disclaimer -->
                    <section class="reveal-child">
                        <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">
                            3. Disclaimer
                        </h2>
                        <p class="text-gray-600 dark:text-gray-400">
                            The materials on NexBuy's website are provided on an 'as is' basis. NexBuy makes no warranties, expressed or implied, and hereby disclaims and negates all other warranties including without limitation, implied warranties or conditions of merchantability, fitness for a particular purpose, or non-infringement of intellectual property or other violation of rights.
                        </p>
                    </section>

                    <!-- Limitations -->
                    <section class="reveal-child">
                        <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">
                            4. Limitations
                        </h2>
                        <p class="text-gray-600 dark:text-gray-400">
                            In no event shall NexBuy or its suppliers be liable for any damages (including, without limitation, damages for loss of data or profit, or due to business interruption) arising out of the use or inability to use the materials on NexBuy's website, even if NexBuy or a NexBuy authorized representative has been notified orally or in writing of the possibility of such damage.
                        </p>
                    </section>

                    <!-- Accuracy of Materials -->
                    <section class="reveal-child">
                        <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">
                            5. Accuracy of Materials
                        </h2>
                        <p class="text-gray-600 dark:text-gray-400">
                            The materials appearing on NexBuy's website could include technical, typographical, or photographic errors. NexBuy does not warrant that any of the materials on its website are accurate, complete or current. NexBuy may make changes to the materials contained on its website at any time without notice.
                        </p>
                    </section>

                    <!-- Links -->
                    <section class="reveal-child">
                        <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">
                            6. Links
                        </h2>
                        <p class="text-gray-600 dark:text-gray-400">
                            NexBuy has not reviewed all of the sites linked to its website and is not responsible for the contents of any such linked site. The inclusion of any link does not imply endorsement by NexBuy of the site. Use of any such linked website is at the user's own risk.
                        </p>
                    </section>

                    <!-- Modifications -->
                    <section class="reveal-child">
                        <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">
                            7. Modifications
                        </h2>
                        <p class="text-gray-600 dark:text-gray-400">
                            NexBuy may revise these terms of service for its website at any time without notice. By using this website you are agreeing to be bound by the then current version of these Terms of Service.
                        </p>
                    </section>

                    <!-- Governing Law -->
                    <section class="reveal-child">
                        <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">
                            8. Governing Law
                        </h2>
                        <p class="text-gray-600 dark:text-gray-400">
                            These terms and conditions are governed by and construed in accordance with the laws and you irrevocably submit to the exclusive jurisdiction of the courts in that State or location.
                        </p>
                    </section>
                </div>

                <!-- Last Updated -->
                <div class="mt-12 pt-8 border-t border-gray-200 dark:border-gray-700 text-center reveal-child">
                    <p class="text-sm text-gray-500 dark:text-gray-400">
                        <strong>Last Updated:</strong> {{ date('F j, Y') }}
                    </p>
                    <p class="text-sm text-gray-500 dark:text-gray-400 mt-2">
                        For questions about these Terms of Service, please contact us at 
                        <a href="mailto:legal@nexbuy.com" class="text-blue-600 dark:text-blue-400 hover:underline">legal@nexbuy.com</a>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Contact Section -->
    <div class="bg-white dark:bg-gray-800 py-16 reveal-on-scroll">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-6 reveal-child">
                Questions About Our Terms?
            </h2>
            <p class="text-lg text-gray-600 dark:text-gray-400 mb-8 reveal-child">
                If you have any questions about these terms or need clarification, our team is here to help.
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
