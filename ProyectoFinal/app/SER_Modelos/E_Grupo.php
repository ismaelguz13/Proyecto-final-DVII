<?php

namespace App\SER_Modelos;

use Illuminate\Database\Eloquent\Model;

class E_Grupo extends Model
{
    //
    protected $table = 'grupo';
    protected $primaryKey = 'id_grupo';

    protected $fillable = [
        'cod_grupo', 'turno', 'semestre', 'año', 'id_carrera','id_sede'
    ];

    
    public function asignaturas()
    {
        return $this->hasMany('App\SER_Modelos\E_Asignatura','id_asignatura');
    }

    public function carrera()
    {
        return $this->belongsTo('App\SER_Modelos\E_Carrera');
    }
}
