<?php

use App\Actions\Customer\FindCustomer;
use App\Models\Address;
use App\Models\City;
use App\Models\Customer;
use App\Models\Document;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

uses(TestCase::class, RefreshDatabase::class);

test('should delete customer', function ($id) {
    $result = FindCustomer::run($id);
    expect($result->id)->toBe($id);
    expect($result->deleted_at)->toBeNull();
})->with([
    1,2,3
])->with([
    fn() => Customer::factory()->count(3)->has(Address::factory()->for(City::factory(), 'city'),'addressable')->has(Document::factory(), 'document')->create()
]);

test('should throw exception when customer id not exists', function ($id) {
    FindCustomer::run($id);
})->with([
    1,2,3
])->throws(ModelNotFoundException::class);
