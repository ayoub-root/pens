<?php

use Faker\Generator as Faker;


$factory->define(\App\Novel::class, function (Faker $faker) {
    return [
        'title'   => $faker->sentence(),
        'description' => $faker->text(1000),
        'user_id' => $faker->randomElement(App\User::pluck('id')->toArray())
    ];
});
