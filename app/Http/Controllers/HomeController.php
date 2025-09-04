<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    /**
     * Display the home page with featured products and categories.
     */
    public function index(): View
    {
        try {
            $featuredProducts = $this->getFeaturedProducts();
            $categories = $this->getCategories();

            return view('home', compact('featuredProducts', 'categories'));
        } catch (\Exception $e) {
            // Log the error and return empty collections
            Log::error('Error loading home page: ' . $e->getMessage());
            
            return view('home', [
                'featuredProducts' => collect(),
                'categories' => collect()
            ]);
        }
    }

    /**
     * Get featured products with optimized query.
     */
    private function getFeaturedProducts()
    {
        return Product::with(['category:id,name,slug', 'images:id,product_id,url,sort_order'])
            ->featured()
            ->active()
            ->take(8)
            ->get();
    }

    /**
     * Get categories with optimized query.
     */
    private function getCategories()
    {
        return Category::with(['children' => function($query) {
                $query->active();
            }])
            ->withCount(['products' => function($query) {
                $query->active();
            }])
            ->whereNull('parent_id')
            ->active()
            ->ordered()
            ->take(6)
            ->get();
    }
}
