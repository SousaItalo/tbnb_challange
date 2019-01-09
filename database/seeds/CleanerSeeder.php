<?php

use Illuminate\Database\Seeder;

class CleanerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /** @var \App\Cleaner $NORMAL_CLEANER */
        $NORMAL_CLEANER = factory(\App\Cleaner::class)->create([
            'user_id' => factory(\App\User::class)->create([
                'name' => 'Patricia Solvos',
                'email' => 'cleaner1@turnoverbnb.com'
            ])->id
        ]);

        /** @var \App\Cleaner $SECOND_CLEANER */
        $SECOND_CLEANER = factory(\App\Cleaner::class)->create([
            'user_id' => factory(\App\User::class)->create([
                'name' => 'Robson Crosué',
                'email' => 'cleaner2@turnoverbnb.com'
            ])->id
        ]);

        /** @var \App\Host $FIRST_HOST */
        $FIRST_HOST = \App\Host::find(1);

        $FIRST_HOST->cleaners()->attach($NORMAL_CLEANER->id);

        /** @var \App\Host $SECOND_HOST */
        $SECOND_HOST = \App\Host::find(2);

        $SECOND_HOST->cleaners()->attach([
            $NORMAL_CLEANER->id,
            $SECOND_CLEANER->id
        ]);

        $firstHostHouses = $FIRST_HOST->houses;
        $secondHostHouses = $SECOND_HOST->houses;

        /** @var \App\House $firstHouse */
        $house = $firstHostHouses->first();

        $house->cleaners()->attach($NORMAL_CLEANER->id);

        $secondHostHouses->each(function (\App\House $house) use ($SECOND_CLEANER) {
            $house->cleaners()->attach($SECOND_CLEANER->id);
        });
    }
}
