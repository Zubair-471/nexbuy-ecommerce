<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductSearchRequest;
use App\Services\ProductService;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    protected ProductService $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    /**
     * Display a listing of products with filters and search.
     */
    public function index(ProductSearchRequest $request)
    {
        $filters = $request->validated();
        $products = $this->productService->getFilteredProducts($filters);
        $categories = Category::active()->get();

        return view('products.index', compact('products', 'categories'));
    }

    /**
     * Display the specified product.
     */
    public function show($slug)
    {
        $product = Product::with([
            'category',
            'images' => function ($query) {
                $query->orderBy('sort_order');
            },
            'variants' => function ($query) {
                $query->active();
            },
            'reviews' => function ($query) {
                $query->approved()->latest();
            }
        ])->where('slug', $slug)->firstOrFail();

        // Increment view count
        $product->increment('views');

        // Get related products using service
        $relatedProducts = $this->productService->getRelatedProducts($product);

        return view('products.show', compact('product', 'relatedProducts'));
    }
}
