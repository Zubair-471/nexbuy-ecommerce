<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'parent_id',
        'image',
        'status',
        'featured',
        'sort_order',
        'meta_title',
        'meta_description',
    ];

    protected $casts = [
        'featured' => 'boolean',
        'sort_order' => 'integer',
    ];

    protected $appends = [
        'image_url',
        'products_count',
        'featured_products_count',
        'completion_percentage'
    ];

    // Relationships
    public function parent(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function children(): HasMany
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    public function featuredProducts(): HasMany
    {
        return $this->hasMany(Product::class)->featured();
    }

    public function activeProducts(): HasMany
    {
        return $this->hasMany(Product::class)->active();
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

    public function scopeParent(Builder $query): Builder
    {
        return $query->whereNull('parent_id');
    }

    public function scopeChild(Builder $query): Builder
    {
        return $query->whereNotNull('parent_id');
    }

    public function scopeOrdered(Builder $query): Builder
    {
        return $query->orderBy('sort_order', 'asc')->orderBy('name', 'asc');
    }

    public function scopeSearch(Builder $query, string $search): Builder
    {
        return $query->where(function ($q) use ($search) {
            $q->where('name', 'like', "%{$search}%")
              ->orWhere('description', 'like', "%{$search}%");
        });
    }

    public function scopeByParent(Builder $query, $parentId): Builder
    {
        return $query->where('parent_id', $parentId);
    }

    public function scopeRoot(Builder $query): Builder
    {
        return $query->whereNull('parent_id');
    }

    // Attribute Accessors
    public function getImageUrlAttribute(): string
    {
        if (!$this->image) {
            return asset('images/category-placeholder.jpg');
        }
        
        if (filter_var($this->image, FILTER_VALIDATE_URL)) {
            return $this->image;
        }
        
        return asset('storage/' . $this->image);
    }

    public function getProductsCountAttribute(): int
    {
        if (!$this->relationLoaded('products')) {
            return $this->products()->count();
        }
        
        return $this->products->count();
    }

    public function getFeaturedProductsCountAttribute(): int
    {
        if (!$this->relationLoaded('featuredProducts')) {
            return $this->featuredProducts()->count();
        }
        
        return $this->featuredProducts->count();
    }

    public function getCompletionPercentageAttribute(): int
    {
        $totalFields = 6; // name, description, image, meta_title, meta_description, status
        $filledFields = 0;
        
        if ($this->name) $filledFields++;
        if ($this->description) $filledFields++;
        if ($this->image) $filledFields++;
        if ($this->meta_title) $filledFields++;
        if ($this->meta_description) $filledFields++;
        if ($this->status) $filledFields++;
        
        return round(($filledFields / $totalFields) * 100);
    }

    public function getFullPathAttribute(): string
    {
        $path = [$this->name];
        $parent = $this->parent;
        
        while ($parent) {
            array_unshift($path, $parent->name);
            $parent = $parent->parent;
        }
        
        return implode(' > ', $path);
    }

    // Helper Methods
    public function isRoot(): bool
    {
        return is_null($this->parent_id);
    }

    public function isChild(): bool
    {
        return !is_null($this->parent_id);
    }

    public function hasChildren(): bool
    {
        return $this->children()->exists();
    }

    public function hasProducts(): bool
    {
        return $this->products()->exists();
    }

    public function getChildrenRecursive(): \Illuminate\Support\Collection
    {
        $children = collect();
        
        foreach ($this->children as $child) {
            $children->push($child);
            $children = $children->merge($child->getChildrenRecursive());
        }
        
        return $children;
    }

    public function getAllProducts(): \Illuminate\Support\Collection
    {
        $products = $this->products;
        
        foreach ($this->children as $child) {
            $products = $products->merge($child->getAllProducts());
        }
        
        return $products;
    }

    public function getBreadcrumbs(): array
    {
        $breadcrumbs = [];
        $category = $this;
        
        while ($category) {
            array_unshift($breadcrumbs, [
                'name' => $category->name,
                'slug' => $category->slug,
                'url' => route('categories.show', $category->slug)
            ]);
            $category = $category->parent;
        }
        
        return $breadcrumbs;
    }

    // Events
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($category) {
            if (empty($category->slug)) {
                $category->slug = Str::slug($category->name);
            }
            
            if (is_null($category->sort_order)) {
                $category->sort_order = static::max('sort_order') + 1;
            }
        });

        static::updating(function ($category) {
            if ($category->isDirty('name') && empty($category->slug)) {
                $category->slug = Str::slug($category->name);
            }
        });

        static::deleting(function ($category) {
            // Move children to parent or make them root
            if ($category->hasChildren()) {
                $category->children()->update(['parent_id' => $category->parent_id]);
            }
        });
    }
}
