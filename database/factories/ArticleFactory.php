<?php

use Faker\Generator as Faker;
use App\User;

$factory->define(App\Article::class, function (Faker $faker) {
	$users = App\User::pluck('id')->toArray();
    return [
        'title' => $faker->sentence(6),
        'user_id' => $faker->randomElement($users),
    ];
});
