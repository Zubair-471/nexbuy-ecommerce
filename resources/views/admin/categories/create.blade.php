@extends('layouts.admin')

@section('title', 'Create Category')

@section('content')
<div class="space-y-8">
    <!-- Header -->
    <div class="admin-card reveal-on-scroll reveal-up">
        <div class="admin-card-body">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
                <div>
                    <h2 class="text-2xl font-black text-gray-900 dark:text-white">Create New Category</h2>
                    <p class="mt-2 text-gray-600 dark:text-gray-400">Add a new category to organize your products</p>
                </div>
                <div class="mt-4 sm:mt-0">
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

    <!-- Create Form -->
    <div class="admin-card reveal-on-scroll reveal-up">
        <div class="admin-card-header">
            <h3 class="admin-card-title">Category Information</h3>
        </div>
        <div class="admin-card-body">
            <x-admin-form action="{{ route('admin.categories.store') }}" method="POST" enctype="multipart/form-data">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Basic Information -->
                    <div class="md:col-span-2">
                        <h4 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Basic Information</h4>
                    </div>

                    <x-admin-form-field
                        type="text"
                        name="name"
                        label="Category Name"
                        placeholder="Enter category name"
                        required="true"
                        help="This will be displayed to customers"
                    />

                    <x-admin-form-field
                        type="text"
                        name="slug"
                        label="URL Slug"
                        placeholder="category-slug"
                        help="Leave empty to auto-generate from name"
                    />

                    <x-admin-form-field
                        type="select"
                        name="parent_id"
                        label="Parent Category"
                        options="{{ $categories ?? [] }}"
                        help="Select parent category if this is a subcategory"
                    />

                    <x-admin-form-field
                        type="number"
                        name="sort_order"
                        label="Sort Order"
                        placeholder="1"
                        min="0"
                        help="Lower numbers appear first"
                    />

                    <x-admin-form-field
                        type="select"
                        name="status"
                        label="Status"
                        options="[
                            'active' => 'Active',
                            'inactive' => 'Inactive'
                        ]"
                        required="true"
                    />

                    <x-admin-form-field
                        type="checkbox"
                        name="featured"
                        label="Featured Category"
                        help="Featured categories appear prominently on the website"
                    />

                    <!-- Description -->
                    <div class="md:col-span-2">
                        <x-admin-form-field
                            type="textarea"
                            name="description"
                            label="Description"
                            placeholder="Describe this category..."
                            rows="4"
                            help="This helps customers understand what products belong in this category"
                        />
                    </div>

                    <!-- Image -->
                    <div class="md:col-span-2">
                        <x-admin-form-field
                            type="file"
                            name="image"
                            label="Category Image"
                            accept="image/*"
                            help="Upload an image to represent this category (optional)"
                        />
                    </div>

                    <!-- SEO Information -->
                    <div class="md:col-span-2">
                        <h4 class="text-lg font-semibold text-gray-900 dark:text-white mb-4 mt-8">SEO Information</h4>
                    </div>

                    <x-admin-form-field
                        type="text"
                        name="meta_title"
                        label="Meta Title"
                        placeholder="SEO title for search engines"
                        help="Leave empty to use category name"
                    />

                    <x-admin-form-field
                        type="textarea"
                        name="meta_description"
                        label="Meta Description"
                        placeholder="Brief description for search engines"
                        rows="3"
                        help="Keep under 160 characters for best results"
                    />
                </div>

                <!-- Form Actions -->
                <div class="admin-form-actions">
                    <a href="{{ route('admin.categories.index') }}" class="admin-btn admin-btn-secondary">
                        Cancel
                    </a>
                    <button type="submit" class="admin-btn admin-btn-primary">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        Create Category
                    </button>
                </div>
            </x-admin-form>
        </div>
    </div>

    <!-- Help Section -->
    <div class="admin-card reveal-on-scroll reveal-up">
        <div class="admin-card-header">
            <h3 class="admin-card-title">Tips for Creating Categories</h3>
        </div>
        <div class="admin-card-body">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-3">
                    <h4 class="font-semibold text-gray-900 dark:text-white">Best Practices</h4>
                    <ul class="text-sm text-gray-600 dark:text-gray-400 space-y-2">
                        <li>• Use clear, descriptive names</li>
                        <li>• Keep categories broad but not too broad</li>
                        <li>• Use consistent naming conventions</li>
                        <li>• Consider your customers' language</li>
                    </ul>
                </div>
                <div class="space-y-3">
                    <h4 class="font-semibold text-gray-900 dark:text-white">SEO Tips</h4>
                    <ul class="text-sm text-gray-600 dark:text-gray-400 space-y-2">
                        <li>• Include relevant keywords in meta title</li>
                        <li>• Write compelling meta descriptions</li>
                        <li>• Use descriptive image alt text</li>
                        <li>• Keep URLs short and readable</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Auto-generate slug from name
    const nameInput = document.getElementById('name');
    const slugInput = document.getElementById('slug');
    
    if (nameInput && slugInput) {
        nameInput.addEventListener('input', function() {
            if (!slugInput.value) {
                slugInput.value = this.value
                    .toLowerCase()
                    .replace(/[^a-z0-9]+/g, '-')
                    .replace(/^-+|-+$/g, '');
            }
        });
    }

    // Character counter for meta description
    const metaDescInput = document.getElementById('meta_description');
    if (metaDescInput) {
        const counter = document.createElement('div');
        counter.className = 'text-xs text-gray-500 mt-1';
        counter.textContent = '0/160 characters';
        metaDescInput.parentNode.appendChild(counter);

        metaDescInput.addEventListener('input', function() {
            const length = this.value.length;
            counter.textContent = `${length}/160 characters`;
            counter.className = `text-xs mt-1 ${length > 160 ? 'text-red-500' : 'text-gray-500'}`;
        });
    }
});
</script>
@endpush
