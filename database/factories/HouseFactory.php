<?php

use Faker\Generator as Faker;

$factory->define(\App\House::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'address' => $faker->streetAddress,
        'host_id' => factory(\App\User::class)->create()->id
    ];
});
