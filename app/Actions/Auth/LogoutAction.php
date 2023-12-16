<?php

namespace App\Actions\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LogoutAction
{
    public function __construct()
    {}

    public function execute(): bool
    {

        auth()->user()->currentAccessToken()->delete();

        return true;
    }
}
