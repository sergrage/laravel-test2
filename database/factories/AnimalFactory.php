<?php

use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'type' => $faker->animal,
        'user_id' => $faker->unique()->numberBetween(1, App\User::count()),
    ];
});
