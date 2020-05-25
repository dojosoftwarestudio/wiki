<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use App\Task;


$factory->define(Task::class, function (Faker $faker) {
    return [
        'keep' => $faker->text($maxNbChars = 120),
        'user_id' => $faker->numberBetween(1,10)
    ];
});
