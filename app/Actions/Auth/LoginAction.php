<?php

namespace App\Actions\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginAction
{
    public function __construct()
    {}

    public function execute(array $credentials): bool|array
    {

        if (Auth::validate($credentials)){
            $user = User::query()->where('email', $credentials['email'])->first();
            $token = $user->createToken('Login Token');

            return [
                'user' => $user,
                'token' => $token->plainTextToken
            ];
        }

        return false;
    }
}
