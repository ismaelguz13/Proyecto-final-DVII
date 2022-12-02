<?php

namespace App\SER_Modelos;

use Illuminate\Database\Eloquent\Model;

class E_Usuario extends Model
{
    protected $table = 'usuario';
    protected $primaryKey = 'id_usuario';

    protected $fillable = [
        'cedula','clave','id_rol_usuario','id_encuesta'
    ];

}
