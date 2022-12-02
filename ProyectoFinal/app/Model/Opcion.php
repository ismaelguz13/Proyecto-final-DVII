<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Opcion extends Model
{
    protected $table = 'opciones';
    protected $primaryKey = 'id_opcion';
    public $timestamps = false;

    public function pregunta()
    {
        return $this->belongsTo('App\Model\Opcion');
    }

    protected $fillable = [
        'descrip_opcion','id_pregunta'
    ];
}
