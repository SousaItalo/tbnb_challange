<?php

use Faker\Generator as Faker;

$factory->define(\App\Cleaner::class, function (Faker $faker) {
    return [
        'user_id' => factory(\App\User::class)->create()->id
    ];
});
