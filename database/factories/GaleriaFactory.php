<?php

use Faker\Generator as Faker;

$factory->define(App\Galeria::class, function (Faker $faker) {
    return [
        'idcliente' => $faker->sentence,
        'idinforme' => $faker->sentence,
        'file' => $faker->sentence,
       // 'ruta' => $faker->sentence,
    ];
});
