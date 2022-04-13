<?php

use App\Actions\Product\ListProducts;
use App\Models\Product;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

uses(TestCase::class, RefreshDatabase::class);

test('should list products', function () {
    $result = ListProducts::run();
    expect($result)->not->toBeNull();
    expect($result)->toBeInstanceOf(Paginator::class);
})->with([
    fn() => Product::factory()->count(3)->create()
]);
