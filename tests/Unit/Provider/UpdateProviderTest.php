<?php

use App\Actions\Provider\UpdateProvider;
use App\Models\Address;
use App\Models\City;
use App\Models\Document;
use App\Models\Provider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

uses(TestCase::class, RefreshDatabase::class);

test('should update provider', function ($id, $customer){
    $result = UpdateProvider::run($customer, $id);
    expect($result->name)->toBe('Provider Updated');
    expect($result->addressable->public_place)->toBe('address update');
    expect($result->addressable->zipcode)->toBe('28400000');
    expect($result->documentation->document)->toBe('999999');
})->with([
    1,2,3
])->with([
    [['name' => 'Provider Updated', 'address' => ['public_place' => 'address update', 'zipcode' => '28400000','number' => 253], 'document' => ['document' => '999999']]]
])->with([
    fn() => Provider::factory()->count(3)->has(Address::factory()->for(City::factory(), 'city'),'addressable')->has(Document::factory(), 'documentation')->create()
]);
