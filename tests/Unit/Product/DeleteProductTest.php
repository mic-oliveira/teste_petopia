<?php

use App\Actions\Product\DeleteProduct;
use App\Models\Product;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

uses(TestCase::class, RefreshDatabase::class);

test('should delete product', function ($id) {
    $result = DeleteProduct::run($id);
    expect($result->id)->toBe($id);
    expect($result->deleted_at)->not->toBeNull();
})->with([
    1,2,3
])->with([
    fn() => Product::factory()->count(3)->create()
]);

test('should throw exception when product already delete', function ($id) {
    DeleteProduct::run($id);
    DeleteProduct::run($id);
})->with([
    1,2,3
])->with([
    fn() => Product::factory()->count(3)->create()
])->throws(ModelNotFoundException::class);

