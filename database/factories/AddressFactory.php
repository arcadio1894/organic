<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Address;
use Faker\Generator as Faker;

$factory->define(Address::class, function (Faker $faker) {
    return [
        'postcode' => $faker->postcode,
        'address' => $faker->address,
        'city' => $faker->city,
        'country' => $faker->country,
        'customer_id' => factory(App\Customer::class),
    ];
});
