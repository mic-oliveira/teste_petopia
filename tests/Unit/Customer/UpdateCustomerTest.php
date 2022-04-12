<?php

use App\Actions\Customer\UpdateCustomer;
use App\Models\Address;
use App\Models\City;
use App\Models\Customer;
use App\Models\Document;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

uses(TestCase::class, RefreshDatabase::class);

test('should create customer', function ($id, $customer){
    $result = UpdateCustomer::run($customer, $id);
    expect($result->name)->toBe('Customer Updated');
    expect($result->addressable->public_place)->toBe('address update');
    expect($result->document->document)->toBe('999999');
    expect($result->addressable->zipcode)->toBe('28400000');
})->with([
    1,2,3
])->with([
    [['name' => 'Customer Updated', 'address' => ['public_place' => 'address update', 'zipcode' => '28400000','number' => 253], 'document' => ['document' => '999999']]]
])->with([
    fn() => Customer::factory()->count(3)->has(Address::factory()->for(City::factory(), 'city'),'addressable')->has(Document::factory(), 'document')->create()
]);
