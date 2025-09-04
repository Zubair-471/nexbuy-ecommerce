<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'sku',
        'description',
        'price',
        'discount_price',
        'stock',
        'status',
        'featured',
        'featured_image',
        'weight',
        'dimensions',
        'brand',
        'tags',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'discount_price' => 'decimal:2',
        'stock' => 'integer',
        'weight' => 'decimal:2',
        'tags' => 'array',
        'featured' => 'boolean',
    ];

    protected $appends = [
        'featured_image_url',
        'final_price',
        'discount_percentage',
        'is_in_stock',
        'stock_status'
    ];

    // Relationships
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function images(): HasMany
    {
        return $this->hasMany(ProductImage::class)->orderBy('sort_order');
    }

    public function variants(): HasMany
    {
        return $this->hasMany(ProductVariant::class);
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }

    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    public function cartItems(): HasMany
    {
        return $this->hasMany(CartItem::class);
    }

    public function wishlistItems(): HasMany
    {
        return $this->hasMany(WishlistItem::class);
    }

    public function featuredImage(): HasOne
    {
        return $this->hasOne(ProductImage::class)->where('is_featured', true);
    }

    // Scopes
    public function scopeActive(Builder $query): Builder
    {
        return $query->where('status', 'active');
    }

    public function scopeFeatured(Builder $query): Builder
    {
        return $query->where('featured', true);
    }

    public function scopeInStock(Builder $query): Builder
    {
        return $query->where('stock', '>', 0);
    }

    public function scopeLowStock(Builder $query, int $threshold = 10): Builder
    {
        return $query->where('stock', '<', $threshold);
    }

    public function scopeOutOfStock(Builder $query): Builder
    {
        return $query->where('stock', '<=', 0);
    }

    public function scopeByCategory(Builder $query, $categoryId): Builder
    {
        return $query->where('category_id', $categoryId);
    }

    public function scopeByBrand(Builder $query, string $brand): Builder
    {
        return $query->where('brand', $brand);
    }

    public function scopePriceRange(Builder $query, float $min, float $max): Builder
    {
        return $query->whereBetween('price', [$min, $max]);
    }

    public function scopeSearch(Builder $query, string $search): Builder
    {
        return $query->where(function ($q) use ($search) {
            $q->where('name', 'like', "%{$search}%")
              ->orWhere('description', 'like', "%{$search}%")
              ->orWhere('sku', 'like', "%{$search}%")
              ->orWhere('brand', 'like', "%{$search}%");
        });
    }

    public function scopeOrdered(Builder $query): Builder
    {
        return $query->orderBy('created_at', 'desc');
    }

    public function scopePopular(Builder $query, int $limit = 10): Builder
    {
        return $query->withCount(['orderItems as total_sold' => function($q) {
                $q->whereHas('order', function($orderQuery) {
                    $orderQuery->where('status', 'completed');
                });
            }])
            ->orderBy('total_sold', 'desc')
            ->limit($limit);
    }

    // Attribute Accessors
    public function getFeaturedImageUrlAttribute(): string
    {
        if (!$this->featured_image) {
            return asset('images/placeholder.jpg');
        }
        
        // Check if the featured_image is an external URL
        if (filter_var($this->featured_image, FILTER_VALIDATE_URL)) {
            return $this->featured_image;
        }
        
        return asset('storage/' . $this->featured_image);
    }

    public function getFinalPriceAttribute(): float
    {
        return $this->discount_price ?: $this->price;
    }

    public function getDiscountPercentageAttribute(): int
    {
        if (!$this->discount_price || $this->discount_price >= $this->price) {
            return 0;
        }
        
        return round((($this->price - $this->discount_price) / $this->price) * 100);
    }

    public function getIsInStockAttribute(): bool
    {
        return $this->stock > 0;
    }

    public function getStockStatusAttribute(): string
    {
        if ($this->stock <= 0) {
            return 'out_of_stock';
        }
        
        if ($this->stock < 10) {
            return 'low_stock';
        }
        
        return 'in_stock';
    }

    public function getMainImageAttribute(): ?string
    {
        $image = $this->images()->first();
        return $image ? $image->url : $this->featured_image_url;
    }

    // Helper Methods
    public function hasDiscount(): bool
    {
        return $this->discount_price && $this->discount_price < $this->price;
    }

    public function isLowStock(int $threshold = 10): bool
    {
        return $this->stock < $threshold;
    }

    public function canAddToCart(int $quantity = 1): bool
    {
        return $this->is_in_stock && $this->stock >= $quantity;
    }

    public function decrementStock(int $quantity = 1): bool
    {
        if ($this->stock >= $quantity) {
            $this->decrement('stock', $quantity);
            return true;
        }
        return false;
    }

    public function incrementStock(int $quantity = 1): void
    {
        $this->increment('stock', $quantity);
    }

    // Events
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($product) {
            if (empty($product->slug)) {
                $product->slug = Str::slug($product->name);
            }
        });

        static::updating(function ($product) {
            if ($product->isDirty('name') && empty($product->slug)) {
                $product->slug = Str::slug($product->name);
            }
        });
    }
}
