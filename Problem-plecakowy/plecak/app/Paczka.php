<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paczka extends Model
{
    protected $fillable = [
        'id', 'nazwa', 'waga', 'wartosc', 'kod_przes', 'nadawca', 'odbiorca', 'woz_kurier',

    ];
    protected $hidden = [
        
    ];
}
