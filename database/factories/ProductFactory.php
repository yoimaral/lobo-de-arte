<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {

    return [
        'img' => $faker->imageUrl($width = 640, $height = 480),
        'name' => $faker->sentence($nbWords = 1, $variableNbWords = true),
        'description' => $faker->sentence($nbWords = 10, $variableNbWords = true),
        'price' => $faker->numberBetween($min = 1000, $max = 10000),
        'stock' => $faker->numberBetween($min = 3, $max = 10000),
    ];
});
