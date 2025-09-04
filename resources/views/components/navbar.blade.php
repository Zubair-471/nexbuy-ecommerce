<nav class="bg-white/90 dark:bg-gray-900/90 backdrop-blur-xl border-b border-gray-200/50 dark:border-gray-700/50 sticky top-0 z-40 transition-all duration-500 shadow-lg" x-data="{ mobileMenuOpen: false }" role="navigation" aria-label="Main navigation">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-20">
            <!-- Enhanced Logo -->
            <div class="flex-shrink-0">
                <a href="{{ route('home') }}" class="flex items-center space-x-3 group" aria-label="NexBuy Homepage">
                    <div class="w-10 h-10 bg-gradient-to-br from-blue-600 to-purple-600 rounded-xl flex items-center justify-center group-hover:scale-110 transition-all duration-500 hover:rotate-3 shadow-lg group-hover:shadow-2xl">
                        <span class="text-white font-black text-xl" aria-hidden="true">N</span>
                    </div>
                    <span class="text-2xl font-black gradient-text group-hover:scale-105 transition-transform duration-300">NexBuy</span>
                </a>
            </div>

            <!-- Enhanced Desktop Navigation -->
            <div class="hidden lg:flex lg:items-center lg:space-x-8" role="menubar">
                <a href="{{ route('home') }}" class="nav-link text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 px-4 py-2 text-sm font-semibold transition-all duration-300 hover:scale-105" role="menuitem" aria-label="Go to homepage">
                    Home
                </a>
                <a href="{{ route('products.index') }}" class="nav-link text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 px-4 py-2 text-sm font-semibold transition-all duration-300 hover:scale-105" role="menuitem" aria-label="Browse all products">
                    Products
                </a>
                <a href="{{ route('about') }}" class="nav-link text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 px-4 py-2 text-sm font-semibold transition-all duration-300 hover:scale-105" role="menuitem" aria-label="Learn about NexBuy">
                    About
                </a>
                <a href="{{ route('contact') }}" class="nav-link text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 px-4 py-2 text-sm font-semibold transition-all duration-300 hover:scale-105" role="menuitem" aria-label="Contact NexBuy">
                    Contact
                </a>
            </div>

            <!-- Enhanced Search Bar -->
            <div class="hidden md:flex flex-1 max-w-lg mx-8">
                <div class="relative w-full group">
                    <form action="{{ route('products.index') }}" method="GET" class="relative" role="search">
                        <label for="search-input" class="sr-only">Search products</label>
                        <input type="text" id="search-input" name="q" value="{{ request('q') }}" placeholder="Search products..." 
                               class="w-full pl-12 pr-4 py-3 bg-gray-100/80 dark:bg-gray-800/80 border-2 border-transparent rounded-2xl text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300 form-input group-hover:bg-white dark:group-hover:bg-gray-700 group-hover:shadow-lg"
                               aria-label="Search for products">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400 group-hover:text-blue-500 transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                        <div class="absolute inset-y-0 right-0 pr-4 flex items-center">
                            <div class="w-2 h-2 bg-blue-500 rounded-full opacity-0 group-hover:opacity-100 transition-opacity duration-300" aria-hidden="true"></div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Enhanced Right side -->
            <div class="flex items-center space-x-4">
                <!-- Enhanced Dark Mode Toggle -->
                <button onclick="toggleDarkMode()" class="p-3 text-gray-500 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-400 transition-all duration-300 rounded-xl hover:bg-gray-100 dark:hover:bg-gray-700 hover:scale-110 hover:rotate-12" title="Toggle dark mode" aria-label="Toggle dark mode" aria-pressed="false">
                    <svg class="w-6 h-6 dark:hidden transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path>
                    </svg>
                    <svg class="w-6 h-6 hidden dark:block transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path>
                    </svg>
                </button>

                @auth
                    <!-- Enhanced Cart -->
                    <a href="{{ route('cart.index') }}" class="p-3 text-gray-500 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-400 transition-all duration-300 rounded-xl hover:bg-gray-100 dark:hover:bg-gray-700 hover:scale-110 relative group" title="Shopping Cart" aria-label="View shopping cart">
                        <svg class="h-6 w-6 transition-transform duration-300 group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                        </svg>
                        <div class="absolute -top-1 -right-1 w-5 h-5 bg-red-500 text-white text-xs rounded-full flex items-center justify-center font-bold animate-pulse" aria-label="Cart has items"></div>
                    </a>

                    <!-- Enhanced Wishlist -->
                    <a href="{{ route('wishlist.index') }}" class="p-3 text-gray-500 dark:text-gray-400 hover:text-red-600 dark:hover:text-red-400 transition-all duration-300 rounded-xl hover:bg-gray-100 dark:hover:bg-gray-700 hover:scale-110 group" title="Wishlist" aria-label="View wishlist">
                        <svg class="h-6 w-6 transition-transform duration-300 group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                        </svg>
                    </a>

                    <!-- Enhanced User Menu -->
                    <div class="relative" x-data="{ open: false }">
                        <button @click="open = !open" @click.away="open = false" class="flex items-center space-x-3 p-3 text-gray-500 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-400 transition-all duration-300 rounded-xl hover:bg-gray-100 dark:hover:bg-gray-700 hover:scale-105 group" aria-label="User menu" aria-expanded="false" aria-haspopup="true">
                            <div class="w-10 h-10 bg-gradient-to-br from-blue-600 to-purple-600 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300 shadow-lg group-hover:shadow-xl">
                                <span class="text-white text-sm font-bold" aria-hidden="true">{{ substr(auth()->user()->name, 0, 1) }}</span>
                            </div>
                            <svg class="w-5 h-5 transition-transform duration-300" :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div x-show="open" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95" class="absolute right-0 mt-3 w-56 bg-white dark:bg-gray-800 rounded-2xl shadow-2xl border border-gray-200 dark:border-gray-700 py-3 z-50 backdrop-blur-xl" role="menu" aria-orientation="vertical">
                            <div class="px-4 py-3 border-b border-gray-200 dark:border-gray-700">
                                <p class="text-sm font-bold text-gray-900 dark:text-gray-100">{{ auth()->user()->name }}</p>
                                <p class="text-xs text-gray-500 dark:text-gray-400">{{ auth()->user()->email }}</p>
                            </div>
                            
                            <a href="{{ route('profile.edit') }}" class="block px-4 py-3 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 transition-all duration-200 hover:translate-x-2" role="menuitem" aria-label="Edit profile">
                                <div class="flex items-center space-x-3">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                    <span>Profile</span>
                                </div>
                            </a>

                            @if(auth()->user()->isAdmin())
                            <div class="border-t border-gray-200 dark:border-gray-700 mt-2 pt-2">
    <a href="{{ route('admin.dashboard') }}" class="block px-4 py-3 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 transition-all duration-200 hover:translate-x-2">
        <div class="flex items-center space-x-3">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                                    </svg>
            <span>Dashboard</span>
        </div>
                                </a>
                            </div>
                            @endif
                            
                            <div class="border-t border-gray-200 dark:border-gray-700 mt-2 pt-2">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="block w-full text-left px-4 py-3 text-sm text-red-600 dark:text-red-400 hover:bg-gray-50 dark:hover:bg-gray-700 transition-all duration-200 hover:translate-x-2">
                                        <div class="flex items-center space-x-3">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                                            </svg>
                                            <span>Logout</span>
                                        </div>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @else
                    <!-- Enhanced Guest Actions -->
                    <a href="{{ route('login') }}" class="text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 px-4 py-3 text-sm font-semibold transition-all duration-300 hover:scale-105 nav-link">
                        Login
                    </a>
                    <a href="{{ route('register') }}" class="btn-primary text-white px-6 py-3 rounded-2xl text-sm font-bold hover:scale-105 transition-all duration-300 shadow-lg">
                        Sign Up
                    </a>
                @endauth

                <!-- Enhanced Mobile menu button -->
                <button @click="mobileMenuOpen = !mobileMenuOpen" class="lg:hidden p-3 text-gray-500 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-400 transition-all duration-300 rounded-xl hover:bg-gray-100 dark:hover:bg-gray-700 hover:scale-110" :class="{ 'bg-blue-50 dark:bg-blue-900/20': mobileMenuOpen }">
                    <svg class="h-6 w-6 transition-transform duration-300" :class="{ 'rotate-90': mobileMenuOpen }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Enhanced Mobile menu -->
    <div x-show="mobileMenuOpen" x-transition:enter="transition ease-out duration-500" x-transition:enter-start="opacity-0 -translate-y-4" x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 -translate-y-4" class="lg:hidden bg-white/95 dark:bg-gray-800/95 backdrop-blur-xl border-t border-gray-200/50 dark:border-gray-700/50">
        <div class="px-4 py-8 space-y-6">
            <!-- Enhanced Mobile Search -->
            <div class="relative group">
                <form action="{{ route('products.index') }}" method="GET" class="relative">
                    <input type="text" name="q" value="{{ request('q') }}" placeholder="Search products..." 
                           class="w-full pl-12 pr-4 py-4 bg-gray-100/80 dark:bg-gray-700/80 border-2 border-transparent rounded-2xl text-base focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300 form-input group-hover:bg-white dark:group-hover:bg-gray-600 group-hover:shadow-lg">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                        <svg class="h-6 w-6 text-gray-400 group-hover:text-blue-500 transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                </form>
            </div>

            <!-- Enhanced Mobile Navigation Links -->
            <div class="space-y-3">
                <a href="{{ route('home') }}" class="block px-4 py-4 text-lg font-semibold text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 hover:bg-gray-50 dark:hover:bg-gray-700 rounded-2xl transition-all duration-300 hover:translate-x-2 group">
                    <div class="flex items-center space-x-3">
                        <svg class="w-6 h-6 group-hover:scale-110 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                        </svg>
                        <span>Home</span>
                    </div>
                </a>
                <a href="{{ route('products.index') }}" class="block px-4 py-4 text-lg font-semibold text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 hover:bg-gray-50 dark:hover:bg-gray-700 rounded-2xl transition-all duration-300 hover:translate-x-2 group">
                    <div class="flex items-center space-x-3">
                        <svg class="w-6 h-6 group-hover:scale-110 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                        </svg>
                        <span>Products</span>
                    </div>
                </a>
                <a href="{{ route('about') }}" class="block px-4 py-4 text-lg font-semibold text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 hover:bg-gray-50 dark:hover:bg-gray-700 rounded-2xl transition-all duration-300 hover:translate-x-2 group">
                    <div class="flex items-center space-x-3">
                        <svg class="w-6 h-6 group-hover:scale-110 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span>About</span>
                    </div>
                </a>
                <a href="{{ route('contact') }}" class="block px-4 py-4 text-lg font-semibold text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 hover:bg-gray-50 dark:hover:bg-gray-700 rounded-2xl transition-all duration-300 hover:translate-x-2 group">
                    <div class="flex items-center space-x-3">
                        <svg class="w-6 h-6 group-hover:scale-110 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                        <span>Contact</span>
                    </div>
                </a>
            </div>

            @auth
                @if(auth()->user()->isAdmin())
                <!-- Enhanced Mobile Admin Link -->
                <div class="border-t border-gray-200 dark:border-gray-700 pt-4">
                    <a href="{{ route('admin.dashboard') }}" class="block px-4 py-4 text-lg font-semibold text-blue-600 dark:text-blue-400 hover:bg-blue-50 dark:hover:bg-blue-900/20 rounded-2xl transition-all duration-300 hover:translate-x-2 group">
                        <div class="flex items-center space-x-3">
                            <svg class="w-6 h-6 group-hover:scale-110 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                        </svg>
                            <span>Dashboard</span>
                        </div>
                    </a>
                </div>
                @endif
            @endauth
            
            @guest
                <!-- Enhanced Mobile Guest Actions -->
                <div class="border-t border-gray-200 dark:border-gray-700 pt-4 space-y-3">
                    <a href="{{ route('login') }}" class="block px-4 py-4 text-lg font-semibold text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 hover:bg-gray-50 dark:hover:bg-gray-700 rounded-2xl transition-all duration-300 hover:translate-x-2 group">
                        <div class="flex items-center space-x-3">
                            <svg class="w-6 h-6 group-hover:scale-110 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
                            </svg>
                            <span>Login</span>
                        </div>
                    </a>
                    <a href="{{ route('register') }}" class="block px-4 py-4 text-lg font-semibold btn-primary text-white rounded-2xl text-center hover:scale-105 transition-all duration-300 shadow-lg">
                        <div class="flex items-center justify-center space-x-3">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                            </svg>
                            <span>Sign Up</span>
                        </div>
                    </a>
                </div>
            @endguest
        </div>
    </div>
</nav>
