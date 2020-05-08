<?php

use Faker\Generator as Faker;

$factory->define(App\EstadosResultadosIntegrales::class, function (Faker $faker) {
    return [
        'idconsultoria' => $faker->randomDigit,
        'name' => $faker->sentence,
        'periodo1' => $faker->sentence,
        'periodo2' => $faker->sentence,
        'periodo3' => $faker->sentence
    ];
});
