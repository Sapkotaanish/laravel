<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Tournament;
use Faker\Generator as Faker;

$factory->define(Tournament::class, function (Faker $faker) {
    return [
        'user_id' => rand(1, 3),
        'title' => $faker->sentence(4),
        'body' => $faker->paragraph(2),
        'start_at' => $faker->dateTime( $start_at = \Carbon\Carbon::now()->addDays(30) ),
        'end_at' => $faker->dateTime( $start_at->addDays( rand(0,3) ) ),
        'published' => rand(0, 1)
    ];
});
