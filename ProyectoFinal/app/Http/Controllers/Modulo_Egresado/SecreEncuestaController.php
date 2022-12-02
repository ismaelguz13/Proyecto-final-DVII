<?php

namespace App\Http\Controllers\Modulo_Egresado;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class SecreEncuestaController extends Controller
{

    public function index(){
        $texto = 'Secretaría de la vicedecana académica';

        //ruta de la encuesta correspondiente
        $ruta = 'modulos';
      
        return view('/Modulo_3_Egresados/P_SEMenuEncuesta',[
            'texto' => $texto,
            'url' => $ruta
            ]);
    }
    
}
