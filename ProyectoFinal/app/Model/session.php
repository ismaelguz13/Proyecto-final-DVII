<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class session extends Model
{
    protected $table = 'seccion_e';
    protected $primaryKey = 'id_seccion';

    protected $fillable = [
        'descrip_encuesta','id_encuesta'
    ];

}
