<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Project;
use Faker\Generator as Faker;

$factory->define(Project::class, function (Faker $faker) {
    return [
        'title' => $faker->catchPhrase,
        'description' => $faker->realText(200, 2),
        'intro' => $faker->realText(200, 2),
        'user_id' => $faker->numberBetween(1, 50),
        'category_id' => $faker->numberBetween(1, 10),
        'content' => $faker->realText($maxNbChars = 250),
        'credit_goal' => $faker->numberBetween(20, 20000),
        'initial_time' => $faker->dateTimeBetween('-5 years', 'now'),
        'final_time' => $faker->dateTimeBetween('now', '2 years'),

    ];
});
