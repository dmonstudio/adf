<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Job::class, function (Faker $faker) {
    return [
        'title' => '招聘职位' . $faker->randomNumber(),
        'title_en' => $faker->jobTitle,
        'description' => $faker->text,
        'description_en' => $faker->realText(),
        'requirements' => $faker->sentences(),
        'requirements_en' => $faker->sentences()
    ];
});
