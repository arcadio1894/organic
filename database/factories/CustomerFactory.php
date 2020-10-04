<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Customer;
use Faker\Generator as Faker;

$factory->define(Customer::class, function (Faker $faker) {
    return [
        'phone' => $faker->phoneNumber,
        'user_id' => factory(App\User::class),
        'name' => function (array $user) {
            return App\User::find($user['user_id'])->name;
        },
    ];
});
