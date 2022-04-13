<?php

use App\Actions\Sale\ListSales;
use App\Models\Address;
use App\Models\City;
use App\Models\Customer;
use App\Models\Document;
use App\Models\Product;
use App\Models\Provider;
use App\Models\Sale;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

uses(TestCase::class, RefreshDatabase::class);

test('should list products', function () {
    $result = ListSales::run();
    expect($result)->not->toBeNull();
    expect($result)->toBeInstanceOf(Paginator::class);
})->with([
    fn() => Sale::factory()->count(10)->for(Customer::factory(), 'customer')
        ->hasAttached(Product::factory()->count(2), ['sold_price' => 5000],'product_sold')->create()
]);
