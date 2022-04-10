<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'description',
        'price',
    ];

    public function provider()
    {
        return $this->belongsToMany(Provider::class, 'product_provider','product_id', 'provider_id');
    }
}
