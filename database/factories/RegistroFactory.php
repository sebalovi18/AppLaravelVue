<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Registro;
use Faker\Generator as Faker;

$factory->define(Registro::class, function (Faker $faker) {
    return [
        'n_mesa'=>$faker->numberBetween($min=1,$max=15),
        'fecha'=>$faker->dateTime()
    ];
});
