<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="@yield('meta_description', 'NexBuy - Your premium online marketplace for quality products')">
    <meta name="keywords" content="@yield('meta_keywords', 'ecommerce, online shopping, products, marketplace')">
    <meta name="author" content="NexBuy">

    <title>{{ config('app.name', 'NexBuy') }} - @yield('title', 'Welcome')</title>

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="/favicon.ico">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Enhanced Styles -->
    <style>
        :root {
            --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --secondary-gradient: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            --accent-gradient: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
            --success-gradient: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);
            --warning-gradient: linear-gradient(135deg, #fa709a 0%, #fee140 100%);
            --shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
            --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            --shadow-xl: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
            --shadow-2xl: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        }

        body { 
            font-family: 'Inter', sans-serif; 
            scroll-behavior: smooth;
        }

        /* Enhanced Gradients */
        .gradient-bg { background: var(--primary-gradient); }
        .gradient-bg-secondary { background: var(--secondary-gradient); }
        .gradient-bg-accent { background: var(--accent-gradient); }
        .gradient-bg-success { background: var(--success-gradient); }
        .gradient-bg-warning { background: var(--warning-gradient); }
        
        .gradient-text { 
            background: var(--primary-gradient); 
            -webkit-background-clip: text; 
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        /* Enhanced Shadows */
        .shadow-glow { box-shadow: 0 0 30px rgba(102, 126, 234, 0.15); }
        .shadow-glow-hover { box-shadow: 0 0 40px rgba(102, 126, 234, 0.25); }

        /* Enhanced Animations */
        .hover-lift { 
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1); 
        }
        .hover-lift:hover { 
            transform: translateY(-4px);
            box-shadow: var(--shadow-2xl);
        }

        .hover-scale { 
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1); 
        }
        .hover-scale:hover { 
            transform: scale(1.05);
        }

        /* Smooth Transitions */
        .transition-smooth { transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1); }
        .transition-fast { transition: all 0.15s cubic-bezier(0.4, 0, 0.2, 1); }

        /* Enhanced Button Styles */
        .btn-primary {
            background: var(--primary-gradient);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
        }

        .btn-primary::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s;
        }

        .btn-primary:hover::before {
            left: 100%;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-xl);
        }

        /* Enhanced Card Styles */
        .card-hover {
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            border: 1px solid transparent;
        }

        .card-hover:hover {
            transform: translateY(-8px);
            border-color: rgba(102, 126, 234, 0.2);
            box-shadow: var(--shadow-2xl);
        }

        /* Enhanced Navigation */
        .nav-link {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 0;
            height: 2px;
            background: var(--primary-gradient);
            transition: width 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .nav-link:hover::after {
            width: 100%;
        }

        /* Enhanced Form Elements */
        .form-input {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            border: 2px solid transparent;
        }

        .form-input:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
            transform: translateY(-1px);
        }

        /* Enhanced Loading Animation */
        .loading-pulse {
            animation: loading-pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
        }

        @keyframes loading-pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.5; }
        }

        /* Enhanced Reveal Animations */
        .reveal-on-scroll {
            opacity: 0;
            transform: translateY(50px);
            transition: all 0.8s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .reveal-on-scroll.reveal-active {
            opacity: 1;
            transform: translateY(0);
        }

        .reveal-on-scroll.reveal-left {
            transform: translateX(-50px);
        }

        .reveal-on-scroll.reveal-left.reveal-active {
            transform: translateX(0);
        }

        .reveal-on-scroll.reveal-right {
            transform: translateX(50px);
        }

        .reveal-on-scroll.reveal-right.reveal-active {
            transform: translateX(0);
        }

        .reveal-on-scroll.reveal-up {
            transform: translateY(50px);
        }

        .reveal-on-scroll.reveal-up.reveal-active {
            transform: translateY(0);
        }

        .reveal-on-scroll.reveal-down {
            transform: translateY(-50px);
        }

        .reveal-on-scroll.reveal-down.reveal-active {
            transform: translateY(0);
        }

        .reveal-on-scroll.reveal-scale {
            transform: scale(0.8) translateY(30px);
        }

        .reveal-on-scroll.reveal-scale.reveal-active {
            transform: scale(1) translateY(0);
        }

        .reveal-on-scroll.reveal-rotate {
            transform: rotate(-5deg) translateY(30px);
        }

        .reveal-on-scroll.reveal-rotate.reveal-active {
            transform: rotate(0deg) translateY(0);
        }

        /* Staggered Child Animations */
        .reveal-child {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.6s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .reveal-child.reveal-child-active {
            opacity: 1;
            transform: translateY(0);
        }

        /* Enhanced Fade In Animation */
        .fade-in {
            animation: fadeIn 0.8s ease-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Enhanced Slide In Animation */
        .slide-in-left {
            animation: slideInLeft 0.8s ease-out;
        }

        @keyframes slideInLeft {
            from { opacity: 0; transform: translateX(-30px); }
            to { opacity: 1; transform: translateX(0); }
        }

        .slide-in-right {
            animation: slideInRight 0.8s ease-out;
        }

        @keyframes slideInRight {
            from { opacity: 0; transform: translateX(30px); }
            to { opacity: 1; transform: translateX(0); }
        }

        /* Enhanced Bounce Animation */
        .bounce-in {
            animation: bounceIn 0.8s ease-out;
        }

        @keyframes bounceIn {
            0% { transform: scale(0.3); opacity: 0; }
            50% { transform: scale(1.05); }
            70% { transform: scale(0.9); }
            100% { transform: scale(1); opacity: 1; }
        }

        /* Responsive Typography */
        .text-responsive-xs { font-size: clamp(0.75rem, 2vw, 0.875rem); }
        .text-responsive-sm { font-size: clamp(0.875rem, 2.5vw, 1rem); }
        .text-responsive-base { font-size: clamp(1rem, 3vw, 1.125rem); }
        .text-responsive-lg { font-size: clamp(1.125rem, 3.5vw, 1.25rem); }
        .text-responsive-xl { font-size: clamp(1.25rem, 4vw, 1.5rem); }
        .text-responsive-2xl { font-size: clamp(1.5rem, 5vw, 1.875rem); }
        .text-responsive-3xl { font-size: clamp(1.875rem, 6vw, 2.25rem); }
        .text-responsive-4xl { font-size: clamp(2.25rem, 7vw, 3rem); }
        .text-responsive-5xl { font-size: clamp(3rem, 8vw, 4rem); }
        .text-responsive-6xl { font-size: clamp(4rem, 10vw, 6rem); }

        /* Enhanced Scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f5f9;
        }

        ::-webkit-scrollbar-thumb {
            background: linear-gradient(135deg, #667eea, #764ba2);
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(135deg, #5a67d8, #6b46c1);
        }

        /* Dark Mode Enhancements */
        .dark ::-webkit-scrollbar-track {
            background: #1f2937;
        }

        .dark ::-webkit-scrollbar-thumb {
            background: linear-gradient(135deg, #4c51bf, #553c9a);
        }

        .dark ::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(135deg, #434190, #4c1d95);
        }

        /* Accessibility */
        .sr-only {
            position: absolute;
            width: 1px;
            height: 1px;
            padding: 0;
            margin: -1px;
            overflow: hidden;
            clip: rect(0, 0, 0, 0);
            white-space: nowrap;
            border: 0;
        }
    </style>

    @stack('styles')
</head>
<body class="font-sans antialiased bg-gray-50 dark:bg-gray-900 text-gray-900 dark:text-gray-100 transition-colors duration-500">


    <div class="min-h-screen flex flex-col">
        <!-- Navigation -->
        @include('components.navbar')

        <!-- Main Content -->
        <main class="flex-1">
            <!-- Alerts -->
            @include('components.alerts')
            
            <!-- Page Content -->
            @yield('content')
        </main>

        <!-- Footer -->
        @include('components.footer')
    </div>

    <!-- Enhanced Back to Top Button -->
    <button id="back-to-top" class="fixed bottom-8 right-8 bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 text-white p-4 rounded-full shadow-xl hover:shadow-2xl transition-all duration-500 opacity-0 invisible z-40 hover:scale-110 group">
        <svg class="w-6 h-6 transition-transform duration-300 group-hover:-translate-y-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path>
        </svg>
    </button>

    <!-- Enhanced Scripts -->
    <script defer>
        // Enhanced Back to Top Button
        const backToTop = document.getElementById('back-to-top');
        window.addEventListener('scroll', function() {
            if (window.pageYOffset > 300) {
                backToTop.classList.remove('opacity-0', 'invisible');
                backToTop.classList.add('opacity-100', 'visible');
            } else {
                backToTop.classList.add('opacity-0', 'invisible');
                backToTop.classList.remove('opacity-100', 'visible');
            }
        });

        backToTop.addEventListener('click', function() {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });

        // Enhanced Dark Mode Toggle
        function toggleDarkMode() {
            const html = document.documentElement;
            const isDark = html.classList.contains('dark');
            
            if (isDark) {
                html.classList.remove('dark');
                localStorage.setItem('darkMode', 'false');
                window.dispatchEvent(new CustomEvent('darkModeChanged', { detail: { isDark: false } }));
            } else {
                html.classList.add('dark');
                localStorage.setItem('darkMode', 'true');
                window.dispatchEvent(new CustomEvent('darkModeChanged', { detail: { isDark: true } }));
            }
        }

        // Check for saved dark mode preference
        if (localStorage.getItem('darkMode') === 'true' || 
            (!localStorage.getItem('darkMode') && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        }

        // Make toggleDarkMode globally available
        window.toggleDarkMode = toggleDarkMode;
        
        // Initialize dark mode on page load
        document.addEventListener('DOMContentLoaded', function() {
            if (localStorage.getItem('darkMode') === 'true' || 
                (!localStorage.getItem('darkMode') && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                document.documentElement.classList.add('dark');
            }
        });

        // Enhanced Intersection Observer for reveal animations
        const revealObserverOptions = {
            threshold: 0.15,
            rootMargin: '0px 0px -100px 0px'
        };

        const revealObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    // Add reveal animation class
                    entry.target.classList.add('reveal-active');
                    
                    // Add stagger delay for child elements
                    const children = entry.target.querySelectorAll('.reveal-child');
                    children.forEach((child, index) => {
                        child.style.animationDelay = `${index * 0.1}s`;
                        child.classList.add('reveal-child-active');
                    });
                }
            });
        }, revealObserverOptions);

        // Observe all elements with reveal classes
        document.addEventListener('DOMContentLoaded', function() {
            const revealElements = document.querySelectorAll('.reveal-on-scroll');
            revealElements.forEach(el => revealObserver.observe(el));
            
            // Also observe existing animate-on-scroll elements
            const animatedElements = document.querySelectorAll('.animate-on-scroll');
            animatedElements.forEach(el => {
                if (!el.classList.contains('reveal-on-scroll')) {
                    revealObserver.observe(el);
                }
            });
        });
    </script>

    @stack('scripts')
</body>
</html>
