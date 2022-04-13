<?php

use App\Actions\Provider\FindProvider;
use App\Models\Address;
use App\Models\City;
use App\Models\Document;
use App\Models\Provider;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

uses(TestCase::class, RefreshDatabase::class);

test('should find customer', function ($id) {
    $result = FindProvider::run($id);
    expect($result->id)->toBe($id);
    expect($result->deleted_at)->toBeNull();
})->with([
    1,2,3
])->with([
    fn() => Provider::factory()->count(3)->has(Address::factory()->for(City::factory(), 'city'),'addressable')->has(Document::factory(), 'documentation')->create()
]);


test('should throw exception when customer id not exists', function ($id) {
    FindProvider::run($id);
})->with([
    1,2,3
])->throws(ModelNotFoundException::class);
