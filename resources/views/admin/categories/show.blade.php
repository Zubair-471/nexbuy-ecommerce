@extends('layouts.admin')

@section('title', $category->name)

@section('content')
<div class="space-y-8">
    <!-- Header -->
    <div class="admin-card reveal-on-scroll reveal-up">
        <div class="admin-card-body">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
                <div class="flex items-center space-x-4">
                    @if($category->image)
                        <img src="{{ $category->image_url }}" alt="{{ $category->name }}" class="w-16 h-16 rounded-xl object-cover border-2 border-gray-200 dark:border-gray-600">
                    @else
                        <div class="w-16 h-16 rounded-xl bg-gradient-to-br from-blue-500 to-purple-600 flex items-center justify-center">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                            </svg>
                        </div>
                    @endif
                    <div>
                        <h2 class="text-2xl font-black text-gray-900 dark:text-white">{{ $category->name }}</h2>
                        <p class="text-gray-600 dark:text-gray-400">{{ $category->description ?: 'No description available' }}</p>
                    </div>
                </div>
                <div class="mt-4 sm:mt-0 flex space-x-3">
                    <a href="{{ route('admin.categories.edit', $category) }}" class="admin-btn admin-btn-primary">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                        </svg>
                        Edit Category
                    </a>
                    <a href="{{ route('admin.categories.index') }}" class="admin-btn admin-btn-secondary">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        Back to Categories
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Category Statistics -->
    <div class="stats-grid">
        <div class="stat-card reveal-on-scroll reveal-up">
            <div class="stat-icon bg-blue-500">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                </svg>
            </div>
            <div class="stat-value">{{ $category->products_count ?? 0 }}</div>
            <div class="stat-label">Total Products</div>
            <p class="text-xs text-gray-500 dark:text-gray-400 mt-2">Products in this category</p>
        </div>

        <div class="stat-card reveal-on-scroll reveal-up">
            <div class="stat-icon bg-green-500">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                </svg>
            </div>
            <div class="stat-value">{{ $category->children_count ?? 0 }}</div>
            <div class="stat-label">Subcategories</div>
            <p class="text-xs text-gray-500 dark:text-gray-400 mt-2">Child categories</p>
        </div>

        <div class="stat-card reveal-on-scroll reveal-up">
            <div class="stat-icon bg-purple-500">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
            <div class="stat-value">{{ $category->completion_percentage ?? 0 }}%</div>
            <div class="stat-label">Completion</div>
            <p class="text-xs text-gray-500 dark:text-gray-400 mt-2">Profile completeness</p>
        </div>

        <div class="stat-card reveal-on-scroll reveal-up">
            <div class="stat-icon {{ $category->status === 'active' ? 'bg-green-500' : 'bg-red-500' }}">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
            <div class="stat-value">{{ ucfirst($category->status) }}</div>
            <div class="stat-label">Status</div>
            <p class="text-xs text-gray-500 dark:text-gray-400 mt-2">Category visibility</p>
        </div>
    </div>

    <!-- Category Details -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <!-- Basic Information -->
        <div class="admin-card reveal-on-scroll reveal-left">
            <div class="admin-card-header">
                <h3 class="admin-card-title">Basic Information</h3>
            </div>
            <div class="admin-card-body">
                <div class="space-y-4">
                    <div class="flex justify-between py-3 border-b border-gray-100 dark:border-gray-700">
                        <span class="font-medium text-gray-600 dark:text-gray-400">Name</span>
                        <span class="text-gray-900 dark:text-white">{{ $category->name }}</span>
                    </div>
                    <div class="flex justify-between py-3 border-b border-gray-100 dark:border-gray-700">
                        <span class="font-medium text-gray-600 dark:text-gray-400">Slug</span>
                        <span class="text-gray-900 dark:text-white font-mono text-sm">{{ $category->slug }}</span>
                    </div>
                    <div class="flex justify-between py-3 border-b border-gray-100 dark:border-gray-700">
                        <span class="font-medium text-gray-600 dark:text-gray-400">Parent Category</span>
                        <span class="text-gray-900 dark:text-white">
                            @if($category->parent)
                                <a href="{{ route('admin.categories.show', $category->parent) }}" class="text-blue-600 dark:text-blue-400 hover:underline">
                                    {{ $category->parent->name }}
                                </a>
                            @else
                                <span class="text-gray-400">None (Root Category)</span>
                            @endif
                        </span>
                    </div>
                    <div class="flex justify-between py-3 border-b border-gray-100 dark:border-gray-700">
                        <span class="font-medium text-gray-600 dark:text-gray-400">Sort Order</span>
                        <span class="text-gray-900 dark:text-white">{{ $category->sort_order ?? 'Not set' }}</span>
                    </div>
                    <div class="flex justify-between py-3 border-b border-gray-100 dark:border-gray-700">
                        <span class="font-medium text-gray-600 dark:text-gray-400">Featured</span>
                        <span class="text-gray-900 dark:text-white">
                            @if($category->featured)
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200">
                                    Yes
                                </span>
                            @else
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-200">
                                    No
                                </span>
                            @endif
                        </span>
                    </div>
                    <div class="flex justify-between py-3">
                        <span class="font-medium text-gray-600 dark:text-gray-400">Created</span>
                        <span class="text-gray-900 dark:text-white">{{ $category->created_at->format('M d, Y H:i') }}</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- SEO Information -->
        <div class="admin-card reveal-on-scroll reveal-right">
            <div class="admin-card-header">
                <h3 class="admin-card-title">SEO Information</h3>
            </div>
            <div class="admin-card-body">
                <div class="space-y-4">
                    <div class="space-y-2">
                        <span class="font-medium text-gray-600 dark:text-gray-400">Meta Title</span>
                        <p class="text-gray-900 dark:text-white">
                            {{ $category->meta_title ?: $category->name }}
                        </p>
                    </div>
                    <div class="space-y-2">
                        <span class="font-medium text-gray-600 dark:text-gray-400">Meta Description</span>
                        <p class="text-gray-900 dark:text-white">
                            {{ $category->meta_description ?: 'No meta description set' }}
                        </p>
                    </div>
                    <div class="space-y-2">
                        <span class="font-medium text-gray-600 dark:text-gray-400">URL</span>
                        <p class="text-gray-900 dark:text-white">
                            <a href="{{ route('categories.show', $category->slug) }}" target="_blank" class="text-blue-600 dark:text-blue-400 hover:underline break-all">
                                {{ route('categories.show', $category->slug) }}
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
