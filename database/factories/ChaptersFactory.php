<?php

use Faker\Generator as Faker;
use App\Novel;

$factory->define(\App\Chapter::class, function (Faker $faker) {
    return [
        'number' => $faker->randomDigitNotNull(),
        'title' => $faker->sentence(),
        'content' => $faker->text(6000),
        'novel_id' => $faker->randomElement(App\Novel::pluck('id')->toArray())
    ];
});
