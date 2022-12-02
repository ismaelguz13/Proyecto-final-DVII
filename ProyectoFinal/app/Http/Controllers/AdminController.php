<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;
use App\Preguntas;
use App\Respuesta;
use App\Opciones;
use DB;

class AdminController extends Controller
{
    public function index(){
        return view ('admin.menuModulos');
    }

    public function agre(){
        return view ('../admin.modulo4.mantenimiento.agregar');
    }

    public function mostpre(){

        //$Preg=Preguntas::all();
        $Preg=Preguntas::all()
        ->where('id_encuesta','=',4);
        

        //$Preg=DB::table('encuesta')
        //->where('id_encuesta','=',4)
        //->get();
        return view ('../admin.modulo4.preguntasEmpresario', array('preguntas'=>$Preg));
    }
}
