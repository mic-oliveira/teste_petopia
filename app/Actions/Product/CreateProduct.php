<?php

namespace App\Actions\Product;

use App\Models\Product;
use Lorisleiva\Actions\Concerns\AsAction;

class CreateProduct
{
    use AsAction;

    public function handle(array $product): Product
    {
        $createdProduct = Product::create($product);
        if (isset($product['providers'])) {
            foreach ($product['providers'] as $provider) {
                $createdProduct->provider()->syncWithPivotValues($provider['id'],['provider_code' => $provider['provider_code']]);
            }
        }
        return $createdProduct;
    }
}
