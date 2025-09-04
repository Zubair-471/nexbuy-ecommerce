<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'customer_name',
        'customer_email',
        'customer_phone',
        'order_number',
        'status',
        'payment_status',
        'subtotal',
        'discount',
        'discount_amount',
        'tax_amount',
        'shipping_amount',
        'total_amount',
        'tracking_number',
        'notes',
        'shipping_address',
        'shipping_city',
        'shipping_state',
        'shipping_zip_code',
        'shipping_country',
        'shipping_address_id',
        'billing_address_id',
        'payment_method',
        'estimated_delivery_date',
    ];

    protected $casts = [
        'subtotal' => 'decimal:2',
        'discount' => 'decimal:2',
        'discount_amount' => 'decimal:2',
        'tax_amount' => 'decimal:2',
        'shipping_amount' => 'decimal:2',
        'total_amount' => 'decimal:2',
        'estimated_delivery_date' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function shippingAddress()
    {
        return $this->belongsTo(UserAddress::class, 'shipping_address_id');
    }

    public function billingAddress()
    {
        return $this->belongsTo(UserAddress::class, 'billing_address_id');
    }

    public function statusEvents()
    {
        return $this->hasMany(OrderStatusEvent::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    public function scopeByStatus($query, $status)
    {
        return $query->where('status', $status);
    }

    public function getFormattedOrderNumberAttribute()
    {
        return '#' . strtoupper($this->order_number);
    }

    public function getStatusLabelAttribute()
    {
        return ucfirst($this->status);
    }

    public function getPaymentStatusLabelAttribute()
    {
        return ucfirst($this->payment_status);
    }

    public function getFormattedTotalAttribute()
    {
        return '$' . number_format($this->total_amount, 2);
    }

    public function getFormattedSubtotalAttribute()
    {
        return '$' . number_format($this->subtotal, 2);
    }

    public function getFormattedDiscountAttribute()
    {
        return '$' . number_format($this->discount_amount, 2);
    }

    public function getFormattedTaxAttribute()
    {
        return '$' . number_format($this->tax_amount, 2);
    }

    public function getFormattedShippingAttribute()
    {
        return '$' . number_format($this->shipping_amount, 2);
    }

    public function getItemsCountAttribute()
    {
        return $this->items()->count();
    }
}
