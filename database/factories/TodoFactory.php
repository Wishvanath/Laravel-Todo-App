<?php

use Faker\Generator as Faker;

$factory->define(App\Todo::class, function (Faker $faker) {
    return [
        // do your stuff here.
        'todo' => $faker->sentence(10)
    ];
});
