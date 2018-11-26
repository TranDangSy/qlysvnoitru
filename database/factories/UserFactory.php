<?php

use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;
use App\User;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => 'admin',
        'email' => 'dangsy1998@gmail.com',
        'email_verified_at' => now(),
        'avatar' => 'admin_asset/img/a655c8e9327de06aa67354b23be2a715cb41134ezH.JPG',
        'password' => Hash::make('admin'),
        'gender' => 1,
        'status' => 1,
        'remember_token' => str_random(10),
    ];
});
