<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Aluno::class, function (Faker $faker) {
    return [
        'nome' => $faker->unique()->username,
        'sexo' => $faker->randomElement(['M', 'F']),
        'data_nascimento' => $faker->dateTimeBetween('1990-01-01', '2012-12-31')
            ->format('Y-m-d')
    ];
});
