<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Egresado extends Model
{
    protected $table = 'egresado';
    protected $primaryKey ='id_egresado';

    protected $fillable = [
        'cedula','nombre','apellido','correo','telefono','id_usuario','id_sede','id_carrera'
    ];
}
