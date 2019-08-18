<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Auto extends Model
{
    protected $fillable = [
         'nr_rej', 'pojemnosc',
    ];
    protected $hidden = [

    ];
}
