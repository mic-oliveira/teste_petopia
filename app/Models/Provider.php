<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Provider extends Model
{
    use HasFactory;
    use SoftDeletes;

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

    public function documentation(): MorphOne
    {
        return $this->morphOne(Document::class, 'documentation');
    }

}
