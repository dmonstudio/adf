<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Story::class, function (Faker $faker) {
    static $names = [
        '好故事一号',
        '好故事二号',
        '好故事三号',
        '好故事四号',
        '好故事五号',
        '好故事六号',
        '好故事七号',
        '好故事八号',
    ];

    return [
        'name' => $faker->randomElement($names),
        'name_en' => $faker->words(3, true),
        'slug' => $faker->slug,
        'body' => $faker->text,
        'body_en' => $faker->realText(),
        'visible' => $faker->boolean
    ];
});
