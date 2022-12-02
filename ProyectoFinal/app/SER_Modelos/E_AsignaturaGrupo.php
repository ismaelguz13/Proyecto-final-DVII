<?php

namespace App\SER_Modelos;
use Illuminate\Database\Eloquent\Model;

class E_AsignaturaGrupo extends Model
{
    protected $table = 'asignatura_grupo';
    protected $primaryKey = 'id_asignatura, id_grupo';

    protected $fillable = [
        'codhora' 
    ];

    public $timestamps = false;
}