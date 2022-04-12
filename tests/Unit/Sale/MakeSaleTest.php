<?php

use App\Actions\Sale\MakeSale;
use App\Models\Customer;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

uses(TestCase::class, RefreshDatabase::class);

test('should make a sale', function ($sale, $expectedTotal){
    $result = MakeSale::run($sale);
    expect($result->total_price)->toBe($expectedTotal);
})->with([
    [['customer_id' => 1, 'products' => [['id' => 2, 'sold_price' => 2000, 'quantity' => 3], ['id' => 1, 'sold_price' => 1000, 'quantity' => 1]]], 7000],
    [['customer_id' => 1, 'products' => [['id' => 2, 'sold_price' => 30000, 'quantity' => 2], ['id' => 1, 'sold_price' => 1000, 'quantity' => 1]]], 61000],
])->with([
    fn() => Customer::factory()->create()
])->with([
    fn() => Product::factory()->count(5)->create()
]);
