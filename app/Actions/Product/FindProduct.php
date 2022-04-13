<?php

namespace App\Actions\Product;

use App\Models\Product;
use Lorisleiva\Actions\Concerns\AsAction;

class FindProduct
{
    use AsAction;

    public function handle(int $id): Product
    {
        return Product::findOrFail($id);
    }
}
