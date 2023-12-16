<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('app:create-user', function () {

    $user = \App\Models\User::factory()->create([
        'name' => 'John Ngondi',
        'email' => 'john@ida.com'
    ]);

    $this->comment('Name: ' . $user->name);
    $this->comment('Email: ' . $user->email);
    $this->comment('Password: password');

})->purpose('Create Test User');
