<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Models\Image;
use App\Models\Image_projects;
use Faker\Generator as Faker;

$factory->define(Image::class, function (Faker $faker) {
    return [
        'path' => $faker->imageUrl(640, 480),

    ];
});

$factory->define(Image_projects::class, function (Faker $faker) {
    return [
        'project_id' => $faker->unique(true)->numberBetween(1, 50),
        'image_id' => $faker->unique(true)->numberBetween(1, 50),
    ];
});
