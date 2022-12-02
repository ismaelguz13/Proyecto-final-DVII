<?php

namespace App\SER_Modelos;

use Illuminate\Database\Eloquent\Model;

class E_Asignatura extends Model
{
    protected $table = 'asignatura';
    protected $primaryKey = 'id_asignatura';

    protected $fillable = [
        'cod_asignatura','nombre'
    ];

    public $timestamps = false;

    public function respuestas()
    {
        return $this->hasMany('App\SER_Modelos\E_Respuesta');
    }
    public function carreras()
    {
        return $this->belongsToMany('App\SER_Modelos\E_Carrera');
    }
}
