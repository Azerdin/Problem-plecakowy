<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Redirect;
use App\Kurier;
use App\Paczka;
use App\Auto;
use App\Adres;
use App\Wektor;

class PlecakController extends Controller
{
    public function algorithm(Request $request)
    {
        $kurier = Kurier::find($request->get('kurier_id'));
        
        $pojemnosc = $kurier->auto->pojemnosc;
        //Parametry startowe
        //********************************************** */
        $hms = (int) $request->input('liczba_paczek');//liczba ele. w wektorze
        $hmcr = 70; //prawdopodobienstwo HMCR
        $par = 20; //prawdopodobienstwo PAR
        $ni = 10000; //czas
        //********************************************** */
        $sumWaga = 0; 
        $sumWartosc = 0; 
        $minimum = 0; 
        $minimumIndeks = 0;
        $maksimum = 0;
        $maksimumIndeks = 0;
        $randomNumber = 0;
        $iloscProduktow = 400;
        $newHmId = array();
        //Inicjalizacja pamieci HM
        //************************************************ */
        for($i = 0 ; $i < $iloscProduktow; $i++)
        {
            for($j = 0; $j < $hms; $j++)
            {
                if(($i == 0 && $j > 0) || $i > 0)
                {
                    do
                    {
                         $randNumber = rand(1,9999);///losowanie rekordu
                    }
                    while(in_array($randNumber, call_user_func_array('array_merge', $hmId)));
                }
                else
                {
                    $randNumber = rand(1,9999);
                }
                $paczka = Paczka::find($randNumber);
                $hmId[$i][$j] = $paczka->id;
                $hmNazwa[$i][$j] = $paczka->nazwa; //nazwa
                $hmWaga[$i][$j] = $paczka->waga; //waga
                $hmWartosc[$i][$j] = $paczka->wartosc; //wartosc
                $sumWaga += $hmWaga[$i][$j]; //sumowanie wag wektora
                $sumWartosc += $hmWartosc[$i][$j]; //sumowanie wartosci wektora
            }
            $hmWaga[$i][$hms] = $sumWaga; //w ostatniej kolumnie $hmWaga znajduje się suma wag
            $hmWartosc[$i][$hms] = $sumWartosc; //w ostatniej kolumnie $hmWartosc znajduje się suma wartosci
            $sumWaga = 0;
            $sumWartosc = 0;
        }
        //************************************************ */
        for($x = 0; $x < $ni; $x++) //TEST ni-operacji
        {
            $sumWaga = 0;
            $sumWartosc = 0;
            $minimum = 0;
            $minimumIndeks = 0;
            $maksimum = 0;
            $maksimumIndeks = 0;
        
            $randomNumber = rand(0, 100);
        //Improwizacja HMCR
        //************************************************ */
            if($randomNumber < $hmcr) 
            {
                //Tworzenie nowego wektora na podstawie pamieci HM
                for($i = 0; $i < $hms; $i++)
                {
                    //////////////////////////////////////////////////
                    /////////////////////////////////////////////////
                        $j = rand(0,$iloscProduktow-1);
                    $newHmId[$i] = $hmId[$j][$i];
                    $newHmNazwa[$i] = $hmNazwa[$j][$i];
                    $newHmWaga[$i] = $hmWaga[$j][$i];         
                    $newHmWartosc[$i] = $hmWartosc[$j][$i];
                    $sumWaga += $newHmWaga[$i];
                    $sumWartosc += $newHmWartosc[$i];
                }
                $randomNumber = rand(0, 100);
        //************************************************ */
        //Improwizacja PR
        //************************************************ */
                if($randomNumber < $par )
                {
                    //losoujemy element z nowego wektora do dostrojenia
                    //$k = rand(0, $hms-1); 
                    //losujemy element z pamieci hm ktory zastapi element powyzej
                    $i = rand(0, $hms-1);   
                    $j = rand(0, $iloscProduktow-1);
                    if(in_array($hmId[$j][$i], $newHmId) == false)
                    {

                        if($hmWartosc[$j][$i] > $newHmWartosc[$i])
                        { //Sprawdzamy czy nowy element ma nowa wartosc
                            if(($sumWaga + $hmWaga[$j][$i] - $newHmWaga[$i]) <= $pojemnosc) //Sprawdzamy czy wymiana tego elementu nie sprawi ze waga za duza
                            {
                            //Zamiana
                            
                            $sumWaga -= $newHmWaga[$i];
                            $sumWartosc -= $newHmWartosc[$i];

                            $newHmId[$i] = $hmId[$j][$i];
                            $newHmWaga[$i] = $hmWaga[$j][$i];
                            $newHmWartosc[$i] = $hmWartosc[$j][$i];
                            $newHmNazwa[$i] = $hmNazwa[$j][$i];

                            $sumWaga += $hmWaga[$j][$i];
                            $sumWartosc += $hmWartosc[$j][$i];
                        }
                    }
                }
                   
                }
                $newHmWaga[$hms] = $sumWaga;
                $newHmWartosc[$hms] = $sumWartosc;
            }
        //************************************************ */
        //Improwizacja losowa
        //************************************************ */
            else
            {
                for($i = 0; $i < $hms; $i++)
                {
                    do
                    {
                        $randNumber = rand(1,9999);///losowanie rekordu
                       
                    }
                    while(in_array($randNumber, call_user_func_array('array_merge', $hmId)));
                    $paczka = Paczka::find($randNumber); //losowanie rekordu
                    $newHmId[$i] = $paczka->id;
                    $newHmWaga[$i] = $paczka->waga;
                    $newHmWartosc[$i] = $paczka->wartosc;
                    $newHmNazwa[$i] = $paczka->nazwa;
                    $sumWaga += $newHmWaga[$i];      
                    $sumWartosc += $newHmWartosc[$i];
                }
                $newHmWaga[$hms] = $sumWaga;
                $newHmWartosc[$hms] = $sumWartosc;
            }   
        //************************************************ */
        //Szukanie najgorszego wektora
        //Przypadek gdy nowy wektor ma za duża pojemnosc, wtedy szukamy wektora z najwieksza waga z HM
        //************************************************ */
            if($newHmWaga[$hms] > $pojemnosc)
            {
                $maksimum = $hmWaga[0][$hms];
                $maksimumIndeks = 0; //indeks wektora o najwiekszej wadze
                for($i = 1; $i < $iloscProduktow; $i++)
                {
                    if($maksimum < $hmWaga[$i][$hms])
                    {
                        $maksimum = $hmWaga[$i][$hms];
                        $maksimumIndeks = $i;
                    }
                }
                if($maksimum > $pojemnosc) //sprawdzamy czt wylosowany wektor ma za duza pojemnosc
                {
                    if($newHmWaga[$hms] < $hmWaga[$maksimumIndeks][$hms]) //sprawdzamy czy pojemnosc nowego wektora jest korzystniejsza od najgorszego z pam. hm
                    {
                        //Zamiana
                        for($i = 0; $i < $hms; $i++)
                        {
                            $hmId[$maksimumIndeks][$i] = $newHmId[$i];
                            $hmWaga[$maksimumIndeks][$i] = $newHmWaga[$i];
                            $hmWartosc[$maksimumIndeks][$i] = $newHmWartosc[$i];
                            $hmNazwa[$maksimumIndeks][$i] = $newHmNazwa[$i];
                        }
                        $hmWaga[$maksimumIndeks][$hms] = $newHmWaga[$hms];
                        $hmWartosc[$maksimumIndeks][$hms] = $newHmWartosc[$hms];
                    }
                 }

            }
        //************************************************ */
        //Szukanie najgorszego wektora
        //Przypadek gdy nowy wektor ma wage ok, wtedy szukamy wektora z najmniejsza wartoscia
        //************************************************ */
            else
            {
                $minimum = $hmWartosc[0][$hms];
                $minimumIndeks = 0; //indeks wektora o najmniejszej wartosci
                for($i = 1; $i < $iloscProduktow; $i++)
                {
                    if($minimum > $hmWartosc[$i][$hms])
                    {
                        $minimum = $hmWartosc[$i][$hms];
                        $minimumIndeks = $i;
                    }
                }
                if($newHmWartosc[$hms] > $hmWartosc[$minimumIndeks][$hms]) //sprawdzamy czy nowy element ma wieksza wartosci niz najgorszy z pam. hm
                {
                    //zamiana
                    for($i = 0; $i < $hms; $i++)
                    {
                        $hmId[$minimumIndeks][$i] = $newHmId[$i];
                        $hmWaga[$minimumIndeks][$i] = $newHmWaga[$i];
                        $hmWartosc[$minimumIndeks][$i] = $newHmWartosc[$i];
                        $hmNazwa[$minimumIndeks][$i] = $newHmNazwa[$i];
                    }
                    $hmWaga[$minimumIndeks][$hms] = $newHmWaga[$hms];
                    $hmWartosc[$minimumIndeks][$hms] = $newHmWartosc[$hms];
                }
            }
        //************************************************ */
        }
        //Najlepszy wynik
        //************************************************ */
        $maksimum = 0;
        $maksimumIndeks = -1;
        for($i = 0; $i < $iloscProduktow; $i++)
        {
            if($maksimum < $hmWartosc[$i][$hms])
            {
                if($hmWaga[$i][$hms] <= $pojemnosc)
                {
                    $maksimum = $hmWartosc[$i][$hms];
                    $maksimumIndeks = $i;
                }                   
            }
        }
        //if($maksimumIndeks != -1)
        //{
            if(Wektor::where("kurier_id", "=", $kurier->id)->count() > 0)
        {
            $w = Wektor::where("kurier_id", "=", $kurier->id)->get();
            for($i = 0; $i < count($w); $i++)
            {
                $w[$i]->delete();
            }
            
        }
        for($i = 0; $i < $hms; $i++)
        {
            $wektor = new Wektor();
            $paczka = Paczka::find($hmId[$maksimumIndeks][$i]);
            $wektor->nazwa = $paczka->nazwa;
            $wektor->waga = $paczka->waga;
            $wektor->wartosc = $paczka->wartosc;
            $wektor->kod_przes = $paczka->kod_przes;
            $wektor->nadawca = $paczka->nadawca;
            $wektor->odbiorca = $paczka->odbiorca;
            $wektor->woz_kurier = $paczka->woz_kurier;
            $wektor->kurier_id = $kurier->id;
            $wektor->id_produkt = $paczka->id;
            $wektor->save();

        }
        //}
        
        //************************************************ */
        return view('result')->with('waga', $hmWaga)
                             ->with('wartosc', $hmWartosc)
                             ->with('nazwa', $hmNazwa)
                             ->with('indeks', $maksimumIndeks)
                             ->with('hms', $hms)
                             ->with('kurier', $kurier)
                             ->with('id', $hmId)
                             ->with('iloscProduktow', $iloscProduktow);
    }

    public function showResult()
    {
        $wektor = Wektor::all();
        $auto = Auto::all();
        $kurier = Kurier::all();
        return view('results')->with('wektor', $wektor)->with('auto', $auto)->with('kurier', $kurier);
    }

}
