<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Showcase::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence,
        'slug' => $faker->slug,
        'body' => $faker->text
    ];
});
