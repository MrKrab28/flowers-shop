<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    protected $primaryKey = 'kode';
    public $incrementing = false;

    public function order(): HasMany
    {
        return $this->hasMany(OrderItem::class, 'kode_product', 'kode');
    }

    public function rating(): Attribute
    {
        return Attribute::make(
            get: fn () => round($this->order->avg('review.score') ?? null)
        );
    }
}
