<?php

use App\Http\Controllers\Api\V1\CheckLoginStatusController;
use App\Http\Controllers\Api\V1\LoginController;
use App\Http\Controllers\Api\V1\LogoutController;
use App\Http\Controllers\Api\V1\TaskController;
use App\Http\Middleware\ValidateTwoFactorAuth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('login', LoginController::class);

Route::middleware(['auth:sanctum', ValidateTwoFactorAuth::class])->group(function () {
    //Routes for authenticated User

    Route::get('login-status', CheckLoginStatusController::class);
    Route::post('logout', LogoutController::class);

    Route::apiResource('tasks', TaskController::class)->except(['show']);

});
