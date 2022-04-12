<?php

use App\Actions\Product\CreateProduct;
use App\Models\Provider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

uses(TestCase::class, RefreshDatabase::class);

test('should create product', function ($product){
    $result = CreateProduct::run($product);
    expect($result->description)->toBe('Produto Teste');
})->with([
    [['description' => 'Produto Teste', 'price' => 5000, 'providers' => [['id' => 1, 'provider_code' => 'A-6521']]]]
])->with([
    fn() => Provider::factory()->create()
]);
