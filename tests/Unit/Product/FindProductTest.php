<?php

use App\Actions\Product\FindProduct;
use App\Models\Product;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

uses(TestCase::class, RefreshDatabase::class);

test('should find product', function ($id) {
    $result = FindProduct::run($id);
    expect($result->id)->toBe($id);
})->with([
    1,2,3
])->with([
    fn() => Product::factory()->count(3)->create()
]);

test('should throw exception when product id not exists', function ($id) {
    FindProduct::run($id);
})->with([
    1,2,3
])->throws(ModelNotFoundException::class);
