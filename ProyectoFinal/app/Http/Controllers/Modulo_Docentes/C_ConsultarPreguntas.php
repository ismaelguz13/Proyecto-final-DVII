<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers\Modulo_Docentes;
use App\Http\Controllers\Controller;

use App\Model\PreguntasDocente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class C_ConsultarPreguntas extends Controller
{
    public function Index(){

        $preguntas = PreguntasDocente::all();

        //$preguntas = Preguntas::select('id_pregunta','descrip_preg','cod_preg')->where('id_encuesta','=',1)->get();

        $preguntas = DB::table('pregunta')
        ->select('pregunta.id_pregunta','descrip_preg','tipo_preg','descrip_opcion')
        ->Leftjoin('opciones','pregunta.id_pregunta','opciones.id_pregunta')
        ->where('id_encuesta','=',1)
        ->get();

        //dd($preguntas);
       //return $preguntas;
      return view('Modulo_Docentes\ConsultarPreguntas',compact('preguntas'));
    }


}
