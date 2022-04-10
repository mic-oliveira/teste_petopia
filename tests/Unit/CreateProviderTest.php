<?php

use App\Actions\Provider\CreateProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

uses(TestCase::class, RefreshDatabase::class);

test('should create provider', function ($name, $expectedName) {
    $result = CreateProvider::run(['name' => $name]);
    expect($result->name)->toBe($expectedName);
})->with([
    ['Distribuidor A', 'Distribuidor A']
]);
