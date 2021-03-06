<?php

namespace App\Models;

use App\Enums\SaleStatusEnum;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Sale extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
        'discount',
        'customer_id'
    ];

    protected $casts = [
        'status' => SaleStatusEnum::class
    ];

    public function scopeDateBetween(Builder $query, $startDate, $endDate): Builder
    {
        return $query->whereDate('created_at', '>=', Carbon::parse($startDate))->whereDate('created_at', '<=', Carbon::parse($endDate) ?? now());
    }

    public function totalPrice(): Attribute
    {
        $totalPrice = 0;
        $this->product_sold->each(function ($product) use (&$totalPrice){
            $totalPrice += $product->pivot->sold_price * $product->pivot->quantity;
        });
        return Attribute::make(
            get: fn() => $totalPrice
        );
    }

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function product_sold(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'product_sold', 'sale_id', 'product_id')->withPivot(['sold_price', 'quantity']);
    }
}
