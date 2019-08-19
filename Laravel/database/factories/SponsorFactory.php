<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Sponsor;
use Faker\Generator as Faker;

$factory->define(Sponsor::class, function (Faker $faker) {
    return [
        'package_id' => $faker->numberBetween(1, 50),
        'user_id' => $faker->numberBetween(1, 50),

    ];
});
