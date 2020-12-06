<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Cliente;
use Faker\Generator as Faker;

$factory->define(Cliente::class, function (Faker $faker) {
    return [
        'nombre'=>$faker->firstName(),
        'apellido'=>$faker->lastName(),
        'dni'=>$faker->numberBetween($min=35000000,$max=40000000),
        'fnacimiento'=>$faker->date($format = 'Y-m-d'),
        'telefono'=>$faker->numberBetween($min=3364000000,$max="3364999999"),
        'domicilio'=>$faker->address(),
    ];
});
