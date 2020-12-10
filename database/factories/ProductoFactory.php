<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Producto;
use Faker\Generator as Faker;

$factory->define(Producto::class, function (Faker $faker) {
    $faker->addProvider(new \FakerRestaurant\Provider\es_PE\Restaurant($faker));
    return [
        'nombre'=>$faker->foodName(),
        'precio'=>$faker->numberBetween($min=10,$max=1800),
        'descripcion'=>$faker->text($max=100),
    ];
});
