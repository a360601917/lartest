<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\Category::class, function (Faker $faker) {
    return [
        'name'=>$faker->name,
        'sort'=>$faker->unique()->numberBetween(1, 50),
    ];
});
