<?php

use Faker\Generator as Faker;

$factory->define(\App\Host::class, function (Faker $faker) {
    return [
        'user_id' => factory(\App\User::class)->create()->id
    ];
});
