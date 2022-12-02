<?php

namespace App\SER_Modelos;

use Illuminate\Database\Eloquent\Model;

class E_Respuesta extends Model
{
    //
    protected $table = 'respuesta';
    protected $primaryKey = 'id_respuesta';

    const CREATE_AT = 'año';
    public $timestamps = false;
    protected $fillable = [
        'id_usuario', 'id_encuesta','id_seccion','id_pregunta',
        'id_opcion','descrip_respuesta','id_asignatura','id_grupo',
        'semestre'
    ];


    
    public function grupo()
    {
        return $this->belongsTo('App\SER_Modelos\E_Grupo','id_grupo');
    }

    public function asignatura()
    {
        return $this->belongsTo('App\SER_Modelos\E_Asignatura','id_asignatura');
    }



    public function scopeAño($query,$año){
        if($año){
            return $query->where('año','LIKE',"%$año%");
        }
    
    }

    public function scopeSemestre($query,$semestre){
        if($semestre){
            return $query->where('semestre','LIKE',"%$semestre%");
        }
    }

    public function scopeCarrera($query,$carrera){
        if($carrera){
            return $query->where('grupo.id_carrera','LIKE',"%$carrera%");
        }
    }
}
