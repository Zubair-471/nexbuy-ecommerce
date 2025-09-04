@extends('layouts.app')

@section('title', 'Welcome')
@section('meta_description', 'Discover amazing products at unbeatable prices on NexBuy - Your premium online marketplace')

@section('content')
<!-- Enhanced Hero Section -->
<section class="relative overflow-hidden bg-gradient-to-br from-blue-600 via-purple-600 to-indigo-700 min-h-screen flex items-center reveal-on-scroll">
    <!-- Enhanced Background Pattern -->
    <div class="absolute inset-0 opacity-10">
        <div class="absolute inset-0 bg-gradient-to-br from-white/5 to-transparent"></div>
    </div>
    
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 lg:py-32 text-center">
        <div>
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-black text-white mb-8 leading-tight reveal-child">
                Discover Amazing
                <span class="block text-transparent bg-clip-text bg-gradient-to-r from-yellow-300 to-orange-300">
                    Products
                </span>
            </h1>
            <p class="text-lg md:text-xl text-blue-100 mb-12 max-w-4xl mx-auto leading-relaxed reveal-child">
                Your premium online marketplace for quality products. Experience shopping redefined with competitive prices and exceptional service.
            </p>
            <div class="flex flex-col sm:flex-row gap-6 justify-center items-center reveal-child">
                <a href="{{ route('products.index') }}" class="group bg-gradient-to-r from-blue-600 to-purple-600 text-white px-10 py-5 rounded-2xl font-bold text-lg hover:scale-105 transition-all duration-500 flex items-center space-x-3 shadow-2xl">
                    <span>Shop Now</span>
                    <svg class="w-6 h-6 group-hover:translate-x-2 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                    </svg>
                </a>
                <a href="{{ route('about') }}" class="border-3 border-white text-white px-10 py-5 rounded-2xl font-bold text-lg hover:bg-white hover:text-blue-600 transition-all duration-500 hover:scale-105 shadow-2xl">
                    Learn More
                </a>
            </div>
        </div>
    </div>
    
    <!-- Enhanced Floating Elements -->
    <div class="absolute top-20 left-10 w-24 h-24 bg-white/10 rounded-full blur-2xl animate-pulse"></div>
    <div class="absolute bottom-20 right-10 w-40 h-40 bg-purple-400/20 rounded-full blur-2xl animate-pulse delay-1000"></div>
    <div class="absolute top-1/2 left-1/4 w-16 h-16 bg-blue-400/20 rounded-full blur-xl animate-bounce"></div>
    <div class="absolute top-1/3 right-1/4 w-20 h-20 bg-pink-400/20 rounded-full blur-xl animate-bounce delay-500"></div>
</section>

<!-- Enhanced Features Section -->
<section class="py-20 bg-gray-50 dark:bg-gray-900 reveal-on-scroll">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
            <div class="text-center group reveal-child">
                <div class="w-20 h-20 bg-gradient-to-br from-blue-600 to-purple-600 rounded-3xl flex items-center justify-center mx-auto mb-6 group-hover:scale-125 transition-transform duration-500 shadow-xl group-hover:shadow-2xl">
                    <svg class="w-10 h-10 text-white group-hover:rotate-12 transition-transform duration-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-4 group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors duration-300">Fast Shipping</h3>
                <p class="text-gray-600 dark:text-gray-400 group-hover:text-gray-700 dark:group-hover:text-gray-300 transition-colors duration-300">Free shipping on orders over $50. Quick delivery to your doorstep.</p>
            </div>
            
            <div class="text-center group reveal-child">
                <div class="w-20 h-20 bg-gradient-to-br from-green-600 to-emerald-600 rounded-3xl flex items-center justify-center mx-auto mb-6 group-hover:scale-125 transition-transform duration-500 shadow-xl group-hover:shadow-2xl">
                    <svg class="w-10 h-10 text-white group-hover:rotate-12 transition-transform duration-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-4 group-hover:text-green-600 dark:group-hover:text-green-400 transition-colors duration-300">Quality Guarantee</h3>
                <p class="text-gray-600 dark:text-gray-400 group-hover:text-gray-700 dark:group-hover:text-gray-300 transition-colors duration-300">All products are carefully selected and quality tested before shipping.</p>
            </div>
            
            <div class="text-center group reveal-child">
                <div class="w-20 h-20 bg-gradient-to-br from-purple-600 to-pink-600 rounded-3xl flex items-center justify-center mx-auto mb-6 group-hover:scale-125 transition-transform duration-500 shadow-xl group-hover:shadow-2xl">
                    <svg class="w-10 h-10 text-white group-hover:rotate-12 transition-transform duration-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192L5.636 18.364M12 2.25a9.75 9.75 0 109.75 9.75A9.75 9.75 0 0012 2.25z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-4 group-hover:text-purple-600 dark:group-hover:text-purple-400 transition-colors duration-300">24/7 Support</h3>
                <p class="text-gray-600 dark:text-gray-400 group-hover:text-gray-700 dark:group-hover:text-gray-300 transition-colors duration-300">Our customer support team is available around the clock to help you.</p>
            </div>
        </div>
    </div>
</section>

<!-- Enhanced Featured Categories -->
<section class="py-20 bg-white dark:bg-gray-800 reveal-on-scroll">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16 reveal-child">
            <h2 class="text-3xl md:text-4xl font-black text-gray-900 dark:text-white mb-6">
                Shop by Category
            </h2>
            <p class="text-lg text-gray-600 dark:text-gray-400 max-w-3xl mx-auto">
                Explore our curated collection of products organized by categories for easy browsing
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($categories as $category)
                <div class="reveal-child">
                    <x-category-card :category="$category" />
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Enhanced Featured Products -->
<section class="py-20 bg-gray-50 dark:bg-gray-900 reveal-on-scroll">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16 reveal-child">
            <h2 class="text-3xl md:text-4xl font-black text-gray-900 dark:text-white mb-6">
                Featured Products
            </h2>
            <p class="text-lg text-gray-600 dark:text-gray-400 max-w-3xl mx-auto">
                Discover our handpicked selection of premium products that our customers love
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
            @foreach($featuredProducts as $product)
                <div class="reveal-child">
                    <x-product-card :product="$product" />
                </div>
            @endforeach
        </div>
        
        <div class="text-center mt-16 reveal-child">
            <a href="{{ route('products.index') }}" class="inline-flex items-center space-x-3 bg-gradient-to-r from-blue-600 to-purple-600 text-white px-10 py-4 rounded-2xl font-bold text-lg hover:scale-105 transition-all duration-500 shadow-2xl">
                <span>View All Products</span>
                <svg class="w-6 h-6 group-hover:translate-x-2 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                </svg>
            </a>
        </div>
    </div>
</section>

<!-- Enhanced Call to Action -->
<section class="py-20 bg-gradient-to-br from-blue-600 via-purple-600 to-indigo-700 relative overflow-hidden reveal-on-scroll">
    <!-- Enhanced Background Pattern -->
    <div class="absolute inset-0 opacity-10">
        <div class="absolute inset-0 bg-gradient-to-br from-white/5 to-transparent"></div>
    </div>
    
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <div>
            <h2 class="text-3xl md:text-4xl font-black text-white mb-8 reveal-child">
                Ready to Start Shopping?
            </h2>
            <p class="text-lg text-blue-100 mb-12 max-w-3xl mx-auto reveal-child">
                Join thousands of satisfied customers who trust NexBuy for their online shopping needs.
            </p>
            <div class="flex flex-col sm:flex-row gap-6 justify-center items-center reveal-child">
                @guest
                    <a href="{{ route('register') }}" class="bg-gradient-to-r from-blue-600 to-purple-600 text-white px-10 py-4 rounded-2xl font-bold text-lg hover:scale-105 transition-all duration-500 shadow-2xl">
                        Create Account
                    </a>
                    <a href="{{ route('login') }}" class="border-3 border-white text-white px-10 py-4 rounded-2xl font-bold text-lg hover:bg-white hover:text-blue-600 transition-all duration-500 hover:scale-105 shadow-2xl">
                        Sign In
                    </a>
                @else
                    <a href="{{ route('products.index') }}" class="bg-gradient-to-r from-blue-600 to-purple-600 text-white px-10 py-4 rounded-2xl font-bold text-lg hover:scale-105 transition-all duration-500 shadow-2xl">
                        Start Shopping
                    </a>
                @endguest
            </div>
        </div>
    </div>
</section>

<!-- Enhanced Newsletter Section -->
<section class="py-20 bg-white dark:bg-gray-800 reveal-on-scroll">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <div>
            <h2 class="text-3xl font-black text-gray-900 dark:text-white mb-6 reveal-child">
                Stay Updated
            </h2>
            <p class="text-lg text-gray-600 dark:text-gray-400 mb-10 max-w-2xl mx-auto reveal-child">
                Get the latest updates on new products, exclusive offers, and special promotions.
            </p>
            <form class="flex flex-col sm:flex-row gap-4 max-w-md mx-auto reveal-child">
                <input type="email" placeholder="Enter your email" class="flex-1 px-6 py-4 border-2 border-gray-300 dark:border-gray-600 rounded-2xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-white dark:bg-gray-700 text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400">
                <button type="submit" class="bg-gradient-to-r from-blue-600 to-purple-600 text-white px-8 py-4 rounded-2xl font-bold hover:scale-105 transition-all duration-500 shadow-xl">
                    Subscribe
                </button>
            </form>
        </div>
    </div>
</section>
@endsection
