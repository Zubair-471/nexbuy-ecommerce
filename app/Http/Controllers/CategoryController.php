<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of categories.
     */
    public function index()
    {
        $categories = Category::with(['children', 'products'])
            ->whereNull('parent_id')
            ->active()
            ->orderBy('sort_order')
            ->orderBy('name')
            ->paginate(12);

        return view('categories.index', compact('categories'));
    }

    /**
     * Display the specified category with its products.
     */
    public function show($slug)
    {
        $category = Category::with(['children', 'products' => function ($query) {
            $query->with(['images', 'variants'])->active();
        }])->where('slug', $slug)->firstOrFail();

        // Get products with pagination and search/filter support
        $products = $category->products()
            ->with(['images', 'variants', 'category'])
            ->active()
            ->when(request('sort'), function ($query, $sort) {
                switch ($sort) {
                    case 'price_low':
                        $query->orderBy('price', 'asc');
                        break;
                    case 'price_high':
                        $query->orderBy('price', 'desc');
                        break;
                    case 'name':
                        $query->orderBy('name', 'asc');
                        break;
                    case 'newest':
                    default:
                        $query->orderBy('created_at', 'desc');
                        break;
                }
            })
            ->when(request('min_price'), function ($query, $price) {
                $query->where('price', '>=', $price);
            })
            ->when(request('max_price'), function ($query, $price) {
                $query->where('price', '<=', $price);
            })
            ->paginate(12)
            ->withQueryString();

        return view('categories.show', compact('category', 'products'));
    }
}
