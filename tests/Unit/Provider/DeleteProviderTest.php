<?php

use App\Actions\Provider\DeleteProvider;
use App\Models\Address;
use App\Models\City;
use App\Models\Document;
use App\Models\Provider;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

uses(TestCase::class, RefreshDatabase::class);

test('should delete provider', function ($id) {
    $result = DeleteProvider::run($id);
    expect($result->id)->toBe($id);
    expect($result->deleted_at)->not->toBeNull();
})->with([
    1,2,3
])->with([
    fn() => Provider::factory()->count(3)->has(Address::factory()->for(City::factory(), 'city'),'addressable')->has(Document::factory(), 'documentation')->create()
]);

test('should throw exception when provider already delete', function ($id) {
    DeleteProvider::run($id);
    DeleteProvider::run($id);
})->with([
    1,2,3
])->with([
    fn() => Provider::factory()->count(3)->has(Address::factory()->for(City::factory(), 'city'),'addressable')->has(Document::factory(), 'documentation')->create()
])->throws(ModelNotFoundException::class);
