<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Adres extends Model
{
    protected $fillable = [
        'ulica', 'nr_budynku', 'nr_lokalu', 'miasto', 'kod_pocztowy',
    ];

    protected $hidden = [

    ];

    function kurier ()
    {
        return hasMany('App\Kurier');
    }
}
