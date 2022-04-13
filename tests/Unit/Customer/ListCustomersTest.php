<?php

use App\Actions\Customer\ListCustomer;
use App\Models\Address;
use App\Models\City;
use App\Models\Customer;
use App\Models\Document;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

uses(TestCase::class, RefreshDatabase::class);

test('should list customers', function ($id) {
    $result = ListCustomer::run($id);
    expect($result)->not->toBeNull();
    expect($result)->toBeInstanceOf(Paginator::class);
})->with([
    fn() => Customer::factory()->count(3)->has(Address::factory()->for(City::factory(), 'city'),'addressable')->has(Document::factory(), 'documentation')->create()
]);
