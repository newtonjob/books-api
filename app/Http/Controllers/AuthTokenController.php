<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthTokenController extends Controller
{
    public function store(Request $request)
    {
        if (! Auth::validate($request->only('email', 'password'))) {
            throw ValidationException::withMessages(['email' => __('auth.failed')]);
        }

        response()->json([
            'user' => $user = Auth::getLastAttempted(),
            'token' => $user->createToken('Personal')->plainTextToken,
        ]);
    }
}
