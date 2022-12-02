<?php

namespace App\SEL_Modelos;

use Illuminate\Database\Eloquent\Model;

class E_Profesor extends Model
{
    //
    protected $table = 'profesor';
    public $timestamps = false;

    
    public function sede()
    {
        return $this->hasMany('App\Sede');
    }


}

