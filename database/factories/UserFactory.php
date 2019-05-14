<?php

use App\User;
use App\Contact;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

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

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => '$2y$10$.ZNcMBKNKVWmz9uPo40VzOKt/X6EUGSxHGHyrp4b',
    ];
});

$factory->define(Contact::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'address' => $faker->address,
        'email' => $faker->safeEmail,
        'content' => $faker->text,
        'create_by' => 1,
    ];
});
