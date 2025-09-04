<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserAddress extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'label',
        'full_name',
        'phone',
        'line1',
        'line2',
        'city',
        'state',
        'zip',
        'country',
        'is_default',
    ];

    protected $casts = [
        'is_default' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function shippingOrders()
    {
        return $this->hasMany(Order::class, 'shipping_address_id');
    }

    public function billingOrders()
    {
        return $this->hasMany(Order::class, 'billing_address_id');
    }

    public function scopeDefault($query)
    {
        return $query->where('is_default', true);
    }

    public function getFullAddressAttribute()
    {
        $address = $this->line1;
        if ($this->line2) {
            $address .= ', ' . $this->line2;
        }
        $address .= ', ' . $this->city . ', ' . $this->state . ' ' . $this->zip . ', ' . $this->country;
        return $address;
    }
}
