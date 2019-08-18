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
        $this->call(AdresTableSeeder::class);
        $this->call(AutoTableSeeder::class);
        $this->call(KurierTableSeeder::class);
        $this->call(PaczkaTableSeeder::class);
    }
}
