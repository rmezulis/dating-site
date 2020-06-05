<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Picture;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Storage;

$factory->define(Picture::class, function (Faker $faker) {
    sleep(1);
    $contents = file_get_contents('https://www.thispersondoesnotexist.com/image');
    $name = uniqid();
    Storage::put('pictures/' . $name . '.png', $contents);
    return [
        'location' => 'pictures/' . $name . '.png'
    ];
});
