<?php

use Faker\Generator;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$nego = public_path() . '/negocios/';

$factory->define(App\Negocio::class, function (Faker\Generator $faker) use ($nego){
    return [
        'nombre_negocio' => $faker->company,
        'descipcion_negocio' => $faker->text,
        'ubicacion_negocio' => $faker->address,
        'propietario_negocio' => $faker->name,
        'telefono_negocio' => $faker->phoneNumber,
        'menu_negocio' => $faker->file('/home/elotgamu/Imágenes/', $nego),
    ];
});
