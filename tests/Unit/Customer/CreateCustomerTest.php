<?php

use App\Actions\Customer\CreateCustomer;
use App\Enums\SaleStatusEnum;
use App\Models\City;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

uses(TestCase::class, RefreshDatabase::class);

test('should create customer', function ($customer){
    $result = CreateCustomer::run($customer);
    expect($result->name)->toBe('Teste');
    expect($result->documentation->document)->toBe('999999');
    expect($result->addressable->zipcode)->toBe('28400000');
})->with([
    [['name' => 'Teste', 'address' => ['public_place' => 'teste', 'number' => 120, 'neighborhood' => 'teste', 'city_id' => 1, 'zipcode' => 28400000], 'document' => ['type' => SaleStatusEnum::PAID->value, 'document' => '999999']]]
])->with([
    fn() => City::factory()->create()
]);
