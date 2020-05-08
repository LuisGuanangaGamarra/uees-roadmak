<?php

use Faker\Generator as Faker;

$factory->define(App\Plantilla::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence,
       // 'descripcion' => $faker->sentence,
        'plantilla' => 'plantilla.xlsx', 
       //  'anios' => $faker->randomDigit, 
    ];
});
