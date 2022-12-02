<?php

namespace App\SEL_Modelos;

use Illuminate\Database\Eloquent\Model;

class E_Egresado extends Model
{
    //
    protected $table = 'egresado';
    public $timestamps = false;

    
    public function sede()
    {
        return $this->hasMany('App\Sede');
    }

    public function carrera()
    {
        return $this->hasMany('App\Carrera');
    }

}

