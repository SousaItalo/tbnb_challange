<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(HostSeeder::class);
        $this->call(HouseSeeder::class);
        $this->call(CleanerSeeder::class);
    }
}
