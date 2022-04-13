<?php

namespace App\Actions\Authentication;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Support\Facades\Auth;
use JetBrains\PhpStorm\ArrayShape;
use Lorisleiva\Actions\Concerns\AsAction;

class AuthenticateUser
{
    use AsAction;

    #[ArrayShape(['token' => "mixed"])]
    public function handle(string $email, string $password, string $userAgent = 'default')
    {
        if (!Auth::attempt(compact('email','password'))) {
            throw new AuthenticationException('Invalid email or password');
        }
        $token = Auth::user()->createToken($userAgent);
        return ['token' => $token->plainTextToken];
    }
}
