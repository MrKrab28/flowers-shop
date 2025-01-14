<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CartItem extends Model
{
    use HasFactory;

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'kode_product', 'kode');
    }

    public function total(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->product->harga * $this->qty
        );
    }

    public function cart(){
        return $this->belongsTo(Cart::class, 'cart_id');

    }
}
