<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Producto_registro;
use Faker\Generator as Faker;

$factory->define(
    Producto_registro::class,
    function (Faker $faker) {
        return [
            "registro_id" => $faker->numberBetween($min = 1, $max = 50),
            "producto_id" => $faker->numberBetween($min = 1, $max = 150)
        ];
    }
);
