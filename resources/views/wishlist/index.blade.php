@extends('layouts.app')

@section('title', 'My Wishlist - NexBuy')
@section('meta_description', 'View and manage your wishlist items at NexBuy.')

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
                My Wishlist
            </h1>
            <p class="text-xl text-blue-100 mb-8 max-w-3xl mx-auto leading-relaxed">
                Save your favorite products for later and never miss out on the items you love
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                <a href="{{ route('products.index') }}" class="group bg-white text-blue-600 px-8 py-4 rounded-full font-semibold text-lg hover:shadow-2xl transition-all duration-300 hover-lift flex items-center space-x-2">
                    <span>Continue Shopping</span>
                    <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                    </svg>
                </a>
            </div>
        </div>
    </div>
    
    <!-- Floating Elements -->
    <div class="absolute top-20 left-10 w-20 h-20 bg-white/10 rounded-full blur-xl animate-pulse"></div>
    <div class="absolute bottom-20 right-10 w-32 h-32 bg-purple-400/20 rounded-full blur-xl animate-pulse delay-1000"></div>
</section>

<!-- Wishlist Section -->
<section class="py-16 bg-gray-50 dark:bg-gray-900">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @if($wishlist && $wishlist->items->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                @foreach($wishlist->items as $item)
                    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg border border-gray-200 dark:border-gray-700 overflow-hidden hover:shadow-xl transition-all duration-300 hover:-translate-y-1 group flex flex-col h-full">
                        <!-- Product Image -->
                        <div class="relative overflow-hidden flex-shrink-0">
                            <img src="{{ $item->product->featured_image_url }}" 
                                 alt="{{ $item->product->name }}"
                                 class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300">
                            
                            <!-- Remove from Wishlist Button -->
                            <button onclick="removeFromWishlist({{ $item->id }})" 
                                    class="absolute top-3 right-3 p-2 bg-white/80 backdrop-blur-sm rounded-full text-gray-600 hover:text-red-500 hover:bg-white transition-all duration-200 opacity-0 group-hover:opacity-100">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </button>
                            
                            @if($item->product->discount_price)
                                <div class="absolute top-3 left-3">
                                    <span class="bg-gradient-to-r from-red-500 to-pink-500 text-white px-3 py-1 rounded-full text-xs font-semibold">
                                        -{{ $item->product->discount_percentage }}%
                                    </span>
                                </div>
                            @endif
                        </div>
                        
                        <!-- Product Info -->
                        <div class="p-6 flex flex-col flex-grow">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2 group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors duration-200 line-clamp-2 min-h-[3.5rem]">
                                <a href="{{ route('products.show', $item->product->slug) }}">
                                    {{ $item->product->name }}
                                </a>
                            </h3>
                            
                            <p class="text-sm text-gray-600 dark:text-gray-400 mb-4 line-clamp-2 min-h-[2.5rem]">
                                {{ Str::limit($item->product->description, 100) }}
                            </p>
                            
                            <!-- Price -->
                            <div class="flex items-center justify-between mb-4">
                                <div class="flex items-center space-x-2">
                                    @if($item->product->discount_price)
                                        <span class="text-xl font-bold text-gray-900 dark:text-white">
                                            ${{ number_format($item->product->discount_price, 2) }}
                                        </span>
                                        <span class="text-sm text-gray-500 line-through">
                                            ${{ number_format($item->product->price, 2) }}
                                        </span>
                                    @else
                                        <span class="text-xl font-bold text-gray-900 dark:text-white">
                                            ${{ number_format($item->product->price, 2) }}
                                        </span>
                                    @endif
                                </div>
                            </div>
                            
                            <!-- Actions - Now positioned at the bottom -->
                            <div class="mt-auto pt-3 space-y-3">
                                <a href="{{ route('products.show', $item->product->slug) }}" 
                                   class="w-full bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 text-white text-sm font-semibold py-3 px-4 rounded-xl transition-all duration-200 text-center block hover:shadow-lg">
                                    View Details
                                </a>
                                
                                @if($item->product->stock > 0)
                                    <button onclick="addToCart({{ $item->product->id }})" 
                                            class="w-full bg-gradient-to-r from-green-600 to-emerald-600 hover:from-green-700 hover:to-emerald-700 text-white text-sm font-semibold py-3 px-4 rounded-xl transition-all duration-200 hover:shadow-lg">
                                        Add to Cart
                                    </button>
                                @else
                                    <button disabled 
                                            class="w-full bg-gray-400 text-white text-sm font-semibold py-3 px-4 rounded-xl cursor-not-allowed">
                                        Out of Stock
                                    </button>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <!-- Empty Wishlist -->
            <div class="text-center py-20">
                <div class="mx-auto w-32 h-32 bg-gradient-to-br from-blue-100 to-purple-100 dark:from-blue-900 dark:to-purple-900 rounded-full flex items-center justify-center mb-8">
                    <svg class="w-16 h-16 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                    </svg>
                </div>
                <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-4">
                    Your wishlist is empty
                </h2>
                <p class="text-lg text-gray-600 dark:text-gray-400 mb-8 max-w-md mx-auto">
                    Start adding products to your wishlist to save them for later. You can add items from any product page.
                </p>
                <a href="{{ route('products.index') }}" class="inline-flex items-center space-x-2 bg-gradient-to-r from-blue-600 to-purple-600 text-white px-8 py-4 rounded-full font-semibold hover:shadow-lg transition-all duration-200 hover-lift">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    <span>Start Shopping</span>
                </a>
            </div>
        @endif
    </div>
</section>

<script>
function addToCart(productId) {
    fetch(`/cart/add/${productId}`, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({ quantity: 1 })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            showNotification('Product added to cart!', 'success');
        } else {
            showNotification(data.message || 'Error adding to cart', 'error');
        }
    })
    .catch(error => {
        showNotification('Error adding to cart', 'error');
    });
}

function removeFromWishlist(productId) {
    if (confirm('Are you sure you want to remove this item from your wishlist?')) {
        fetch(`/wishlist/remove/${productId}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Content-Type': 'application/json',
            },
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                showNotification('Product removed from wishlist!', 'success');
                location.reload();
            } else {
                showNotification(data.message || 'Error removing from wishlist', 'error');
            }
        })
        .catch(error => {
            showNotification('Error removing from wishlist', 'error');
        });
    }
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
