<?php

namespace App\Actions\Sale;

use App\Actions\Product\FindProduct;
use App\Models\Sale;
use Lorisleiva\Actions\Concerns\AsAction;

class MakeSale
{
    use AsAction;

    public function handle($sale): Sale
    {
        $createdSale = Sale::create($sale);
        foreach ($sale['products'] as $product) {
            $foundProduct = FindProduct::run($product['id']);
            $createdSale->product_sold()->syncWithPivotValues(
                $foundProduct->id,
                [
                    'sold_price' => $product['sold_price'] ?? $foundProduct->price,
                    'quantity' => $product['quantity'] ?? 1
                ], false
            );
        }
        return $createdSale->refresh();
    }
}
