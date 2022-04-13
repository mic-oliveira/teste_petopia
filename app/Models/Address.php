<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use function Pest\Laravel\get;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'public_place',
        'number',
        'complement',
        'zipcode',
        'neighborhood',
        'city_id',
    ];

    public function zipcode(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->attributes['zipcode'] ?? $this->city->zipcode
        );
    }
    public function addressable(): MorphTo
    {
        return $this->morphTo('addressable');
    }

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class, 'city_id');
    }
}
