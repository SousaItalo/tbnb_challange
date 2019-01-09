<?php

use Faker\Generator as Faker;

$factory->define(\App\CleaningProject::class, function (Faker $faker) {
    $days = rand(0, 10);

    return [
        'house_id' => factory(\App\House::class)->create()->id,
        'cleaner_id' => factory(\App\Cleaner::class)->create()->id,
        'start' => \Carbon\Carbon::now()->addDays($days),
        'end' => \Carbon\Carbon::now()->addDays($days)->addHours(3)
    ];
});
