<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Profile;
use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(Profile::class, function (Faker $faker) {
    $gender = $faker->randomElement(['male', 'female']);
    return [
        'first_name' => $faker->firstName($gender),
        'last_name' => $faker->lastName,
        'birthday' => $faker->date('Y-m-d', '-18 years'),
        'gender' => $gender,
        'country' => $faker->country,
        'bio'=> $faker->text
    ];
});
