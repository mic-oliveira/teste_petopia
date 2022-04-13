<?php

namespace App\Models;

use App\Enums\DocumentTypeEnum;
use App\Enums\SaleStatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Document extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'document',
        'customer_id'
    ];

    protected $casts = [
        'type' => DocumentTypeEnum::class
    ];

    public function documentation(): MorphTo
    {
        return $this->morphTo('documentation');
    }
}
