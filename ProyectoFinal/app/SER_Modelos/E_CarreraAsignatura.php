<?php

namespace App\SER_Modelos;

use Illuminate\Database\Eloquent\Model;

class E_CarreraAsignatura extends Model
{
    protected $table = 'carrera_asignatura';
    protected $primaryKey = 'id_cod_asig';

    protected $fillable = [
        'id_carrera','id_asignatura','año_carrera', 'semestre'
    ];
}
