<?php

use Faker\Generator as Faker;

$factory->define(App\Flujos::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence,
    
    ];
});
