@extends('layouts.app')

@section('title', 'Products')
@section('meta_description', 'Browse our extensive collection of quality products at competitive prices')

@section('content')
<!-- Hero Section -->
<style>
/* Custom dropdown styling for better contrast */
select#sort {
    background-color: #6e3bdb !important;
    color: white !important;
    border-color: #543f88 !important;
}

select#sort option {
    background-color: rgb(26, 33, 56) !important;
    color: white !important;
    padding: 8px !important;
}

select#sort option:hover {
    background-color: #1d4ed8 !important;
}

select#sort option:checked,
select#sort option:selected {
    background-color: #2563eb !important;
}

/* Ensure dropdown arrow is visible */
select#sort {
    background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%23ffffff' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='m6 8 4 4 4-4'/%3e%3c/svg%3e") !important;
    background-position: right 0.5rem center !important;
    background-repeat: no-repeat !important;
    background-size: 1.5em 1.5em !important;
    padding-right: 2.5rem !important;
}
</style>

<section class="relative overflow-hidden bg-gradient-to-br from-blue-600 via-purple-600 to-indigo-700">
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-10">
        <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,%3Csvg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%23ffffff" fill-opacity="0.1"%3E%3Ccircle cx="30" cy="30" r="2"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
    </div>
    
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 lg:py-20">
        <div class="text-center">
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-6 leading-tight">
                All Products
            </h1>
            <p class="text-xl text-blue-100 mb-8 max-w-3xl mx-auto leading-relaxed">
                {{ $products->total() }} products found
                @if(request('q'))
                    for "{{ request('q') }}"
                @endif
                @if(request('category'))
                    in {{ request('category') }}
                @endif
            </p>
            
            <!-- Sort Options -->
            <div class="flex items-center justify-center space-x-4">
                <label for="sort" class="text-sm font-medium text-blue-200">Sort by:</label>
                <select id="sort" name="sort" onchange="updateSort(this.value)" class="rounded-xl px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-300 focus:border-transparent transition-all duration-300">
                    <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>Newest</option>
                    <option value="price_low" {{ request('sort') == 'price_low' ? 'selected' : '' }}>Price: Low to High</option>
                    <option value="price_high" {{ request('sort') == 'price_high' ? 'selected' : '' }}>Price: High to Low</option>
                    <option value="name" {{ request('sort') == 'name' ? 'selected' : '' }}>Name A-Z</option>
                </select>
            </div>
        </div>
    </div>
    
    <!-- Floating Elements -->
    <div class="absolute top-20 left-10 w-20 h-20 bg-white/10 rounded-full blur-xl animate-pulse"></div>
    <div class="absolute bottom-20 right-10 w-32 h-32 bg-purple-400/20 rounded-full blur-xl animate-pulse delay-1000"></div>
</section>

<!-- Products Content -->
<section class="py-16 bg-gray-50 dark:bg-gray-900">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="flex flex-col lg:flex-row gap-8">
            <!-- Filters Sidebar -->
            <div class="lg:w-64 flex-shrink-0">
                <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg border border-gray-200 dark:border-gray-700 p-6 hover:shadow-xl transition-all duration-300">
                    <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-6">Filters</h3>
                    
                    <!-- Search -->
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Search</label>
                        <form method="GET" action="{{ route('products.index') }}" class="relative">
                            <input type="text" name="q" value="{{ request('q') }}" placeholder="Search products..."
                                   class="w-full pl-10 pr-4 py-3 border border-gray-300 dark:border-gray-600 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-white dark:bg-gray-700 text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 transition-all duration-300">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </div>
                        </form>
                    </div>

                    <!-- Categories -->
                    <div class="mb-6">
                        <h4 class="text-sm font-medium text-gray-700 dark:text-gray-300 mb-3">Categories</h4>
                        <div class="space-y-2">
                            @foreach($categories as $category)
                                <label class="flex items-center">
                                    <input type="checkbox" name="category[]" value="{{ $category->id }}" 
                                           {{ in_array($category->id, request('category', [])) ? 'checked' : '' }}
                                           onchange="updateFilters()"
                                           class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                                    <span class="ml-2 text-sm text-gray-700 dark:text-gray-300">{{ $category->name }}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>

                    <!-- Price Range -->
                    <div class="mb-6">
                        <h4 class="text-sm font-medium text-gray-700 dark:text-gray-300 mb-3">Price Range</h4>
                        <div class="space-y-3">
                            <div>
                                <label class="block text-xs text-gray-500 dark:text-gray-400 mb-1">Min Price</label>
                                <input type="number" name="min_price" value="{{ request('min_price') }}" placeholder="0"
                                       onchange="updateFilters()"
                                       class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-white dark:bg-gray-700 text-gray-900 dark:text-white text-sm transition-all duration-300">
                            </div>
                            <div>
                                <label class="block text-xs text-gray-500 dark:text-gray-400 mb-1">Max Price</label>
                                <input type="number" name="max_price" value="{{ request('max_price') }}" placeholder="1000"
                                       onchange="updateFilters()"
                                       class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-white dark:bg-gray-700 text-gray-900 dark:text-white text-sm transition-all duration-300">
                            </div>
                        </div>
                    </div>

                    <!-- Clear Filters -->
                    @if(request()->hasAny(['q', 'category', 'min_price', 'max_price', 'sort']))
                        <button onclick="clearFilters()" class="w-full bg-gradient-to-r from-gray-100 to-gray-200 dark:from-gray-700 dark:to-gray-600 text-gray-700 dark:text-gray-300 py-3 px-4 rounded-xl text-sm font-medium hover:from-gray-200 hover:to-gray-300 dark:hover:from-gray-600 dark:hover:to-gray-500 transition-all duration-300 transform hover:scale-105">
                            Clear All Filters
                        </button>
                    @endif
                </div>
            </div>

            <!-- Products Grid -->
            <div class="flex-1">
                @if($products->count() > 0)
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                        @foreach($products as $product)
                            <x-product-card :product="$product" />
                        @endforeach
                    </div>

                    <!-- Pagination -->
                    <div class="mt-12">
                        {{ $products->appends(request()->query())->links() }}
                    </div>
                @else
                    <!-- Empty State -->
                    <div class="text-center py-16">
                        <div class="w-24 h-24 bg-gradient-to-br from-blue-500 to-purple-600 rounded-full flex items-center justify-center mx-auto mb-6">
                            <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">No products found</h3>
                        <p class="text-gray-600 dark:text-gray-400 mb-8 text-lg">
                            Try adjusting your search criteria or browse our categories
                        </p>
                        <a href="{{ route('products.index') }}" class="inline-flex items-center space-x-2 bg-gradient-to-r from-blue-600 to-purple-600 text-white px-8 py-4 rounded-xl font-medium hover:shadow-xl transition-all duration-300 transform hover:scale-105">
                            <span>Browse All Products</span>
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                            </svg>
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>

<script>
function updateSort(value) {
    const url = new URL(window.location);
    url.searchParams.set('sort', value);
    window.location.href = url.toString();
}

function updateFilters() {
    const form = document.createElement('form');
    form.method = 'GET';
    form.action = '{{ route("products.index") }}';

    // Add search query
    const searchInput = document.querySelector('input[name="q"]');
    if (searchInput && searchInput.value) {
        const input = document.createElement('input');
        input.type = 'hidden';
        input.name = 'q';
        input.value = searchInput.value;
        form.appendChild(input);
    }

    // Add category filters
    const categoryCheckboxes = document.querySelectorAll('input[name="category[]"]:checked');
    categoryCheckboxes.forEach(checkbox => {
        const input = document.createElement('input');
        input.type = 'hidden';
        input.name = 'category[]';
        input.value = checkbox.value;
        form.appendChild(input);
    });

    // Add price filters
    const minPrice = document.querySelector('input[name="min_price"]');
    const maxPrice = document.querySelector('input[name="max_price"]');
    if (minPrice && minPrice.value) {
        const input = document.createElement('input');
        input.type = 'hidden';
        input.name = 'min_price';
        input.value = minPrice.value;
        form.appendChild(input);
    }
    if (maxPrice && maxPrice.value) {
        const input = document.createElement('input');
        input.type = 'hidden';
        input.name = 'max_price';
        input.value = maxPrice.value;
        form.appendChild(input);
    }

    // Add sort
    const sortSelect = document.getElementById('sort');
    if (sortSelect && sortSelect.value) {
        const input = document.createElement('input');
        input.type = 'hidden';
        input.name = 'sort';
        input.value = sortSelect.value;
        form.appendChild(input);
    }

    document.body.appendChild(form);
    form.submit();
}

function clearFilters() {
    window.location.href = '{{ route("products.index") }}';
}
</script>
@endsection
