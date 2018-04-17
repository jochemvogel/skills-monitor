<?php

use Faker\Generator as Faker;
use App\Field;

$factory->define(Field::class, function (Faker $faker) {
    return [
        'content' => $faker->sentence,
    ];
});
