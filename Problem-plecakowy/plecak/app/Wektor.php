<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wektor extends Model
{
    protected $fillable = [
        'id', 'nazwa', 'waga', 'wartosc', 'kod_przes', 'nadawca', 'odbiorca', 'woz_kurier', 'kurier_id', 'id_produkt'

    ];
    protected $hidden = [

    ];
}
