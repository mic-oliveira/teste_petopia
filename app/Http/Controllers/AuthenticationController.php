<?php

namespace App\Http\Controllers;

use App\Actions\Authentication\AuthenticateUser;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AuthenticationController extends Controller
{
    public function authenticate(Request $request): JsonResponse
    {
        return response()->json(AuthenticateUser::run($request->get('email'), $request->get('password'), $request->userAgent()));
    }
}
