@extends('layouts.app')

@section('title', 'About Us - NexBuy')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-gray-50 to-gray-100 dark:from-gray-900 dark:to-gray-800">
    <!-- Header Section -->
    <div class="bg-white dark:bg-gray-800 shadow-sm reveal-on-scroll">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="text-center">
                <h1 class="text-4xl font-bold text-gray-900 dark:text-white mb-4 reveal-child">
                    About NexBuy
                </h1>
                <p class="text-lg text-gray-600 dark:text-gray-400 reveal-child">
                    Your trusted partner for quality products and exceptional shopping experiences.
                </p>
            </div>
        </div>
    </div>

    <!-- Mission Section -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 reveal-on-scroll">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div>
                <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-6 reveal-child">
                    Our Mission
                </h2>
                <p class="text-lg text-gray-600 dark:text-gray-400 mb-6 reveal-child">
                    At NexBuy, we're committed to providing our customers with the highest quality products at competitive prices. Our mission is to make premium shopping accessible to everyone while maintaining the highest standards of customer service.
                </p>
                <p class="text-lg text-gray-600 dark:text-gray-400 reveal-child">
                    We believe that every customer deserves a seamless shopping experience, from browsing our carefully curated selection to receiving their order at their doorstep.
                </p>
            </div>
            <div class="relative reveal-child">
                <div class="w-full h-96 bg-gradient-to-br from-blue-600 to-purple-600 rounded-2xl shadow-xl flex items-center justify-center">
                    <div class="text-center text-white">
                        <div class="w-24 h-24 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-4">
                            <span class="text-4xl font-black">N</span>
                        </div>
                        <h3 class="text-2xl font-bold">Quality First</h3>
                        <p class="text-blue-100">Every product, every time</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Values Section -->
    <div class="bg-white dark:bg-gray-800 py-16 reveal-on-scroll">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-4 reveal-child">
                    Our Core Values
                </h2>
                <p class="text-lg text-gray-600 dark:text-gray-400 reveal-child">
                    The principles that guide everything we do
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Value 1 -->
                <div class="text-center reveal-child">
                    <div class="w-16 h-16 bg-blue-100 dark:bg-blue-900 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">Quality Assurance</h3>
                    <p class="text-gray-600 dark:text-gray-400">
                        Every product undergoes rigorous quality checks to ensure it meets our high standards.
                    </p>
                </div>

                <!-- Value 2 -->
                <div class="text-center reveal-child">
                    <div class="w-16 h-16 bg-purple-100 dark:bg-purple-900 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-purple-600 dark:text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">Customer First</h3>
                    <p class="text-gray-600 dark:text-gray-400">
                        Your satisfaction is our priority. We're here to help with every step of your shopping journey.
                    </p>
                </div>

                <!-- Value 3 -->
                <div class="text-center reveal-child">
                    <div class="w-16 h-16 bg-green-100 dark:bg-green-900 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">Innovation</h3>
                    <p class="text-gray-600 dark:text-gray-400">
                        We continuously improve our platform and services to provide the best possible shopping experience.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Story Section -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div class="relative">
                <div class="w-full h-96 bg-gradient-to-br from-green-600 to-blue-600 rounded-2xl shadow-xl flex items-center justify-center">
                    <div class="text-center text-white">
                        <div class="w-24 h-24 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold">Our Story</h3>
                        <p class="text-green-100">Building the future of shopping</p>
                    </div>
                </div>
            </div>
            <div>
                <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-6">
                    Our Story
                </h2>
                <p class="text-lg text-gray-600 dark:text-gray-400 mb-6">
                    Founded with a vision to revolutionize online shopping, NexBuy has grown from a small startup to a trusted name in e-commerce. Our journey has been driven by a passion for quality and a commitment to customer satisfaction.
                </p>
                <p class="text-lg text-gray-600 dark:text-gray-400 mb-6">
                    Today, we serve customers worldwide, offering a carefully curated selection of products that combine quality, style, and value. Our team of experts works tirelessly to ensure every aspect of your shopping experience exceeds expectations.
                </p>
                <p class="text-lg text-gray-600 dark:text-gray-400">
                    As we continue to grow, our commitment to excellence remains unwavering. We're excited about the future and look forward to serving you for many years to come.
                </p>
            </div>
        </div>
    </div>

    <!-- Team Section -->
    <div class="bg-white dark:bg-gray-800 py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-4">
                    Meet Our Team
                </h2>
                <p class="text-lg text-gray-600 dark:text-gray-400">
                    Dedicated professionals committed to your satisfaction
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Team Member 1 -->
                <div class="text-center">
                    <div class="w-24 h-24 bg-gradient-to-br from-blue-600 to-purple-600 rounded-full flex items-center justify-center mx-auto mb-4">
                        <span class="text-2xl font-bold text-white">JD</span>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-1">John Doe</h3>
                    <p class="text-gray-600 dark:text-gray-400">Founder & CEO</p>
                </div>

                <!-- Team Member 2 -->
                <div class="text-center">
                    <div class="w-24 h-24 bg-gradient-to-br from-purple-600 to-pink-600 rounded-full flex items-center justify-center mx-auto mb-4">
                        <span class="text-2xl font-bold text-white">JS</span>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-1">Jane Smith</h3>
                    <p class="text-gray-600 dark:text-gray-400">Head of Operations</p>
                </div>

                <!-- Team Member 3 -->
                <div class="text-center">
                    <div class="w-24 h-24 bg-gradient-to-br from-green-600 to-blue-600 rounded-full flex items-center justify-center mx-auto mb-4">
                        <span class="text-2xl font-bold text-white">MJ</span>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-1">Mike Johnson</h3>
                    <p class="text-gray-600 dark:text-gray-400">Head of Technology</p>
                </div>

                <!-- Team Member 4 -->
                <div class="text-center">
                    <div class="w-24 h-24 bg-gradient-to-br from-red-600 to-orange-600 rounded-full flex items-center justify-center mx-auto mb-4">
                        <span class="text-2xl font-bold text-white">SW</span>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-1">Sarah Wilson</h3>
                    <p class="text-gray-600 dark:text-gray-400">Customer Success</p>
                </div>
            </div>
        </div>
    </div>

    <!-- CTA Section -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="text-center">
            <div class="bg-gradient-to-r from-blue-600 to-purple-600 rounded-2xl shadow-xl p-12">
                <h2 class="text-3xl font-bold text-white mb-4">
                    Ready to Experience NexBuy?
                </h2>
                <p class="text-xl text-blue-100 mb-8">
                    Join thousands of satisfied customers who trust us for their shopping needs.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('products.index') }}" 
                       class="inline-block bg-white text-blue-600 font-bold py-3 px-8 rounded-xl hover:bg-gray-100 transition-all duration-300 hover:scale-105">
                        Shop Now
                    </a>
                    <a href="{{ route('contact') }}" 
                       class="inline-block border-2 border-white text-white font-bold py-3 px-8 rounded-xl hover:bg-white hover:text-blue-600 transition-all duration-300 hover:scale-105">
                        Contact Us
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
