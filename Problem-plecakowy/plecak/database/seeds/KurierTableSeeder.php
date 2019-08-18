<?php

use Illuminate\Database\Seeder;
use App\Kurier;

class KurierTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        for($i = 0; $i < 1000; $i++)
        {
            $kurier = new Kurier();
            $kurier->imie = $faker->firstName;
            $kurier->nazwisko = $faker->lastName;
            $kurier->nr_tel = $faker->regexify('[0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9]');
            $kurier->auto_id = $faker->numberBetween(1, 399);
            $kurier->adres_zamieszkania = $faker->numberBetween(1,1999);
            $kurier->save();
        }
    }
}
