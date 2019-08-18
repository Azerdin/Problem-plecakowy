<?php

use Illuminate\Database\Seeder;
use App\Paczka;

class PaczkaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        for($i = 0; $i < 10000; $i++)
        {
            $paczka = new Paczka();
            $paczka->nazwa = $faker->word;
            $paczka->waga = $faker->numberBetween(200, 500);
            $paczka->wartosc = $faker->numberBetween(1, 5000);
            $paczka->kod_przes = $faker->regexify('[0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9]');
            $paczka->nadawca = $faker->numberBetween(1, 1000);
            $paczka->odbiorca = $faker->numberBetween(1001, 1999);
            $paczka->woz_kurier = $faker->numberBetween(1,399);
            $paczka->save();
        }
    }
}
