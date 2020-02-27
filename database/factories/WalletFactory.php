<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Wallet;
use Faker\Generator as Faker;

$factory->define(Wallet::class, function (Faker $faker) {
    return [
        'money' => $facker->numberBetween($min = 500, $max = 900)
    ];
});
