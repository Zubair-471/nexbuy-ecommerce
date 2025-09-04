@props(['category'])

@if(!is_object($category) || !isset($category->name))
    @php return; @endphp
@endif

<div class="group bg-white dark:bg-gray-800 rounded-3xl shadow-lg hover:shadow-2xl transition-all duration-500 overflow-hidden border border-gray-200/50 dark:border-gray-700/50">
    <!-- Enhanced Category Image/Icon -->
    <div class="relative overflow-hidden aspect-video bg-gradient-to-br from-blue-50 to-purple-50 dark:from-blue-900/20 dark:to-purple-900/20 group-hover:from-blue-100 group-hover:to-purple-100 dark:group-hover:from-blue-800/30 dark:group-hover:to-purple-800/30 transition-all duration-500">
        @if(isset($category->image) && $category->image)
            <img src="{{ $category->image_url }}" 
                 alt="{{ $category->name }}" 
                 class="w-full h-full object-cover group-hover:scale-125 transition-transform duration-700 ease-out"
                 onerror="this.style.display='none'">
        @endif

        <!-- Enhanced Category Icon Overlay -->
        <div class="absolute inset-0 flex items-center justify-center group-hover:scale-110 transition-transform duration-500">
            <div class="w-24 h-24 bg-gradient-to-br from-blue-600 to-purple-600 rounded-3xl flex items-center justify-center shadow-2xl group-hover:shadow-blue-500/50 transition-all duration-500 group-hover:rotate-12">
                <svg class="w-12 h-12 text-white group-hover:scale-125 transition-transform duration-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                </svg>
            </div>
        </div>
        
        <!-- Enhanced Hover Overlay -->
        <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
    </div>

    <!-- Enhanced Category Info -->
    <div class="p-6 relative">
        <!-- Enhanced Category Name -->
        <h3 class="text-xl font-black text-gray-900 dark:text-white mb-3 group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors duration-300">
            <a href="{{ route('categories.show', $category->slug) }}" class="hover:underline">
                {{ $category->name }}
            </a>
        </h3>

        <!-- Enhanced Category Description -->
        @if(isset($category->description) && $category->description)
            <p class="text-gray-600 dark:text-gray-400 mb-4 line-clamp-2 group-hover:text-gray-700 dark:group-hover:text-gray-300 transition-colors duration-300">
                {{ $category->description }}
            </p>
        @endif

        <!-- Enhanced Category Stats -->
        <div class="flex items-center justify-between mb-6">
            <div class="flex items-center space-x-4">
                <div class="text-center">
                    <div class="text-2xl font-black text-blue-600 dark:text-blue-400">
                        {{ $category->products_count ?? 0 }}
                    </div>
                    <div class="text-xs text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                        Products
                    </div>
                </div>
                @if(isset($category->featured_products_count) && $category->featured_products_count > 0)
                    <div class="text-center">
                        <div class="text-lg font-bold text-yellow-600 dark:text-yellow-400">
                            {{ $category->featured_products_count }}
                        </div>
                        <div class="text-xs text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                            Featured
                        </div>
                    </div>
                @endif
            </div>
            
            <!-- Enhanced Category Badge -->
            @if($category->featured)
                <span class="bg-gradient-to-r from-yellow-400 to-orange-500 text-white text-xs font-bold px-3 py-2 rounded-full shadow-lg group-hover:scale-110 transition-transform duration-300">
                    Featured
                </span>
            @endif
        </div>

        <!-- Enhanced Action Button -->
        <div class="flex space-x-3">
            <a href="{{ route('categories.show', $category->slug) }}" class="flex-1 bg-gradient-to-r from-blue-600 to-purple-600 text-white py-3 px-4 rounded-2xl font-bold hover:from-blue-700 hover:to-purple-700 transition-all duration-300 hover:scale-105 text-center shadow-lg hover:shadow-xl group-hover:shadow-2xl">
                Explore Category
            </a>
            <button class="w-12 h-12 bg-gray-100 dark:bg-gray-700 hover:bg-blue-100 dark:hover:bg-blue-900/20 text-gray-600 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-400 rounded-2xl flex items-center justify-center hover:scale-110 transition-all duration-300 shadow-md hover:shadow-lg group-hover:rotate-12">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                </svg>
            </button>
        </div>
        
        <!-- Enhanced Progress Bar (if category has completion data) -->
        @if(isset($category->completion_percentage))
            <div class="mt-4 pt-4 border-t border-gray-200 dark:border-gray-700">
                <div class="flex items-center justify-between mb-2">
                    <span class="text-sm font-medium text-gray-700 dark:text-gray-300">Category Progress</span>
                    <span class="text-sm font-bold text-blue-600 dark:text-blue-400">{{ $category->completion_percentage }}%</span>
                </div>
                <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2 overflow-hidden">
                    <div class="bg-gradient-to-r from-blue-500 to-purple-500 h-2 rounded-full transition-all duration-1000 ease-out" style="width: {{ $category->completion_percentage }}%"></div>
                </div>
            </div>
        @endif
    </div>
</div>
