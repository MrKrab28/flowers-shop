<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class OrderItem extends Model
{
    use HasFactory;

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'kode_product', 'kode');
    }

    public function review(): HasOne
    {
        return $this->hasOne(Review::class, 'order_item_id');
    }

    public function total(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->product->harga * $this->qty
        );
    }
}
