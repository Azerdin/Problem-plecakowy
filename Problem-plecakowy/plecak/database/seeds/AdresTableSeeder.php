<?php

use Illuminate\Database\Seeder;
use App\Adres;

class AdresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        for($i = 0; $i<2000; $i++)
        {
            $adres = new Adres();
            $adres->ulica = $faker->streetName;
            $adres->nr_budynku = $faker->regexify('[0-9][0-9]');
            $adres->nr_lokalu = $faker->regexify('[0-9][0-9]');
            $adres->miasto = $faker->city;
            $adres->kod_pocztowy = $faker->regexify('[0-9][0-9]-[0-9][0-9][0-9]');
            $adres->save();
        }
    }
}
