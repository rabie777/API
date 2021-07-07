<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Persone;
use Faker\Generator as Faker;

$factory->define(Persone::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstname,
        'last_name' => $faker->lastname,
        'email' => $faker->safeEmail,
        'phone' => $faker->phoneNumber,
        'city' => $faker->city,
    ];
});
