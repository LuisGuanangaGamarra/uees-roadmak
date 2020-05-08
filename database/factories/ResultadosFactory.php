<?php

use Faker\Generator as Faker;

$factory->define(App\Resultados::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence,
        'type_1' => $faker->sentence,
       // 'type_2' => $faker->sentence
    ];
});
