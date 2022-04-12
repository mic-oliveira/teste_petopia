<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Provider extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function product(): HasMany
    {
        return $this->hasMany(Product::class, 'provider_id');
    }

    public function addressable(): MorphOne
    {
        return $this->morphOne(Address::class, 'addressable');
    }
}
