@extends('layouts.app')

@section('title', $product->name)
@section('meta_description', $product->description)

@section('content')
<!-- Hero Section -->
<section class="relative overflow-hidden bg-gradient-to-br from-blue-600 via-purple-600 to-indigo-700">
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-10">
        <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,%3Csvg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%23ffffff" fill-opacity="0.1"%3E%3Ccircle cx="30" cy="30" r="2"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
    </div>
    
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 lg:py-20">
        <div class="text-center">
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-6 leading-tight">
                {{ $product->name }}
            </h1>
            <p class="text-xl text-blue-100 mb-8 max-w-3xl mx-auto leading-relaxed">
                {{ $product->description }}
            </p>
        </div>
    </div>
    
    <!-- Floating Elements -->
    <div class="absolute top-20 left-10 w-20 h-20 bg-white/10 rounded-full blur-xl animate-pulse"></div>
    <div class="absolute bottom-20 right-10 w-32 h-32 bg-purple-400/20 rounded-full blur-xl animate-pulse delay-1000"></div>
</section>

<!-- Product Content -->
<section class="py-16 bg-gray-50 dark:bg-gray-900">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Breadcrumbs -->
        <nav class="flex mb-8" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="{{ route('home') }}" class="text-blue-200 hover:text-white transition-colors duration-200">
                        Home
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="w-4 h-4 text-blue-200 mx-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        <a href="{{ route('products.index') }}" class="text-blue-200 hover:text-white transition-colors duration-200">
                            Products
                        </a>
                    </div>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="w-4 h-4 text-blue-200 mx-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        <a href="{{ route('categories.show', $product->category->slug) }}" class="text-blue-200 hover:text-white transition-colors duration-200">
                            {{ $product->category->name }}
                        </a>
                    </div>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="w-4 h-4 text-blue-200 mx-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="text-white">{{ $product->name }}</span>
                    </div>
                </li>
            </ol>
        </nav>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <!-- Product Images -->
            <div class="space-y-4">
                <!-- Main Image -->
                <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg border border-gray-200 dark:border-gray-700 overflow-hidden">
                    @if($product->images->count() > 0)
                        <img id="mainImage" src="{{ $product->images->first()->url }}" 
                             alt="{{ $product->images->first()->alt_text ?? $product->name }}" 
                             class="w-full h-96 object-cover">
                    @elseif($product->featured_image_url)
                        <img id="mainImage" src="{{ $product->featured_image_url }}" 
                             alt="{{ $product->name }}" 
                             class="w-full h-96 object-cover">
                    @else
                        <div class="w-full h-96 bg-gradient-to-br from-gray-100 to-gray-200 dark:from-gray-700 dark:to-gray-600 flex items-center justify-center">
                            <svg class="w-24 h-24 text-gray-400 dark:text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                    @endif
                </div>

                <!-- Thumbnail Images -->
                @if($product->images->count() > 1)
                    <div class="grid grid-cols-4 gap-4">
                        @foreach($product->images as $image)
                            <button onclick="changeMainImage('{{ $image->url }}')" 
                                    class="bg-white dark:bg-gray-800 rounded-lg shadow-md border border-gray-200 dark:border-gray-700 overflow-hidden hover:shadow-lg transition-shadow duration-200">
                                <img src="{{ $image->url }}" 
                                     alt="{{ $product->name }}" 
                                     class="w-full h-24 object-cover">
                            </button>
                        @endforeach
                    </div>
                @endif
            </div>

            <!-- Product Info -->
            <div class="space-y-6">
                <!-- Product Header -->
                <div>
                    <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-2">
                        {{ $product->name }}
                    </h1>
                    <div class="flex items-center space-x-4 mb-4">
                        <span class="text-sm text-gray-600 dark:text-gray-400">
                            SKU: {{ $product->sku ?? 'N/A' }}
                        </span>
                        <span class="text-sm text-gray-500 dark:text-gray-400">•</span>
                        <span class="text-sm text-gray-600 dark:text-gray-400">
                            {{ $product->reviews->count() }} reviews
                        </span>
                    </div>
                </div>

                <!-- Price -->
                <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg border border-gray-200 dark:border-gray-700 p-6 hover:shadow-xl transition-all duration-300">
                    <div class="flex items-baseline space-x-2 mb-4">
                        <span class="text-3xl font-bold text-gray-900 dark:text-white">
                            ${{ number_format($product->final_price, 2) }}
                        </span>
                        @if($product->discount_price)
                            <span class="text-lg text-gray-500 dark:text-gray-400 line-through">
                                ${{ number_format($product->price, 2) }}
                            </span>
                            <span class="text-sm bg-red-100 text-red-800 px-2 py-1 rounded-full">
                                {{ $product->discount_percentage }}% OFF
                            </span>
                        @endif
                    </div>

                    <!-- Variants -->
                    @if($product->variants->count() > 1)
                        <div class="mb-6">
                            <h3 class="text-sm font-medium text-gray-700 dark:text-gray-300 mb-3">Select Variant</h3>
                            <div class="grid grid-cols-2 gap-3">
                                @foreach($product->variants as $variant)
                                    <button onclick="selectVariant({{ $variant->id }}, {{ $variant->price }}, {{ $variant->stock }})" 
                                            class="variant-btn p-3 border border-gray-300 dark:border-gray-600 rounded-lg text-left hover:border-blue-500 dark:hover:border-blue-400 transition-colors duration-200"
                                            data-variant-id="{{ $variant->id }}">
                                        <div class="font-medium text-gray-900 dark:text-white">{{ $variant->name }}</div>
                                        <div class="text-sm text-gray-600 dark:text-gray-400">${{ number_format($variant->price, 2) }}</div>
                                        <div class="text-xs text-gray-500 dark:text-gray-500">
                                            {{ $variant->stock > 0 ? $variant->stock . ' in stock' : 'Out of stock' }}
                                        </div>
                                    </button>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    <!-- Add to Cart -->
                    <div class="space-y-4">
                        <div class="flex items-center space-x-4">
                            <label for="quantity" class="text-sm font-medium text-gray-700 dark:text-gray-300">Quantity:</label>
                            <div class="flex items-center border border-gray-300 dark:border-gray-600 rounded-lg">
                                <button onclick="updateQuantity(-1)" class="px-3 py-2 text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white transition-colors duration-200">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"></path>
                                    </svg>
                                </button>
                                <input type="number" id="quantity" value="1" min="1" max="99"
                                       class="w-16 text-center border-0 bg-transparent text-gray-900 dark:text-white focus:ring-0">
                                <button onclick="updateQuantity(1)" class="px-3 py-2 text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white transition-colors duration-200">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <div class="flex space-x-4">
                            @auth
                                <button onclick="addToCart()" 
                                        class="flex-1 bg-gradient-to-r from-blue-600 to-purple-600 text-white py-4 px-6 rounded-xl font-bold hover:shadow-xl transition-all duration-300 transform hover:scale-105">
                                    Add to Cart
                                </button>
                                <button onclick="addToWishlist()" 
                                        class="px-4 py-4 border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 rounded-xl hover:bg-gray-50 dark:hover:bg-gray-700 transition-all duration-300 transform hover:scale-105">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                    </svg>
                                </button>
                            @else
                                <a href="{{ route('login') }}" 
                                   class="flex-1 bg-gradient-to-r from-blue-600 to-purple-600 text-white py-4 px-6 rounded-xl font-bold hover:shadow-xl transition-all duration-300 transform hover:scale-105 text-center">
                                    Login to Purchase
                                </a>
                            @endauth
                        </div>
                    </div>
                </div>

                <!-- Description -->
                <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg border border-gray-200 dark:border-gray-700 p-6 hover:shadow-xl transition-all duration-300">
                    <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-4">Description</h3>
                    <div class="prose prose-gray dark:prose-invert max-w-none">
                        <p class="text-gray-600 dark:text-gray-400 leading-relaxed">
                            {{ $product->description }}
                        </p>
                    </div>
                </div>

                <!-- Product Details -->
                <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg border border-gray-200 dark:border-gray-700 p-6 hover:shadow-xl transition-all duration-300">
                    <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-4">Product Details</h3>
                    <div class="grid grid-cols-2 gap-4 text-sm">
                        <div>
                            <span class="text-gray-500 dark:text-gray-400">Category:</span>
                            <span class="ml-2 text-gray-900 dark:text-white">{{ $product->category->name }}</span>
                        </div>
                        <div>
                            <span class="text-gray-500 dark:text-gray-400">SKU:</span>
                            <span class="ml-2 text-gray-900 dark:text-white">{{ $product->sku ?? 'N/A' }}</span>
                        </div>
                        <div>
                            <span class="text-gray-500 dark:text-gray-400">Stock:</span>
                            <span class="ml-2 text-gray-900 dark:text-white">{{ $product->stock }}</span>
                        </div>
                        <div>
                            <span class="text-gray-500 dark:text-gray-400">Reviews:</span>
                            <span class="ml-2 text-gray-900 dark:text-white">{{ $product->reviews->count() }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Reviews Section -->
        @if($product->reviews->count() > 0)
            <div class="mt-16">
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-8">Customer Reviews</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    @foreach($product->reviews->take(6) as $review)
                        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg border border-gray-200 dark:border-gray-700 p-6 hover:shadow-xl transition-all duration-300">
                            <div class="flex items-center justify-between mb-4">
                                <div class="flex items-center space-x-3">
                                    <div class="w-10 h-10 bg-gradient-to-br from-blue-600 to-purple-600 rounded-full flex items-center justify-center">
                                        <span class="text-white font-medium text-sm">{{ substr($review->user->name, 0, 1) }}</span>
                                    </div>
                                    <div>
                                        <div class="font-bold text-gray-900 dark:text-white">{{ $review->user->name }}</div>
                                        <div class="text-sm text-gray-500 dark:text-gray-400">{{ $review->created_at->diffForHumans() }}</div>
                                    </div>
                                </div>
                            </div>
                            <p class="text-gray-600 dark:text-gray-400">{{ $review->comment }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        <!-- Related Products -->
        @if($relatedProducts->count() > 0)
            <div class="mt-16">
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-8">Related Products</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    @foreach($relatedProducts as $relatedProduct)
                        <x-product-card :product="$relatedProduct" />
                    @endforeach
                </div>
            </div>
        @endif
    </div>
</section>

<script>
let selectedVariantId = {{ $product->variants->first()->id }};
let selectedVariantPrice = {{ $product->variants->first()->price }};
let selectedVariantStock = {{ $product->variants->first()->stock }};

function changeMainImage(url) {
    document.getElementById('mainImage').src = url;
}

function selectVariant(variantId, price, stock) {
    selectedVariantId = variantId;
    selectedVariantPrice = price;
    selectedVariantStock = stock;
    
    // Update UI
    document.querySelectorAll('.variant-btn').forEach(btn => {
        btn.classList.remove('border-blue-500', 'dark:border-blue-400');
        btn.classList.add('border-gray-300', 'dark:border-gray-600');
    });
    
    event.target.closest('.variant-btn').classList.remove('border-gray-300', 'dark:border-gray-600');
    event.target.closest('.variant-btn').classList.add('border-blue-500', 'dark:border-blue-400');
}

function updateQuantity(change) {
    const input = document.getElementById('quantity');
    const newValue = Math.max(1, Math.min(99, parseInt(input.value) + change));
    input.value = newValue;
}

function addToCart() {
    const quantity = parseInt(document.getElementById('quantity').value);
    
    fetch(`/cart/add/{{ $product->id }}`, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({ quantity: quantity })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            showNotification('Product added to cart!', 'success');
            location.reload();
        } else {
            showNotification(data.message || 'Error adding to cart', 'error');
        }
    })
    .catch(error => {
        showNotification('Error adding to cart', 'error');
    });
}

function addToWishlist() {
    fetch(`/wishlist/add/{{ $product->id }}`, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            'Content-Type': 'application/json',
        },
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            showNotification('Product added to wishlist!', 'success');
        } else {
            showNotification(data.message || 'Error adding to wishlist', 'error');
        }
    })
    .catch(error => {
        showNotification('Error adding to wishlist', 'error');
    });
}

function showNotification(message, type) {
    const notification = document.createElement('div');
    notification.className = `fixed top-4 right-4 z-50 px-6 py-3 rounded-lg shadow-lg text-white font-medium transition-all duration-300 transform translate-x-full`;
    
    if (type === 'success') {
        notification.className += ' bg-green-500';
    } else {
        notification.className += ' bg-red-500';
    }
    
    notification.textContent = message;
    document.body.appendChild(notification);
    
    setTimeout(() => {
        notification.classList.remove('translate-x-full');
    }, 100);
    
    setTimeout(() => {
        notification.classList.add('translate-x-full');
        setTimeout(() => {
            document.body.removeChild(notification);
        }, 300);
    }, 3000);
}
</script>
@endsection
