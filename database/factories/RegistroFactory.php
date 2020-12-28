<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Registro;
use Faker\Generator as Faker;

$factory->define(
    Registro::class,
    function (Faker $faker) {
        return [
            'n_mesa' => $faker->numberBetween($min = 1, $max = 15),
            'fecha' => $faker->dateTimeBetween(
                $startDate = '2020/12/26 00:00:00',
                $endDate = '2020/12/31 00:00:00'
            )
        ];
    }
);
