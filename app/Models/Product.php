<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'description',
        'price',
    ];

    public function provider(): BelongsToMany
    {
        return $this->belongsToMany(Provider::class, 'product_provider','product_id', 'provider_id')->withPivot('provider_code');
    }
}
