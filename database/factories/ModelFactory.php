<?php

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

$factory->define(App\Alumno::class, function (Faker\Generator $faker) {
    return [
        'nombre' => $faker->name,
        'ap_paterno' => $faker->name,
        'ap_materno' => $faker->name,
        'activo' => $faker->name
    ];
});


$factory->define(App\Materia::class, function (Faker\Generator $faker) {
    return [
        'nombre' => $faker->name,
        'activo' => $faker->name
    ];
});
