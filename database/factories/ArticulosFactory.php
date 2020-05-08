<?php

use Faker\Generator as Faker;

$factory->define(App\Articulos::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence,
        'descripcion' => $faker->sentence,
        'precio' => $faker->randomFloat($nbMaxDecimals = 2, $min = 500, $max = 2000) 
    ];
});
