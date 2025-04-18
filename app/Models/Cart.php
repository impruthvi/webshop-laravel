<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Money\Money;

class Cart extends Model
{
    /** @use HasFactory<\Database\Factories\CartFactory> */
    use HasFactory;

    public function items(): HasMany
    {
        return $this->hasMany(CartItem::class);
    }

    public function total(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->items->reduce(
                fn(Money $total, CartItem $item) => $total->add($item->subtotal),
                Money::USD(0)
            ),
        );
    }
}
