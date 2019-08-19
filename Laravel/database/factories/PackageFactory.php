<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Package;
use Faker\Generator as Faker;

$factory->define(package::class, function (Faker $faker) {
    return [
        'title' => $faker->catchPhrase,
        'credit_amount' => $faker->numberBetween(200, 50000),
        'creator_id' => $faker->numberBetween(1, 250),
        'description' => $faker->realText(200, 2),
        'project_id' => $faker->numberBetween(1, 250),

    ];
});
