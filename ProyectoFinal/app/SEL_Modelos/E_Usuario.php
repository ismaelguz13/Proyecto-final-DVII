<?php

namespace App\SEL_Modelos;

use Illuminate\Database\Eloquent\Model;

class E_Usuario extends Model
{
    protected $table = 'usuario';
    protected $primaryKey = 'id_usuario';
    public $timestamps = false;
    protected $fillable = [
        'cedula','clave','id_rol_usuario','id_encuesta'
    ];

}
