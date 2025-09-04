<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function items()
    {
        return $this->hasMany(CartItem::class);
    }

    public function getTotalItemsAttribute()
    {
        return $this->items->sum('quantity');
    }

    public function getSubtotalAttribute()
    {
        return $this->items->sum(function ($item) {
            return $item->price_at_added * $item->quantity;
        });
    }

    public function getTaxAttribute()
    {
        // Default tax rate of 8.5%
        return $this->subtotal * 0.085;
    }

    public function getShippingCostAttribute()
    {
        // Free shipping for orders over $50, otherwise $9.99
        return $this->subtotal >= 50 ? 0 : 9.99;
    }

    public function getTotalAttribute()
    {
        return $this->subtotal + $this->tax + $this->shipping_cost;
    }
}
