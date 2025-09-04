@extends('layouts.admin')

@section('title', 'Edit Category')

@section('content')
<div class="space-y-8">
    <!-- Header -->
    <div class="admin-card reveal-on-scroll reveal-up">
        <div class="admin-card-body">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
                <div>
                    <h2 class="text-2xl font-black text-gray-900 dark:text-white">Edit Category</h2>
                    <p class="mt-2 text-gray-600 dark:text-gray-400">Update category information and settings</p>
                </div>
                <div class="mt-4 sm:mt-0 flex space-x-3">
                    <a href="{{ route('admin.categories.show', $category) }}" class="admin-btn admin-btn-primary">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                        </svg>
                        View Category
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

    <!-- Edit Form -->
    <div class="admin-card reveal-on-scroll reveal-up">
        <div class="admin-card-header">
            <h3 class="admin-card-title">Category Information</h3>
        </div>
        <div class="admin-card-body">
            <x-admin-form action="{{ route('admin.categories.update', $category) }}" method="PUT" enctype="multipart/form-data">
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
                        value="{{ $category->name }}"
                        required="true"
                        help="This will be displayed to customers"
                    />

                    <x-admin-form-field
                        type="text"
                        name="slug"
                        label="URL Slug"
                        placeholder="category-slug"
                        value="{{ $category->slug }}"
                        help="Leave empty to auto-generate from name"
                    />

                    <x-admin-form-field
                        type="select"
                        name="parent_id"
                        label="Parent Category"
                        options="{{ $categories ?? [] }}"
                        value="{{ $category->parent_id }}"
                        help="Select parent category if this is a subcategory"
                    />

                    <x-admin-form-field
                        type="number"
                        name="sort_order"
                        label="Sort Order"
                        placeholder="1"
                        min="0"
                        value="{{ $category->sort_order }}"
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
                        value="{{ $category->status }}"
                        required="true"
                    />

                    <x-admin-form-field
                        type="checkbox"
                        name="featured"
                        label="Featured Category"
                        value="{{ $category->featured }}"
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
                            value="{{ $category->description }}"
                            help="This helps customers understand what products belong in this category"
                        />
                    </div>

                    <!-- Current Image -->
                    @if($category->image)
                    <div class="md:col-span-2">
                        <div class="admin-form-group">
                            <label class="admin-form-label">Current Image</label>
                            <div class="flex items-center space-x-4">
                                <img src="{{ $category->image_url }}" alt="{{ $category->name }}" class="w-24 h-24 rounded-lg object-cover border-2 border-gray-200 dark:border-gray-600">
                                <div>
                                    <p class="text-sm text-gray-600 dark:text-gray-400">Current category image</p>
                                    <label class="flex items-center mt-2">
                                        <input type="checkbox" name="remove_image" value="1" class="admin-form-checkbox">
                                        <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">Remove current image</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif

                    <!-- New Image -->
                    <div class="md:col-span-2">
                        <x-admin-form-field
                            type="file"
                            name="image"
                            label="{{ $category->image ? 'Replace Image' : 'Category Image' }}"
                            accept="image/*"
                            help="Upload a new image to represent this category (optional)"
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
                        value="{{ $category->meta_title }}"
                        help="Leave empty to use category name"
                    />

                    <x-admin-form-field
                        type="textarea"
                        name="meta_description"
                        label="Meta Description"
                        placeholder="Brief description for search engines"
                        rows="3"
                        value="{{ $category->meta_description }}"
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
                        Update Category
                    </button>
                </div>
            </x-admin-form>
        </div>
    </div>

    <!-- Category Statistics -->
    <div class="admin-card reveal-on-scroll reveal-up">
        <div class="admin-card-header">
            <h3 class="admin-card-title">Category Statistics</h3>
        </div>
        <div class="admin-card-body">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="text-center p-4 bg-blue-50 dark:bg-blue-900/20 rounded-xl">
                    <div class="text-2xl font-bold text-blue-600 dark:text-blue-400">{{ $category->products_count ?? 0 }}</div>
                    <div class="text-sm text-blue-600 dark:text-blue-400">Total Products</div>
                </div>
                <div class="text-center p-4 bg-green-50 dark:bg-green-900/20 rounded-xl">
                    <div class="text-2xl font-bold text-green-600 dark:text-green-400">{{ $category->children_count ?? 0 }}</div>
                    <div class="text-sm text-green-600 dark:text-green-400">Subcategories</div>
                </div>
                <div class="text-center p-4 bg-purple-50 dark:bg-purple-900/20 rounded-xl">
                    <div class="text-2xl font-bold text-purple-600 dark:text-purple-400">{{ $category->completion_percentage ?? 0 }}%</div>
                    <div class="text-sm text-purple-600 dark:text-purple-400">Completion</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Danger Zone -->
    <div class="admin-card reveal-on-scroll reveal-up border-red-200 dark:border-red-800">
        <div class="admin-card-header">
            <h3 class="admin-card-title text-red-600 dark:text-red-400">Danger Zone</h3>
        </div>
        <div class="admin-card-body">
            <div class="flex items-center justify-between p-4 bg-red-50 dark:bg-red-900/20 rounded-xl">
                <div>
                    <h4 class="font-semibold text-red-800 dark:text-red-200">Delete Category</h4>
                    <p class="text-sm text-red-600 dark:text-red-400 mt-1">
                        This action cannot be undone. All products in this category will become uncategorized.
                    </p>
                </div>
                <form method="POST" action="{{ route('admin.categories.destroy', $category) }}" class="inline" onsubmit="return confirm('Are you sure you want to delete this category? This action cannot be undone.')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="admin-btn admin-btn-danger">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                        </svg>
                        Delete Category
                    </button>
                </form>
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
        counter.textContent = `${metaDescInput.value.length}/160 characters`;
        metaDescInput.parentNode.appendChild(counter);

        metaDescInput.addEventListener('input', function() {
            const length = this.value.length;
            counter.textContent = `${length}/160 characters`;
            counter.className = `text-xs mt-1 ${length > 160 ? 'text-red-500' : 'text-gray-500'}`;
        });
    }

    // Image removal confirmation
    const removeImageCheckbox = document.querySelector('input[name="remove_image"]');
    if (removeImageCheckbox) {
        removeImageCheckbox.addEventListener('change', function() {
            if (this.checked) {
                if (!confirm('Are you sure you want to remove the current image?')) {
                    this.checked = false;
                }
            }
        });
    }
});
</script>
@endpush
