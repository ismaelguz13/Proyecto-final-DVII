<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Pregunta extends Model
{
    protected $table = 'pregunta';
    protected $primaryKey = 'id_pregunta';
    public $timestamps = false;
    public function opciones()
    {
        return $this->hasMany('App\Model\Opcion','id_pregunta');
    }

    public static function boot() {
        parent::boot();

        static::deleting(function($pregunta) { 
             $pregunta->opciones()->delete();
        });
    }

    protected $fillable = [
        'descrip_preg','tipo_preg','id_encuesta','id_seccion'
    ];
}

