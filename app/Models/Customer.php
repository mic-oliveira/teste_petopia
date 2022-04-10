<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function personType(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->document->type === 1 ? 'individual_person' : 'legal_person'
        );
    }

    public function document(): HasOne
    {
        return $this->hasOne(Document::class, 'customer_id');
    }
}
