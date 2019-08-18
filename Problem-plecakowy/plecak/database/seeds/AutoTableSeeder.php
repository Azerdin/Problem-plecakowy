<?php

use Illuminate\Database\Seeder;
use App\Auto;

class AutoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        for($i=0; $i<400; $i++)
        {
            $auto = new Auto();
            $auto->nr_rej = $faker->regexify('[A-Z][A-Z] [0-9][0-9][0-9][0-9][0-9]');
            $auto->pojemnosc = $faker->numberBetween(1000, 2000);
            $auto->save();

        }
    }
}
