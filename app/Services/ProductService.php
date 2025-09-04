<?php

namespace App\Services;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;

class ProductService
{
    /**
     * Get filtered and paginated products.
     */
    public function getFilteredProducts(array $filters, int $perPage = 12): LengthAwarePaginator
    {
        $query = Product::with(['category', 'images', 'variants'])
            ->active();

        // Apply search filter
        if (!empty($filters['q'])) {
            $query->search($filters['q']);
        }

        // Apply category filter
        if (!empty($filters['category'])) {
            $query->whereHas('category', function (Builder $q) use ($filters) {
                $q->whereIn('id', (array) $filters['category']);
            });
        }

        // Apply price range filter
        if (!empty($filters['min_price'])) {
            $query->where('price', '>=', $filters['min_price']);
        }
        if (!empty($filters['max_price'])) {
            $query->where('price', '<=', $filters['max_price']);
        }

        // Apply sorting
        $this->applySorting($query, $filters['sort'] ?? 'newest');

        return $query->paginate($perPage)->withQueryString();
    }

    /**
     * Get products for a specific category.
     */
    public function getCategoryProducts(Category $category, array $filters = [], int $perPage = 12): LengthAwarePaginator
    {
        $query = $category->products()
            ->with(['images', 'variants', 'category'])
            ->active();

        // Apply price range filter
        if (!empty($filters['min_price'])) {
            $query->where('price', '>=', $filters['min_price']);
        }
        if (!empty($filters['max_price'])) {
            $query->where('price', '<=', $filters['max_price']);
        }

        // Apply sorting
        $this->applySorting($query, $filters['sort'] ?? 'newest');

        return $query->paginate($perPage)->withQueryString();
    }

    /**
     * Get related products.
     */
    public function getRelatedProducts(Product $product, int $limit = 4): \Illuminate\Database\Eloquent\Collection
    {
        return Product::with(['category', 'images'])
            ->where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->active()
            ->take($limit)
            ->get();
    }

    /**
     * Get featured products.
     */
    public function getFeaturedProducts(int $limit = 8): \Illuminate\Database\Eloquent\Collection
    {
        return Product::with(['category', 'images'])
            ->featured()
            ->active()
            ->take($limit)
            ->get();
    }

    /**
     * Get products with low stock.
     */
    public function getLowStockProducts(int $threshold = 10, int $limit = 10): \Illuminate\Database\Eloquent\Collection
    {
        return Product::with(['category'])
            ->where('stock', '<=', $threshold)
            ->where('stock', '>', 0)
            ->active()
            ->take($limit)
            ->get();
    }

    /**
     * Apply sorting to the query.
     */
    private function applySorting(Builder $query, string $sort): void
    {
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
    }

    /**
     * Get product statistics.
     */
    public function getProductStats(): array
    {
        return [
            'total_products' => Product::count(),
            'active_products' => Product::active()->count(),
            'featured_products' => Product::featured()->count(),
            'low_stock_products' => Product::where('stock', '<', 10)->count(),
            'out_of_stock_products' => Product::where('stock', 0)->count(),
        ];
    }
}
