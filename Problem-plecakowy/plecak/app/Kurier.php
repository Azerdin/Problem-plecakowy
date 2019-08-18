<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kurier extends Model
{
    protected $fillable = [
        'imie', 'nazwisko', 'nr_tel', 'auto_id', 'adres_zamieszkania',
    ];
    protected $hidden = [

    ];
    function auto()
    {
        return $this->belongsTo('App\Auto', 'auto_id');
    }

    function adres()
    {
        return $this->belongsTo('App\Adres', 'adres_zamieszkania');
    }
}
