<?php

use Faker\Generator as Faker;
use App\Results;

$factory->define(Results::class, function (Faker $faker) {
    return [
        "course_id"=>rand(1,5),
        "blok"=>rand(1,4),
        "grade"=>rand(1,10),
        "ec"=>5
    ];
});
