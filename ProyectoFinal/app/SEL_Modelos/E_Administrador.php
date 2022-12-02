<?php

namespace App\SEL_Modelos;

use Illuminate\Database\Eloquent\Model;

class E_Administrador extends Model
{
    
    protected $table = 'administrador';
    protected $filltable = '[id_administrador, cedula, nombre, apellido, correo, telefono, id_usuario]';
    public $timestamps = false;


    
}

