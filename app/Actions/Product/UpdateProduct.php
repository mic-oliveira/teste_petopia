<?php

namespace App\Actions\Product;

use Lorisleiva\Actions\Concerns\AsAction;

class UpdateProduct
{
    use AsAction;

    public function handle(array $product, int $id)
    {
        $updatedProduct = FindProduct::run($id);
        $updatedProduct->fill($product);
        $updatedProduct->save();
        return $updatedProduct->refresh();
    }
}
