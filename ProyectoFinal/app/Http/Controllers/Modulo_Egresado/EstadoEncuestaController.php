<?php

namespace App\Http\Controllers\Modulo_Egresado;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\ModEstadoencues;
use DB;


class EstadoEncuestaController extends Controller
{
  
    public function index(){
        $texto = 'Secretaría de la vicedecana académica';

        //ruta de la encuesta correspondiente
        $ruta = '/menusecre/encuestaSecre';
        $correos = DB::select("call estadoencuesta"); 
        
        return view('Modulo_3_Egresados.P_EstadoEncuesta',[
            'texto' => $texto,
            'url' => $ruta, 
            ]);
    }

    public function index2(){
        $texto ='Vicedecana de Investigación, Postgrado y Extensión';

        //ruta de la encuesta correspondiente
        $ruta = '/menuvice/menureportes';
        $correos = DB::select("call estadoencuesta"); 
        
        return view('Modulo_3_Egresados.P_EstadoEncuesta',[
            'texto' => $texto,
            'url' => $ruta, 
            ]);
    }
    
    /* Metodo para consultar estados de encuesta respondida*/
    public function GetEstados(){
       $correos = DB::select("call estadoencuesta"); 
        
       $forDtt['data']=$correos;

       return response()->json($forDtt);
    }

    public function GetEstados2(){
        $correos = DB::select("call estadoencuesta"); 
 
        return response()->json($correos);
     }
    
}