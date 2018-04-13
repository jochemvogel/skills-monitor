<?php

use Faker\Generator as Faker;
use App\Rubrics;

$factory->define(Rubrics::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence,
        'cols' => rand(1,10),
        'rows' => rand(1,4),
    ];
});
