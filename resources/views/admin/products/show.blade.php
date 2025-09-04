@extends('layouts.admin')

@section('title', $product->name)
@section('page-title', $product->name)

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-2xl font-bold text-gray-900 dark:text-white">{{ $product->name }}</h2>
            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">Product Details & Information</p>
        </div>
        <div class="flex items-center space-x-3">
            <a href="{{ route('admin.products.edit', $product) }}" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-lg hover:bg-blue-700 transition-colors duration-200">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                </svg>
                Edit Product
            </a>
            <a href="{{ route('admin.products.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-600 text-white text-sm font-medium rounded-lg hover:bg-gray-700 transition-colors duration-200">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Back to Products
            </a>
        </div>
    </div>

    <!-- Product Overview -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Main Product Info -->
        <div class="lg:col-span-2 space-y-6">
            <!-- Basic Information -->
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-4">Basic Information</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">Product Name</label>
                        <p class="text-sm text-gray-900 dark:text-white">{{ $product->name }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">SKU</label>
                        <p class="text-sm text-gray-900 dark:text-white">{{ $product->sku }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">Category</label>
                        <p class="text-sm text-gray-900 dark:text-white">{{ $product->category->name ?? 'N/A' }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">Brand</label>
                        <p class="text-sm text-gray-900 dark:text-white">{{ $product->brand ?? 'N/A' }}</p>
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">Description</label>
                        <p class="text-sm text-gray-900 dark:text-white">{{ $product->description }}</p>
                    </div>
                </div>
            </div>

            <!-- Pricing & Inventory -->
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-4">Pricing & Inventory</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">Price</label>
                        <p class="text-lg font-semibold text-gray-900 dark:text-white">${{ number_format($product->price, 2) }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">Discount Price</label>
                        @if($product->discount_price)
                            <p class="text-lg font-semibold text-green-600 dark:text-green-400">${{ number_format($product->discount_price, 2) }}</p>
                        @else
                            <p class="text-sm text-gray-500 dark:text-gray-400">No discount</p>
                        @endif
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">Stock</label>
                        <span class="inline-flex px-3 py-1 text-sm font-medium rounded-full 
                            @if($product->stock === 0) bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200
                            @elseif($product->stock < 10) bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200
                            @else bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200 @endif">
                            {{ $product->stock }}
                        </span>
                    </div>
                </div>
            </div>

            <!-- Additional Details -->
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-4">Additional Details</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">Weight</label>
                        <p class="text-sm text-gray-900 dark:text-white">{{ $product->weight ? $product->weight . ' kg' : 'N/A' }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">Dimensions</label>
                        <p class="text-sm text-gray-900 dark:text-white">{{ $product->dimensions ?? 'N/A' }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">Tags</label>
                        <div class="flex flex-wrap gap-2">
                            @if($product->tags && is_array($product->tags))
                                @foreach($product->tags as $tag)
                                    <span class="inline-flex px-2 py-1 text-xs font-medium bg-blue-100 text-blue-800 rounded-full dark:bg-blue-900 dark:text-blue-200">
                                        {{ $tag }}
                                    </span>
                                @endforeach
                            @else
                                <p class="text-sm text-gray-500 dark:text-gray-400">No tags</p>
                            @endif
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">Status</label>
                        <span class="inline-flex px-3 py-1 text-sm font-medium rounded-full 
                            @if($product->status === 'active') bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200
                            @elseif($product->status === 'inactive') bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200
                            @else bg-gray-100 text-gray-800 dark:bg-gray-900 dark:text-gray-200 @endif">
                            {{ ucfirst($product->status) }}
                        </span>
                    </div>
                </div>
            </div>

            <!-- Product Images -->
            @if($product->featured_image || $product->images->count() > 0)
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-4">Product Images</h3>
                
                @if($product->featured_image)
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-500 dark:text-gray-400 mb-2">Featured Image</label>
                    <div class="relative">
                        <img src="{{ asset('storage/' . $product->featured_image) }}" alt="{{ $product->name }}" class="w-full max-w-md rounded-lg">
                    </div>
                </div>
                @endif

                @if($product->images->count() > 0)
                <div>
                    <label class="block text-sm font-medium text-gray-500 dark:text-gray-400 mb-2">Additional Images</label>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                        @foreach($product->images as $image)
                        <div class="relative group">
                            <img src="{{ asset('storage/' . $image->image_path) }}" alt="{{ $image->alt_text }}" class="w-full h-32 rounded-lg object-cover">
                            <div class="absolute top-2 right-2">
                                <span class="inline-flex items-center px-2 py-1 text-xs font-medium bg-gray-800 text-white rounded-full">
                                    {{ $image->sort_order }}
                                </span>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>
            @endif
        </div>

        <!-- Sidebar -->
        <div class="space-y-6">
            <!-- Product Status -->
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-4">Product Status</h3>
                <div class="space-y-4">
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-gray-600 dark:text-gray-400">Status</span>
                        <span class="inline-flex px-3 py-1 text-sm font-medium rounded-full 
                            @if($product->status === 'active') bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200
                            @elseif($product->status === 'inactive') bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200
                            @else bg-gray-100 text-gray-800 dark:bg-gray-900 dark:text-gray-200 @endif">
                            {{ ucfirst($product->status) }}
                        </span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-gray-600 dark:text-gray-400">Featured</span>
                        @if($product->featured)
                            <span class="inline-flex items-center px-2 py-1 text-xs font-medium bg-yellow-100 text-yellow-800 rounded-full dark:bg-yellow-900 dark:text-yellow-200">
                                Yes
                            </span>
                        @else
                            <span class="inline-flex items-center px-2 py-1 text-xs font-medium bg-gray-100 text-gray-800 rounded-full dark:bg-gray-900 dark:text-gray-200">
                                No
                            </span>
                        @endif
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-gray-600 dark:text-gray-400">Stock Level</span>
                        <span class="inline-flex px-3 py-1 text-sm font-medium rounded-full 
                            @if($product->stock === 0) bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200
                            @elseif($product->stock < 10) bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200
                            @else bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200 @endif">
                            {{ $product->stock }}
                        </span>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-4">Quick Actions</h3>
                <div class="space-y-3">
                    <button onclick="updateStock()" class="w-full px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-lg hover:bg-blue-700 transition-colors duration-200">
                        Update Stock
                    </button>
                    <button onclick="toggleFeatured()" class="w-full px-4 py-2 bg-yellow-600 text-white text-sm font-medium rounded-lg hover:bg-yellow-700 transition-colors duration-200">
                        {{ $product->featured ? 'Unfeature' : 'Feature' }} Product
                    </button>
                    <button onclick="toggleStatus()" class="w-full px-4 py-2 bg-gray-600 text-white text-sm font-medium rounded-lg hover:bg-gray-700 transition-colors duration-200">
                        {{ $product->status === 'active' ? 'Deactivate' : 'Activate' }}
                    </button>
                </div>
            </div>

            <!-- Product Statistics -->
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-4">Statistics</h3>
                <div class="space-y-4">
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-gray-600 dark:text-gray-400">Total Sales</span>
                        <span class="text-sm font-medium text-gray-900 dark:text-white">{{ $product->orderItems->count() ?? 0 }}</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-gray-600 dark:text-gray-400">Reviews</span>
                        <span class="text-sm font-medium text-gray-900 dark:text-white">{{ $product->reviews->count() ?? 0 }}</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-gray-600 dark:text-gray-400">Created</span>
                        <span class="text-sm font-medium text-gray-900 dark:text-white">{{ $product->created_at->format('M d, Y') }}</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-gray-600 dark:text-gray-400">Last Updated</span>
                        <span class="text-sm font-medium text-gray-900 dark:text-white">{{ $product->updated_at->format('M d, Y') }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Stock Update Modal -->
<div id="stockModal" class="fixed inset-0 z-50 hidden">
    <div class="absolute inset-0 bg-black bg-opacity-50"></div>
    <div class="relative z-10 flex items-center justify-center min-h-screen p-4">
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-xl max-w-md w-full p-6">
            <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-4">Update Stock</h3>
            <div class="space-y-4">
                <div>
                    <label for="newStock" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">New Stock Level</label>
                    <input type="number" id="newStock" min="0" value="{{ $product->stock }}" 
                           class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent dark:bg-gray-700 dark:text-white">
                </div>
                <div class="flex items-center justify-end space-x-3">
                    <button onclick="closeStockModal()" class="px-4 py-2 text-gray-600 dark:text-gray-400 hover:text-gray-800 dark:hover:text-gray-200">
                        Cancel
                    </button>
                    <button onclick="saveStock()" class="px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-lg hover:bg-blue-700">
                        Save
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
function updateStock() {
    document.getElementById('stockModal').classList.remove('hidden');
}

function closeStockModal() {
    document.getElementById('stockModal').classList.add('hidden');
}

function saveStock() {
    const newStock = document.getElementById('newStock').value;
    const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    
    fetch(`{{ route('admin.products.update-stock', $product) }}`, {
        method: 'PATCH',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': token
        },
        body: JSON.stringify({ stock: newStock })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            location.reload();
        } else {
            alert('Error updating stock: ' + data.message);
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Error updating stock');
    });
}

function toggleFeatured() {
    if (confirm('Are you sure you want to {{ $product->featured ? "unfeature" : "feature" }} this product?')) {
        // Implement featured toggle functionality
        alert('Featured status toggle functionality to be implemented');
    }
}

function toggleStatus() {
    if (confirm('Are you sure you want to {{ $product->status === "active" ? "deactivate" : "activate" }} this product?')) {
        // Implement status toggle functionality
        alert('Status toggle functionality to be implemented');
    }
}
</script>
@endpush
