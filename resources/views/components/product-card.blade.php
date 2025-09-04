@props(['product'])

<div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg border border-gray-200 dark:border-gray-700 overflow-hidden hover:shadow-xl transition-all duration-300 hover:-translate-y-1 flex flex-col h-full">
    <!-- Product Image -->
    <div class="relative aspect-square overflow-hidden bg-gray-100 dark:bg-gray-700 flex-shrink-0">
        @if($product->featured_image_url)
            <img src="{{ $product->featured_image_url }}" 
                 alt="{{ $product->name }} - Product image" 
                 class="w-full h-full object-cover transition-transform duration-300 hover:scale-105">
        @else
            <div class="w-full h-full flex items-center justify-center" aria-hidden="true">
                <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>
            </div>
        @endif
        
        <!-- Stock Badge -->
        @if($product->stock <= 0)
            <div class="absolute top-3 left-3">
                <span class="px-2 py-1 bg-red-500 text-white text-xs font-medium rounded-full" aria-label="Product is out of stock">Out of Stock</span>
            </div>
        @elseif($product->stock <= 10)
            <div class="absolute top-3 left-3">
                <span class="px-2 py-1 bg-yellow-500 text-white text-xs font-medium rounded-full" aria-label="Only {{ $product->stock }} items left in stock">Low Stock</span>
            </div>
        @endif
    </div>

    <!-- Product Info -->
    <div class="p-4 flex flex-col flex-grow">
        <!-- Category -->
        @if($product->category)
            <div class="text-xs text-blue-600 dark:text-blue-400 font-medium mb-2">
                {{ $product->category->name }}
            </div>
        @endif
        
        <!-- Product Name -->
        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2 line-clamp-2 min-h-[3.5rem]">
            <a href="{{ route('products.show', $product->slug) }}" class="hover:text-blue-600 dark:hover:text-blue-400 transition-colors duration-200" aria-label="View details for {{ $product->name }}">
                {{ $product->name }}
            </a>
        </h3>
        
        <!-- Price -->
        <div class="flex items-center space-x-2 mb-3">
            @if($product->discount_price && $product->discount_price < $product->price)
                <span class="text-lg font-bold text-red-600">${{ number_format($product->discount_price, 2) }}</span>
                <span class="text-sm text-gray-500 line-through" aria-label="Original price">${{ number_format($product->price, 2) }}</span>
                <span class="text-xs bg-red-100 text-red-600 px-2 py-1 rounded-full" aria-label="Discount percentage">
                    -{{ $product->discount_percentage }}%
                </span>
            @else
                <span class="text-lg font-bold text-gray-900 dark:text-white">${{ number_format($product->price, 2) }}</span>
            @endif
        </div>
        
        <!-- Rating -->
        @if($product->reviews_count > 0)
            <div class="flex items-center space-x-1 mb-3" aria-label="Product rating: {{ $product->average_rating }} out of 5 stars from {{ $product->reviews_count }} reviews">
                <div class="flex items-center">
                    @for($i = 1; $i <= 5; $i++)
                        @if($i <= $product->average_rating)
                            <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                            </svg>
                        @else
                            <svg class="w-4 h-4 text-gray-300" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                            </svg>
                        @endif
                    @endfor
                </div>
                <span class="text-sm text-gray-600 dark:text-gray-400">({{ $product->reviews_count }})</span>
            </div>
        @endif
        
        <!-- Action Buttons - Now positioned at the bottom -->
        <div class="mt-auto pt-3">
            @if($product->stock > 0)
                <a href="{{ route('products.show', $product->slug) }}" 
                   class="w-full bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 text-white font-medium py-3 px-4 rounded-xl transition-all duration-300 hover:shadow-lg text-center block"
                   aria-label="View details for {{ $product->name }}">
                    View Details
                </a>
            @else
                <button disabled 
                        class="w-full bg-gray-400 text-white font-medium py-3 px-4 rounded-xl cursor-not-allowed"
                        aria-label="Product is out of stock">
                    Out of Stock
                </button>
            @endif
        </div>
    </div>
</div>
