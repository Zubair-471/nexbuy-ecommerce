@extends('layouts.admin')

@section('title', 'Products Management')

@section('content')
<div class="space-y-8">
    <!-- Header -->
    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
        <div>
            <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Products Management</h1>
            <p class="text-gray-600 dark:text-gray-300 mt-2">Manage your product catalog, inventory, and pricing.</p>
        </div>
        <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-3">
            <button class="admin-btn admin-btn-secondary whitespace-nowrap">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.207A1 1 0 013 6.5V4z"></path>
                </svg>
                Filter
            </button>
            <a href="{{ route('admin.products.create') }}" class="admin-btn admin-btn-primary whitespace-nowrap">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                </svg>
                Add Product
            </a>
        </div>
    </div>

    <!-- Filters and Search -->
    <div class="admin-card p-6">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <div class="admin-form-group">
                <label class="admin-form-label">Search Products</label>
                <input type="text" placeholder="Search by name, SKU..." class="admin-form-input">
            </div>
            <div class="admin-form-group">
                <label class="admin-form-label">Category</label>
                <select class="admin-form-select">
                    <option value="">All Categories</option>
                    @foreach($categories ?? [] as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="admin-form-group">
                <label class="admin-form-label">Status</label>
                <select class="admin-form-select">
                    <option value="">All Status</option>
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                    <option value="draft">Draft</option>
                </select>
            </div>
            <div class="admin-form-group">
                <label class="admin-form-label">Stock</label>
                <select class="admin-form-select">
                    <option value="">All Stock</option>
                    <option value="in_stock">In Stock</option>
                    <option value="low_stock">Low Stock</option>
                    <option value="out_of_stock">Out of Stock</option>
                </select>
            </div>
        </div>
    </div>

    <!-- Products Table -->
    <div class="admin-card">
        <div class="flex items-center justify-between p-6 border-b border-gray-200 dark:border-gray-700">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Products ({{ $products->total() ?? 0 }})</h3>
            <div class="flex items-center space-x-2">
                <button class="admin-btn admin-btn-secondary text-sm">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                    </svg>
                    Export
                </button>
                <button class="admin-btn admin-btn-secondary text-sm">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                    </svg>
                    Import
                </button>
        </div>
    </div>

        <div class="overflow-x-auto">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th class="w-16">
                            <input type="checkbox" class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                        </th>
                        <th>Product</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($products ?? [] as $product)
                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                        <td class="text-center">
                            <input type="checkbox" class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                            </td>
                        <td>
                            <div class="flex items-center space-x-3">
                                <div class="flex-shrink-0">
                                    @if($product->featured_image_url)
                                        <img src="{{ $product->featured_image_url }}" alt="{{ $product->name }}" class="w-12 h-12 rounded object-cover">
                                        @else
                                        <div class="w-12 h-12 bg-gray-200 dark:bg-gray-700 rounded flex items-center justify-center">
                                            <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                            </svg>
                                    </div>
                                        @endif
                                    </div>
                                <div>
                                    <div class="font-medium text-gray-900 dark:text-white">{{ $product->name }}</div>
                                    <div class="text-sm text-gray-600 dark:text-gray-300">SKU: {{ $product->sku }}</div>
                                    </div>
                                </div>
                            </td>
                        <td>
                            <span class="text-sm text-gray-900 dark:text-white">{{ $product->category->name ?? 'Uncategorized' }}</span>
                            </td>
                        <td>
                            <div class="text-sm">
                                <span class="font-medium text-gray-900 dark:text-white">${{ number_format($product->price, 2) }}</span>
                                    @if($product->discount_price)
                                    <div class="text-xs text-red-600 dark:text-red-400 line-through">${{ number_format($product->discount_price, 2) }}</div>
                                    @endif
                                </div>
                            </td>
                        <td>
                            <div class="text-sm">
                                <span class="font-medium text-gray-900 dark:text-white">{{ $product->stock }}</span>
                                @if($product->stock < 10)
                                    <span class="ml-2 inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-red-100 text-red-800 dark:bg-red-900/30 dark:text-red-400">
                                        Low
                                </span>
                                @endif
                            </div>
                            </td>
                        <td>
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                @if($product->status === 'active') bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-400
                                @elseif($product->status === 'inactive') bg-gray-100 text-gray-800 dark:bg-gray-900/30 dark:text-gray-400
                                @else bg-yellow-100 text-yellow-800 dark:bg-yellow-900/30 dark:text-yellow-400
                                @endif">
                                    {{ ucfirst($product->status) }}
                                </span>
                            </td>
                        <td>
                                <div class="flex items-center space-x-2">
                                <a href="{{ route('admin.products.edit', $product) }}" class="text-blue-600 dark:text-blue-400 hover:text-blue-800 dark:hover:text-blue-300">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                    </svg>
                                </a>
                                <a href="{{ route('admin.products.show', $product) }}" class="text-green-600 dark:text-green-400 hover:text-green-800 dark:hover:text-green-300">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                    </svg>
                                </a>
                                <button class="text-red-600 dark:text-red-400 hover:text-red-800 dark:hover:text-red-300">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                    </svg>
                                        </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                        <td colspan="7" class="text-center py-12">
                            <div class="text-center">
                                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                                </svg>
                                <h3 class="mt-2 text-sm font-medium text-gray-900 dark:text-white">No products found</h3>
                                <p class="mt-1 text-sm text-gray-600 dark:text-gray-300">Get started by creating your first product.</p>
                                <div class="mt-6">
                                    <a href="{{ route('admin.products.create') }}" class="admin-btn admin-btn-primary">
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                        </svg>
                                        Add Product
                                    </a>
                                </div>
                            </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <!-- Pagination -->
        @if(isset($products) && $products->hasPages())
            <div class="px-6 py-4 border-t border-gray-200 dark:border-gray-700">
                {{ $products->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
