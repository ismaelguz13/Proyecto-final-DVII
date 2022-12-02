<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PreguntasDocente extends Model
{
    protected $primaryKey = 'id_pregunta';
    protected $table = 'pregunta';
    public $timestamps = false;

    protected $fillable = [
        'descrip_preg','cod_preg','id_encuesta','id_seccion'
    ];
}
