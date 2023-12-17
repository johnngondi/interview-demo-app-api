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

Artisan::command('app:create-test-users', function () {

    $users = [
        [
            'name' => 'John Ngondi',
            'email' => 'john@ida.com',
            'attach_role' => true
        ],
        [
            'name' => 'DeAndre Ngondi',
            'email' => 'dre@ida.com',
            'attach_role' => false
        ]
    ];

    foreach ($users as $item) {
        try {
            $user = \App\Models\User::factory()->create(\Illuminate\Support\Arr::only($item, ['name','email']));

            $this->info('User ID#' . $user->id . ' was created successful!');
            $this->line('Email: ' . $user->email);
            $this->line('Password: password');

            if ($item['attach_role']){
                $user->assignRole('Admin');
                $this->comment('User is able to Create Tasks');
            }
        } catch (Exception $exception){
            $this->warn('Test Users already exists. Test User Email: ' . $item['email'] . ' | Password: password');
            return 0;
        }

        $this->newLine(2);

    }


})->purpose('Create Test Users');
