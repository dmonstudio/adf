<?php

use Faker\Generator as Faker;
use App\Models\Showcase;

$factory->define(Showcase::class, function (Faker $faker) {
    static $names = [
        '大项目一号',
        '大项目二号',
        '大项目三号',
        '大项目四号',
        '大项目五号',
        '大项目六号',
        '大项目七号',
        '大项目八号',
    ];

    return [
        'name' => $faker->randomElement($names),
        'name_en' => $faker->words(3, true),
        'slug' => $faker->slug,
        'body' => $faker->text,
        'body_en' => $faker->realText(),
        'category' => $faker->randomElement(array_keys(Showcase::CATEGORIES)),
        'visible' => $faker->boolean
    ];
});
