<?php

namespace App\Http\Controllers;

use App\Actions\Product\CreateProduct;
use App\Actions\Product\DeleteProduct;
use App\Actions\Product\FindProduct;
use App\Actions\Product\ListProducts;
use App\Actions\Product\UpdateProduct;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class ProductController extends Controller
{

    public function index(): AnonymousResourceCollection
    {
        return ProductResource::collection(ListProducts::run());
    }

    public function store(StoreProductRequest $request): ProductResource
    {
        return ProductResource::make(CreateProduct::run($request->validated()));
    }

    public function show(Product $product): ProductResource
    {
        return ProductResource::make(FindProduct::run($product->id));
    }

    public function update(UpdateProductRequest $request, Product $product): ProductResource
    {
        return ProductResource::make(UpdateProduct::run($request->validated(), $product->id));
    }

    public function destroy(Product $product): ProductResource
    {
        return ProductResource::make(DeleteProduct::run($product->id));
    }
}
