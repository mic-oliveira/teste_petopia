<?php

use App\Actions\Provider\CreateProvider;
use App\Enums\SaleStatusEnum;
use App\Models\City;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

uses(TestCase::class, RefreshDatabase::class);

test('should create provider', function ($provider, $expectedName) {
    $result = CreateProvider::run($provider);
    expect($result->name)->toBe($expectedName);
})->with([
    [['name' => 'Distribuidor A', 'address' => ['public_place' => 'teste', 'number' => 120, 'neighborhood' => 'teste', 'city_id' => 1, 'zipcode' => 28400000], 'document' => ['type' => SaleStatusEnum::CNPJ->value, 'document' => '999999']], 'Distribuidor A']
])->with([
    fn() => City::factory()->create()
]);
