<?php

use App\Actions\Provider\ListProviders;
use App\Models\Address;
use App\Models\City;
use App\Models\Document;
use App\Models\Provider;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

uses(TestCase::class, RefreshDatabase::class);

test('should list products', function () {
    $result = ListProviders::run();
    expect($result)->not->toBeNull();
    expect($result)->toBeInstanceOf(Paginator::class);
})->with([
    fn() => Provider::factory()->count(3)->has(Address::factory()->for(City::factory(), 'city'),'addressable')->has(Document::factory(), 'documentation')->create()
]);
