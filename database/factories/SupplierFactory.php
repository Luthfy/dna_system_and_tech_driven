<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Supplier;
use Faker\Generator as Faker;

$factory->define(Supplier::class, function (Faker $faker) {
    return [
        'nm_supplier' => $faker->company,
        'address_supplier' => $faker->streetAddress.' '.$faker->city,
        'phone_supplier' => '085332829440',
        'id_user' => 1,
    ];
});
