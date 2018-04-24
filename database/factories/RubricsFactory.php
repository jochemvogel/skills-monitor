<?php

use Faker\Generator as Faker;
use App\Rubrics;

$factory->define(Rubrics::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence,
        'cols' => rand(1,10),
        'course_id' => rand(1,5),
        'user_id' => 1,
    ];
});
