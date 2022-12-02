<?php

namespace App\Http\Controllers\Empresarios_Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\SEL_Modelos\E_Usuario;
use App\SEL_Modelos\E_Empresario;
use App\Mail\EncuestaMail;
use Illuminate\Support\Facades\Mail;



class EnviarEncuestaController extends Controller
{
    public function enviar(){

        $empresarios = E_Empresario::select('correo','id_usuario')->get();
     
        //LLEVA LOS CORREOS DE LOS EMPRESARIOS A LA VISTA
        return view('SEL_Vistas/Administrador/Modulo_Empresario/P_EnviarEncuesta',[
            'empresarios' => $empresarios
        ]);
    }

    public function enviando(){
        
        $id_usuario = E_Empresario::select('correo','id_usuario')->where('id_usuario',request()->id_usuario)->first();
        $usuario = E_Usuario::select('cedula','clave')->where('id_usuario',request()->id_usuario)->first();

        //ENVIA EL MENSAJE AL CORREO SELECCIONADO.
        Mail::to($id_usuario->correo)->send(new EncuestaMail($usuario->cedula,$usuario->clave));
        
        return redirect('/menu/emp')->with('status','Encuesta Enviada!');
    }
}
