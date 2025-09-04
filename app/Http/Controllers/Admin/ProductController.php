<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\AdminController;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class ProductController extends AdminController
{
    public function index(Request $request)
    {
        $query = Product::with(['category', 'images'])
            ->withCount('orderItems');

        // Search functionality
        if ($request->filled('search')) {
            $query->search($request->search);
        }

        // Category filter
        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }

        // Status filter
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Stock filter
        if ($request->filled('stock')) {
            if ($request->stock === 'low') {
                $query->where('stock', '<', 10);
            } elseif ($request->stock === 'out') {
                $query->where('stock', 0);
            }
        }

        $products = $query->latest()->paginate(15);
        $categories = Category::all();

        return view('admin.products.index', compact('products', 'categories'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'sku' => 'required|string|max:100|unique:products',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'discount_price' => 'nullable|numeric|min:0|lt:price',
            'stock' => 'required|integer|min:0',
            'status' => 'required|in:active,inactive,draft',
            'featured' => 'boolean',
            'weight' => 'nullable|numeric|min:0',
            'dimensions' => 'nullable|string|max:255',
            'brand' => 'nullable|string|max:255',
            'tags' => 'nullable|array',
            'tags.*' => 'string|max:50',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $validated['slug'] = Str::slug($validated['name']);
        $validated['featured'] = $request->has('featured');

        // Handle featured image
        if ($request->hasFile('featured_image')) {
            $validated['featured_image'] = $request->file('featured_image')->store('products', 'public');
        }

        $product = Product::create($validated);

        // Handle additional images
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $index => $image) {
                $path = $image->store('products', 'public');
                $product->images()->create([
                    'image_path' => $path,
                    'sort_order' => $index + 1,
                    'alt_text' => $validated['name'] . ' - Image ' . ($index + 1)
                ]);
            }
        }

        return redirect()->route('admin.products.index')
            ->with('success', 'Product created successfully.');
    }

    public function show(Product $product)
    {
        $product->load(['category', 'images', 'variants', 'reviews.user']);
        return view('admin.products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        $product->load(['images', 'variants']);
        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'sku' => ['required', 'string', 'max:100', Rule::unique('products')->ignore($product->id)],
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'discount_price' => 'nullable|numeric|min:0|lt:price',
            'stock' => 'required|integer|min:0',
            'status' => 'required|in:active,inactive,draft',
            'featured' => 'boolean',
            'weight' => 'nullable|numeric|min:0',
            'dimensions' => 'nullable|string|max:255',
            'brand' => 'nullable|string|max:255',
            'tags' => 'nullable|array',
            'tags.*' => 'string|max:50',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $validated['slug'] = Str::slug($validated['name']);
        $validated['featured'] = $request->has('featured');

        // Handle featured image
        if ($request->hasFile('featured_image')) {
            // Delete old image
            if ($product->featured_image) {
                Storage::disk('public')->delete($product->featured_image);
            }
            $validated['featured_image'] = $request->file('featured_image')->store('products', 'public');
        }

        $product->update($validated);

        // Handle additional images
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $index => $image) {
                $path = $image->store('products', 'public');
                $product->images()->create([
                    'image_path' => $path,
                    'sort_order' => $product->images()->count() + $index + 1,
                    'alt_text' => $validated['name'] . ' - Image ' . ($product->images()->count() + $index + 1)
                ]);
            }
        }

        return redirect()->route('admin.products.index')
            ->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        // Delete images
        foreach ($product->images as $image) {
            Storage::disk('public')->delete($image->image_path);
        }
        
        if ($product->featured_image) {
            Storage::disk('public')->delete($product->featured_image);
        }

        $product->delete();

        return redirect()->route('admin.products.index')
            ->with('success', 'Product deleted successfully.');
    }

    public function bulkAction(Request $request)
    {
        $request->validate([
            'action' => 'required|in:delete,activate,deactivate,feature,unfeature',
            'products' => 'required|array',
            'products.*' => 'exists:products,id'
        ]);

        $products = Product::whereIn('id', $request->products);

        switch ($request->action) {
            case 'delete':
                $products->delete();
                $message = 'Products deleted successfully.';
                break;
            case 'activate':
                $products->update(['status' => 'active']);
                $message = 'Products activated successfully.';
                break;
            case 'deactivate':
                $products->update(['status' => 'inactive']);
                $message = 'Products deactivated successfully.';
                break;
            case 'feature':
                $products->update(['featured' => true]);
                $message = 'Products featured successfully.';
                break;
            case 'unfeature':
                $products->update(['featured' => false]);
                $message = 'Products unfeatured successfully.';
                break;
        }

        return redirect()->route('admin.products.index')->with('success', $message);
    }

    public function updateStock(Request $request, Product $product)
    {
        $request->validate([
            'stock' => 'required|integer|min:0'
        ]);

        $product->update(['stock' => $request->stock]);

        return $this->successResponse('Stock updated successfully', ['stock' => $product->stock]);
    }
}
