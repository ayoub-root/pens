<?php

use Faker\Generator as Faker;

$factory->define(\App\NovelReview::class, function (Faker $faker) {
    return [
        'content' => $faker->text(1000),
        'user_id' => $faker->randomElement(App\User::pluck('id')->toArray()),
        'novel_id' => $faker->randomElement(App\Novel::pluck('id')->toArray())
    ];
});
