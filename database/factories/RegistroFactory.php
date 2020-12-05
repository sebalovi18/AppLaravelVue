<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Registro;
use Faker\Generator as Faker;

$factory->define(Registro::class, function (Faker $faker) {
    return [
        'n_mesa'=>$faker->numberBetween($min=1,$max=15),
        'fecha'=>$faker->dateTimeBetween($startDate = '01/11/2020 00:00:00' , $endDate='01/02/2021 00:00:00')
    ];
});
