<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\StudentModel as MainModel;
use Faker\Generator as Faker;

$factory->define(MainModel::class, function (Faker $faker) {
    return [
        'name'  => $faker->name,
        // 'email' => $faker->unique()->safeEmail,
        // 'phone' => $faker->phoneNumber,
    ];
});
