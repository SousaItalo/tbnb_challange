<?php

use Illuminate\Database\Seeder;

class HostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $NORMAL_HOST = factory(\App\Host::class)->create([
            'user_id' => factory(\App\User::class)->create([
                'name' => 'John',
                'email' => 'host1@turnoverbnb.com'
            ])->id
        ]);

        $HEAVY_HOST = factory(\App\Host::class)->create([
            'user_id' => factory(\App\User::class)->create([
                'name' => 'Rebecca',
                'email' => 'host2@turnoverbnb.com'
            ])->id
        ]);
    }
}
