<?php

namespace App\Http\Controllers\Modulo_Egresado;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Egresado;
use App\Model\Usuario;
use Illuminate\Support\Facades\Mail;
use App\Mail\EnviarCorreo;

class SecreEnviarController extends Controller
{
   
    // FUNCION PARA ENVIAR CORREOS
    public function enviar(){ 

        $egresado = Egresado::select('correo','id_usuario')->get();

        
        return view('Modulo_3_Egresados.P_EnviarEncuesta',[
            'egresado' => $egresado
        ]);
    
        

    }

    public function enviado(){
        
        $id_usuario = Egresado::select('correo','id_usuario')->where('id_usuario',request()->id_usuario)->first();
        $usuario = Usuario::select('cedula','clave')->where('id_usuario',request()->id_usuario)->first();

        //ENVIA EL MENSAJE AL CORREO SELECCIONADO.
        Mail::to($id_usuario->correo)->send(new EnviarCorreo($usuario->cedula,$usuario->clave));
        
        return redirect('Modulo_3_Egresado.P_EnviarEncuesta')->with('status','Encuesta Enviada!');

  

    }

  
}
