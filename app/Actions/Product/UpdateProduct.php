<?php

namespace App\Actions\Product;

use App\Models\Product;
use Lorisleiva\Actions\Concerns\AsAction;

class UpdateProduct
{
    use AsAction;

    public function handle(array $product, int $id): Product
    {
        $updatedProduct = FindProduct::run($id);
        $updatedProduct->fill($product);
        $updatedProduct->save();
        return $updatedProduct->refresh();
    }
}
