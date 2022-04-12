<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Sale extends Model
{
    use HasFactory;

    protected $fillable = [
        'discount',
        'customer_id'
    ];

    public function totalPrice(): Attribute
    {
        return Attribute::make(
            get: fn() => (int)$this->product_sold()->sum('sold_price')
        );
    }

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }
    public function product_sold(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'product_sold', 'sale_id', 'product_id')->withPivot('sold_price');
    }
}
