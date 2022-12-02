<?php

namespace App\SEL_Modelos;
use Illuminate\Database\Eloquent\Model;

class E_Asignatura extends Model
{
    protected $table = 'asignatura';
    protected $primaryKey = 'id_asignatura';

    protected $fillable = [
        'cod_asignatura','nombre' 
    ];

    public $timestamps = false;
}
