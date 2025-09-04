@extends('layouts.admin')

@section('title', 'Categories Management')

@section('content')
<div class="space-y-8">
    <!-- Header -->
    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
        <div>
            <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Categories Management</h1>
            <p class="text-gray-600 dark:text-gray-300 mt-2">Organize your products with categories and subcategories.</p>
        </div>
        <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-3">
            <button class="admin-btn admin-btn-secondary whitespace-nowrap">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.207A1 1 0 013 6.5V4z"></path>
                </svg>
                Filter
            </button>
            <a href="{{ route('admin.categories.create') }}" class="admin-btn admin-btn-primary whitespace-nowrap">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                </svg>
                Add Category
            </a>
        </div>
    </div>

    <!-- Categories Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($categories ?? [] as $category)
        <div class="admin-card p-6">
            <div class="flex items-start justify-between mb-4">
                <div class="flex items-center space-x-3">
                    <div class="w-12 h-12 bg-blue-100 dark:bg-blue-900/30 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                                            </svg>
                                    </div>
                                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">{{ $category->name }}</h3>
                        <p class="text-sm text-gray-600 dark:text-gray-300">{{ $category->products_count ?? 0 }} products</p>
                                    </div>
                                </div>
                                    <div class="flex items-center space-x-2">
                    <button class="text-blue-600 dark:text-blue-400 hover:text-blue-800 dark:hover:text-blue-300">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                            </svg>
                    </button>
                    <button class="text-red-600 dark:text-red-400 hover:text-red-800 dark:hover:text-red-300">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                    </svg>
                                                </button>
                                </div>
                            </div>
                            
            @if($category->description)
            <p class="text-sm text-gray-600 dark:text-gray-300 mb-4">{{ Str::limit($category->description, 100) }}</p>
            @endif
            
                                            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-2">
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                        @if($category->status === 'active') bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-400
                        @else bg-gray-100 text-gray-800 dark:bg-gray-900/30 dark:text-gray-400
                        @endif">
                        {{ ucfirst($category->status ?? 'active') }}
                    </span>
                    @if($category->featured)
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800 dark:bg-yellow-900/30 dark:text-yellow-400">
                        Featured
                    </span>
                                                        @endif
                                                    </div>
                                                    
                                                    <div class="flex items-center space-x-1">
                    <span class="text-xs text-gray-500 dark:text-gray-400">Sort:</span>
                    <span class="text-sm font-medium text-gray-900 dark:text-white">{{ $category->sort_order ?? 0 }}</span>
                                                    </div>
                                                </div>
                                            </div>
        @empty
        <div class="col-span-full">
            <div class="admin-card p-12 text-center">
                <svg class="mx-auto h-16 w-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                    </svg>
                <h3 class="mt-4 text-lg font-medium text-gray-900 dark:text-white">No categories yet</h3>
                <p class="mt-2 text-sm text-gray-600 dark:text-gray-300">Get started by creating your first category to organize your products.</p>
                    <div class="mt-6">
                    <a href="{{ route('admin.categories.create') }}" class="admin-btn admin-btn-primary">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                            Add Category
                        </a>
                    </div>
                </div>
        </div>
        @endforelse
    </div>

    <!-- Category Statistics -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="admin-card p-6">
            <div class="flex items-center">
                <div class="flex-shrink-0 p-3 rounded-full bg-blue-100 dark:bg-blue-900/30">
                    <svg class="w-6 h-6 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                    </svg>
                </div>
                <div class="ml-4">
                    <h3 class="text-sm font-medium text-gray-600 dark:text-gray-300">Total Categories</h3>
                    <p class="text-2xl font-bold text-gray-900 dark:text-white">{{ $categories->count() ?? 0 }}</p>
                </div>
            </div>
        </div>

        <div class="admin-card p-6">
            <div class="flex items-center">
                <div class="flex-shrink-0 p-3 rounded-full bg-green-100 dark:bg-green-900/30">
                    <svg class="w-6 h-6 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <div class="ml-4">
                    <h3 class="text-sm font-medium text-gray-600 dark:text-gray-300">Active Categories</h3>
                    <p class="text-2xl font-bold text-gray-900 dark:text-white">{{ $categories->where('status', 'active')->count() ?? 0 }}</p>
                </div>
            </div>
        </div>

        <div class="admin-card p-6">
            <div class="flex items-center">
                <div class="flex-shrink-0 p-3 rounded-full bg-yellow-100 dark:bg-yellow-900/30">
                    <svg class="w-6 h-6 text-yellow-600 dark:text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                    </svg>
                </div>
                <div class="ml-4">
                    <h3 class="text-sm font-medium text-gray-600 dark:text-gray-300">Featured Categories</h3>
                    <p class="text-2xl font-bold text-gray-900 dark:text-white">{{ $categories->where('featured', true)->count() ?? 0 }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
