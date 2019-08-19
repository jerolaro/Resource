<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\News;
use Faker\Generator as Faker;

$factory->define(News::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(5, true),
        'content' => $faker->paragraphs(3, true),
        'author'=> $faker->numberBetween(1, 250),
        'image_path' => $faker->imageUrl(640, 480),

    ];
});
