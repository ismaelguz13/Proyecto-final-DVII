<?php

namespace App\SEL_Modelos;

use Illuminate\Database\Eloquent\Model;

class E_Respuesta extends Model
{
    
    protected $table = 'respuesta';
    protected $primaryKey = 'id_respuesta';
    const CREATED_AT = 'año';
    public $timestamps = false;
    protected $fillable = [
        'id_usuario','id_encuesta','id_seccion','id_pregunta','id_opcion','descrip_respuesta','id_asignatura','id_grupo','semestre'
    ];


}
