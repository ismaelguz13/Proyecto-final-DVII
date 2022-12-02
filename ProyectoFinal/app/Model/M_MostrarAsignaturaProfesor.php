<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class M_MostrarAsignaturaProfesor extends Model
{
    protected $table='profesor_asignatura_grupo';

    protected $fillable =[
        'id_profesor'
    ];
}
