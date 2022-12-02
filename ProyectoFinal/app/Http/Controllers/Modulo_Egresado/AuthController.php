<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        return view('egresado.session');
    }

    public function index()
    {
        //Aqui se valida que tipo de rol es en base de datos
        //Dependiendo del rol, muestra el texto
        $texto = 'RESOLVER ENCUESTA DE EGRESADO';

        //ruta de la encuesta correspondiente
        $ruta = '/P_EgresadoA';
      
        return view('/egresado/P_MenuEgresado',[
            'texto' => $texto,
            'url' => $ruta
            ]);
    }

    /*public function encuestas($encuesta)
    {
        //Aqui se mostraran las encuestas dependiendo de la validacion de index
        return view('login.egresado'.$encuesta);
    }
    */

}
