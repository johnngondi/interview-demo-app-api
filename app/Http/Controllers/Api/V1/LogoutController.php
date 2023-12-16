<?php

namespace App\Http\Controllers\Api\V1;

use App\Actions\Auth\LogoutAction;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(LogoutAction $logoutAction): JsonResponse
    {
        $logoutAction->execute();

        return response()->json([
            'data' => null
        ]);
    }
}
