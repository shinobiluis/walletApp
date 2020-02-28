<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Wallet;
use Faker\Generator as Faker;

$factory->define(Wallet::class, function (Faker $faker) {
    return [
        /**
         * Le decimos los campos a los que agregara cuando hagamos la prueba
         */
        'money' => $faker->numberBetween(500, 900)
    ];
});
