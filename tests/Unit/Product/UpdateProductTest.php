<?php

use App\Actions\Product\UpdateProduct;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

uses(TestCase::class, RefreshDatabase::class);

test('should delete provider', function ($product, $id) {
    $result = UpdateProduct::run($product, $id);
    expect($result->id)->toBe($id);
    expect($result->description)->toBe('produto atualizado');
    expect($result->price)->toBe(8000);
})->with([
    [['description' => 'produto atualizado', 'price' => 8000],1]
])->with([
    fn() => Product::factory()->count(3)->create()
]);
