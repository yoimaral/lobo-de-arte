<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Image;
use Faker\Generator as Faker;

$factory->define(Image::class, function (Faker $faker) {

    $fileName = $faker->numberBetween(1, 10) . '.jpg';

    return [
        'path' => public_path("images/products/{$fileName}")
    ];
});

$factory->state(Image::class, 'users', function (Faker $faker) {

    $fileName = $faker->numberBetween(1, 6) . '.jpg';

    return [
        'path' => public_path("images/users/{$fileName}")
    ];
});
