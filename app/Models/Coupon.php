<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Coupon extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'type',
        'amount',
        'min_order',
        'max_uses',
        'used_count',
        'active',
        'expires_at',
    ];

    protected $casts = [
        'amount' => 'decimal:2',
        'min_order' => 'decimal:2',
        'max_uses' => 'integer',
        'used_count' => 'integer',
        'active' => 'boolean',
        'expires_at' => 'datetime',
    ];

    public function scopeActive($query)
    {
        return $query->where('active', true);
    }

    public function scopeValid($query)
    {
        return $query->active()
            ->where(function ($q) {
                $q->whereNull('expires_at')
                  ->orWhere('expires_at', '>', now());
            })
            ->where(function ($q) {
                $q->whereNull('max_uses')
                  ->orWhere('used_count', '<', $q->raw('max_uses'));
            });
    }

    public function isValid()
    {
        return $this->active &&
               ($this->expires_at === null || $this->expires_at->isFuture()) &&
               ($this->max_uses === null || $this->used_count < $this->max_uses);
    }

    public function calculateDiscount($subtotal)
    {
        if ($subtotal < $this->min_order) {
            return 0;
        }

        if ($this->type === 'fixed') {
            return min($this->amount, $subtotal);
        }

        return $subtotal * ($this->amount / 100);
    }
}
