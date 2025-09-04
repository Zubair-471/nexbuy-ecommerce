<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class InventoryMovement extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'product_variant_id',
        'change',
        'reason',
        'meta',
        'created_at',
    ];

    protected $casts = [
        'change' => 'integer',
        'meta' => 'array',
        'created_at' => 'datetime',
    ];

    public function productVariant()
    {
        return $this->belongsTo(ProductVariant::class);
    }
}
