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

$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password = 123456;

    return [
        'name' => 'Administrador',
        'email' => 'admin@admin.com.br',
        'password' => bcrypt($password),
        'administrator' => 1,
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Cliente::class, function (Faker\Generator $faker) {
    return [
        'nome' => $faker->unique()->name,
        'email' => $faker->unique()->safeEmail,
        'endereco' => $faker->address,
        'cnpj' => $faker->PhoneNumber,
        'telefone' => $faker->PhoneNumber,
        ];
});

$factory->define(App\TimeSheet::class, function (Faker\Generator $faker) {
    return [
        'cliente_id'    => 2,
        'consultor_id'  => 1,
        'data'          => $faker->date,
        'horaini'       => $faker->time,
        'horafim'       => $faker->time,
        'translado'     => $faker->time,
        'desconto'      => $faker->time,
        'total'         => $faker->time,
        'descricao'     => $faker->text(100),
        ];
});