<?php

namespace App\SEL_Modelos;

use Illuminate\Database\Eloquent\Model;

class E_Estudiante extends Model
{
    //
    protected $table = 'estudiante';
    public $timestamps = false;


    public function sede()
    {
        return $this->hasMany('App\SEL_Models\Sede');
    }

    public function carrera()
    {
        return $this->hasMany('App\SEL_Models\Carrera');
    }
}

