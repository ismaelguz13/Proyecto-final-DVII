<?php

namespace App\SEL_Modelos;

use Illuminate\Database\Eloquent\Model;

class E_Grupo extends Model
{
    protected $table = 'grupo';
    protected $primaryKey = 'id_grupo';

    protected $fillable = [
        'cod_grupo','turno','semestre','año', 'id_carrera', 'id_sede'
    ];
}
