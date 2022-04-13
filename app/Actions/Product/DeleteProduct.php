<?php

namespace App\Actions\Product;

use App\Models\Product;
use Lorisleiva\Actions\Concerns\AsAction;

class DeleteProduct
{
    use AsAction;

    public function handle(int $id): Product
    {
        $product = FindProduct::run($id);
        $product->delete();
        return $product->refresh();
    }
}
