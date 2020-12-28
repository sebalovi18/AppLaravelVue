<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Cliente_Registro;
use Faker\Generator as Faker;

$factory->define(
    Cliente_Registro::class,
    function (Faker $faker) {
        return [
            'cliente_id' => $faker->numberBetween($min = 1, $max = 100),
            'registro_id' => $faker->numberBetween($min = 1, $max = 50)
        ];
    }
);
//borrar