<?php

use Faker\Generator as Faker;

$factory->define(\App\ChapterComment::class, function (Faker $faker) {
    return [
        'user_id' => $faker->randomElement(App\User::pluck('id')->toArray()),
        'chapter_id' => $faker->randomElement(App\Chapter::pluck('id')->toArray()),
        'content' => $faker->text(500),
    ];
});
