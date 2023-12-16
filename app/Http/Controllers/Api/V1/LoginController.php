<?php

namespace App\Http\Controllers\Api\V1;

use App\Actions\Auth\LoginAction;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, LoginAction $loginAction)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $loggedIn = $loginAction->execute($credentials);

        if ($loggedIn)
            return response()->json([
                'data' => $loggedIn
            ]);

        abort(400, 'Credentials does not match');
    }
}
