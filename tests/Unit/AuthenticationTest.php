<?php

use App\Actions\Authentication\AuthenticateUser;
use App\Models\User;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

uses(TestCase::class, RefreshDatabase::class);

beforeEach(function (){
    User::factory()->state(['email' => 'admin@admin.com', 'password' => Hash::make('admin')])->create();
});

test('should create authentication token', function () {
    $result = AuthenticateUser::run('admin@admin.com', 'admin');
    expect($result['token'])->not->toBeNull();
});

test('should throw exception to invalid login try', function (){
    AuthenticateUser::run('admin@admin.com1', 'admin2');
})->throws(AuthenticationException::class, 'Invalid email or password');
