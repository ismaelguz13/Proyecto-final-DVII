<?php

namespace App\SER_Modelos;

use Illuminate\Database\Eloquent\Model;

class E_Carrera extends Model
{
    //
    protected $table = 'carrera';
    protected $primaryKey = 'id_carrera';

    protected $filable = ['nombre_carrera'];

    public function grupos()
    {
        return $this->hasMany('App\SER_Modelos\E_Grupo');
    }
    public function asignaturas()
    {
        return $this->hasMany('App\SER_Modelos\E_Asignatura','id_asignatura');
    }

    public function respuestas()
    {
        return $this->hasManyThrough('App\SER_Modelos\E_Respuesta','App\SER_Modelos\E_Grupo','id_carrera','id_grupo','id_carrera','id_grupo');
    }
}
