<?php

use Faker\Generator as Faker;

$factory->define(App\Consultoria::class, function (Faker $faker) {
    return [
        'id_consultorias_prestashop' => $faker->randomDigit,
        'name' => $faker->sentence,
        'descripcion' => $faker->sentence,
        'plantilla' => $faker->unique()->randomDigit,
        'precio' => $faker->randomFloat($nbMaxDecimals = 2, $min = 500, $max = 2000) // 48.8932
    ];
});
