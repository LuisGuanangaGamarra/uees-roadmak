<?php

use Faker\Generator as Faker;

$factory->define(App\Balance::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence,
        'type_1' => $faker->sentence,
        'type_2' => $faker->sentence
        
    ];
});
