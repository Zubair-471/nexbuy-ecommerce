@extends('layouts.admin')

@section('title', 'Edit Product')
@section('page-title', 'Edit Product')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Edit Product</h2>
            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">Update product information and settings</p>
        </div>
        <a href="{{ route('admin.products.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-600 text-white text-sm font-medium rounded-lg hover:bg-gray-700 transition-colors duration-200">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
            </svg>
            Back to Products
        </a>
    </div>

    <!-- Edit Form -->
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700">
        <form method="POST" action="{{ route('admin.products.update', $product) }}" enctype="multipart/form-data" class="p-6 space-y-6">
            @csrf
            @method('PUT')
            
            <!-- Basic Information -->
            <div class="border-b border-gray-200 dark:border-gray-700 pb-6">
                <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-4">Basic Information</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Product Name *</label>
                        <input type="text" name="name" id="name" value="{{ old('name', $product->name) }}" required
                               class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent dark:bg-gray-700 dark:text-white @error('name') border-red-500 @enderror"
                               placeholder="Enter product name">
                        @error('name')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="sku" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">SKU *</label>
                        <input type="text" name="sku" id="sku" value="{{ old('sku', $product->sku) }}" required
                               class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent dark:bg-gray-700 dark:text-white @error('sku') border-red-500 @enderror"
                               placeholder="Enter SKU">
                        @error('sku')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="category_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Category *</label>
                        <select name="category_id" id="category_id" required
                                class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent dark:bg-gray-700 dark:text-white @error('category_id') border-red-500 @enderror">
                            <option value="">Select Category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="brand" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Brand</label>
                        <input type="text" name="brand" id="brand" value="{{ old('brand', $product->brand) }}"
                               class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent dark:bg-gray-700 dark:text-white"
                               placeholder="Enter brand name">
                    </div>
                </div>

                <div class="mt-6">
                    <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Description *</label>
                    <textarea name="description" id="description" rows="4" required
                              class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent dark:bg-gray-700 dark:text-white @error('description') border-red-500 @enderror"
                              placeholder="Enter product description">{{ old('description', $product->description) }}</textarea>
                    @error('description')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Pricing & Inventory -->
            <div class="border-b border-gray-200 dark:border-gray-700 pb-6">
                <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-4">Pricing & Inventory</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div>
                        <label for="price" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Price *</label>
                        <div class="relative">
                            <span class="absolute left-3 top-2 text-gray-500">$</span>
                            <input type="number" name="price" id="price" value="{{ old('price', $product->price) }}" step="0.01" min="0" required
                                   class="w-full pl-8 pr-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent dark:bg-gray-700 dark:text-white @error('price') border-red-500 @enderror"
                                   placeholder="0.00">
                        </div>
                        @error('price')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="discount_price" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Discount Price</label>
                        <div class="relative">
                            <span class="absolute left-3 top-2 text-gray-500">$</span>
                            <input type="number" name="discount_price" id="discount_price" value="{{ old('discount_price', $product->discount_price) }}" step="0.01" min="0"
                                   class="w-full pl-8 pr-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent dark:bg-gray-700 dark:text-white @error('discount_price') border-red-500 @enderror"
                                   placeholder="0.00">
                        </div>
                        @error('discount_price')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="stock" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Stock *</label>
                        <input type="number" name="stock" id="stock" value="{{ old('stock', $product->stock) }}" min="0" required
                               class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent dark:bg-gray-700 dark:text-white @error('stock') border-red-500 @enderror"
                               placeholder="0">
                        @error('stock')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Additional Details -->
            <div class="border-b border-gray-200 dark:border-gray-700 pb-6">
                <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-4">Additional Details</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="weight" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Weight (kg)</label>
                        <input type="number" name="weight" id="weight" value="{{ old('weight', $product->weight) }}" step="0.01" min="0"
                               class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent dark:bg-gray-700 dark:text-white"
                               placeholder="0.00">
                    </div>

                    <div>
                        <label for="dimensions" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Dimensions</label>
                        <input type="text" name="dimensions" id="dimensions" value="{{ old('dimensions', $product->dimensions) }}"
                               class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent dark:bg-gray-700 dark:text-white"
                               placeholder="L x W x H cm">
                    </div>
                </div>

                <div class="mt-6">
                    <label for="tags" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Tags</label>
                    <input type="text" name="tags" id="tags" value="{{ old('tags', is_array($product->tags) ? implode(', ', $product->tags) : $product->tags) }}"
                           class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent dark:bg-gray-700 dark:text-white"
                           placeholder="Enter tags separated by commas">
                    <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Separate multiple tags with commas</p>
                </div>
            </div>

            <!-- Status & Options -->
            <div class="border-b border-gray-200 dark:border-gray-700 pb-6">
                <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-4">Status & Options</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="status" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Status *</label>
                        <select name="status" id="status" required
                                class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent dark:bg-gray-700 dark:text-white @error('status') border-red-500 @enderror">
                            <option value="">Select Status</option>
                            <option value="active" {{ old('status', $product->status) === 'active' ? 'selected' : '' }}>Active</option>
                            <option value="inactive" {{ old('status', $product->status) === 'inactive' ? 'selected' : '' }}>Inactive</option>
                            <option value="draft" {{ old('status', $product->status) === 'draft' ? 'selected' : '' }}>Draft</option>
                        </select>
                        @error('status')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex items-center space-x-4">
                        <label class="flex items-center">
                            <input type="checkbox" name="featured" value="1" {{ old('featured', $product->featured) ? 'checked' : '' }}
                                   class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                            <span class="ml-2 text-sm text-gray-700 dark:text-gray-300">Featured Product</span>
                        </label>
                    </div>
                </div>
            </div>

            <!-- Current Images -->
            @if($product->featured_image || $product->images->count() > 0)
            <div class="border-b border-gray-200 dark:border-gray-700 pb-6">
                <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-4">Current Images</h3>
                
                @if($product->featured_image)
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Current Featured Image</label>
                    <div class="flex items-center space-x-4">
                        <img src="{{ asset('storage/' . $product->featured_image) }}" alt="{{ $product->name }}" class="w-24 h-24 rounded-lg object-cover">
                        <div>
                            <p class="text-sm text-gray-600 dark:text-gray-400">This image will be replaced if you upload a new one</p>
                        </div>
                    </div>
                </div>
                @endif

                @if($product->images->count() > 0)
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Current Additional Images</label>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                        @foreach($product->images as $image)
                        <div class="relative">
                            <img src="{{ asset('storage/' . $image->image_path) }}" alt="{{ $image->alt_text }}" class="w-full h-24 rounded-lg object-cover">
                            <div class="absolute top-1 right-1">
                                <span class="inline-flex items-center px-2 py-1 text-xs font-medium bg-gray-800 text-white rounded-full">
                                    {{ $image->sort_order }}
                                </span>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">New images will be added to the existing ones</p>
                </div>
                @endif
            </div>
            @endif

            <!-- New Images -->
            <div class="border-b border-gray-200 dark:border-gray-700 pb-6">
                <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-4">Update Images</h3>
                <div class="space-y-4">
                    <div>
                        <label for="featured_image" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">New Featured Image</label>
                        <input type="file" name="featured_image" id="featured_image" accept="image/*"
                               class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent dark:bg-gray-700 dark:text-white @error('featured_image') border-red-500 @enderror">
                        <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Leave empty to keep current image. Recommended size: 800x800px, Max: 2MB</p>
                        @error('featured_image')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="images" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Additional Images</label>
                        <input type="file" name="images[]" id="images" accept="image/*" multiple
                               class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent dark:bg-gray-700 dark:text-white @error('images.*') border-red-500 @enderror">
                        <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">You can select multiple images. Max: 2MB each. New images will be added to existing ones.</p>
                        @error('images.*')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Form Actions -->
            <div class="flex items-center justify-end space-x-4">
                <a href="{{ route('admin.products.index') }}" 
                   class="px-6 py-2 border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 text-sm font-medium rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors duration-200">
                    Cancel
                </a>
                <button type="submit" 
                        class="px-6 py-2 bg-gradient-to-r from-blue-600 to-purple-600 text-white text-sm font-medium rounded-lg hover:shadow-lg transition-all duration-200 hover-lift">
                    Update Product
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
