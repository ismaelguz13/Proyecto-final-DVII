<?php

namespace App\SER_Modelos;

use Illuminate\Database\Eloquent\Model;

class E_Opciones extends Model
{
    protected $table = 'opciones';
    protected $primaryKey = 'id_opcion';
    public $timestamps = false;

    public function pregunta()
    {
        return $this->belongsTo('App\SER_Modelos\E_Opciones');
    }

    protected $fillable = [
        'descrip_opcion','id_pregunta'
    ];
}
