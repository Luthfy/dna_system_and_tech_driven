<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Customer;
use Faker\Generator as Faker;

$factory->define(Customer::class, function (Faker $faker) {
    return [
        'nm_customer' => $faker->name,
        'address_customer' => $faker->address,
        'phone_customer' => '085332829440',
        'id_user' => 1
    ];
});
