<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class IngresarAsignaturaProf extends Model
{
    protected $table='profesor_asignatura_grupo';
    public $timestamps = false;

    protected $fillable =[
        'id_profesor', 'id_grupo', 'id_asignatura', 'semestre', 'año'
    ];
}
