<?php

use App\Http\Middleware\ValidateTwoFactorAuth;
use Illuminate\Foundation\Inspiring;
use Illuminate\Http\Request;
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

Route::get('/', function (){
    return response([
        'quote' => Inspiring::quote()
    ]);
});

Route::middleware(['auth:sanctum', ValidateTwoFactorAuth::class])->group(function () {

    //Routes for authenticated User
    

});
