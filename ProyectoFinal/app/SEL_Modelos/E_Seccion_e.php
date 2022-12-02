<?php

namespace App\SEL_Modelos;

use Illuminate\Database\Eloquent\Model;

class E_Session_e extends Model
{
    protected $table = 'seccion_e';
    protected $primaryKey = 'id_seccion';

    protected $fillable = [
        'descrip_encuesta','id_encuesta'
    ];

}
