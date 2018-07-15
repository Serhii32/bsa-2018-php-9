<?php

use Faker\Generator as Faker;
use App\Currency;

$factory->define(Currency::class, function (Faker $faker) {

    return [
            'title' => $faker->unique()->word,
            'short_name' => $faker->unique()->word,
            'logo_url' => $faker->url,
            'price' => $faker->randomFloat(2, 0, 100000),
    ];
});