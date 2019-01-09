<?php

use Illuminate\Database\Seeder;

class HouseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $NORMAL_HOST = \App\Host::find(1);
        $HEAVY_HOST = \App\Host::find(2);

        factory(\App\House::class)->create([
            'host_id' => $NORMAL_HOST->id,
        ]);

        for ($i = 0; $i < 15; $i++) {
            factory(\App\House::class)->create([
                'host_id' => $HEAVY_HOST->id
            ]);
        }
    }
}
