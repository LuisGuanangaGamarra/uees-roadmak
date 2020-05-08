<?php

use Faker\Generator as Faker;

$factory->define(App\ConsultoriaPlantilla::class, function (Faker $faker) {
    return [
        'id_consultoria' => $faker->randomDigit,
        'id_plantilla' => $faker->randomDigit,
        'anios'=>$faker->randomDigit,
        'default' => 'False'
    ];
});
