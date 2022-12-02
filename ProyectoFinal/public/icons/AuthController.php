<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Preguntas;
use App\Models\Opciones;

use App\Http\Requests\LoginRequest;

class AuthController extends Controller
{

    public function login()
    {
        return view('login.session');
    }

    public function validacion(Request $request)
    {

        $usuarios = Usuario::get()->all();
        $cedula = $request->cedula;
        $clave = $request->clave;

        
        foreach ($usuarios as $usuario) {
            if ($cedula === $usuario->cedula && $clave === $usuario->clave) 
            {
                // $encrypt = encrypt($usuario->id_rol_usuario);
                session(['id_usuario' => $usuario->id_usuario]);
                return redirect('menueg/'.$usuario->id_rol_usuario);   
            }
        }
        return view('login.session');
    }

    public function index($id)
    {
        // $id = decrypt($id);
        //Aqui se valida que tipo de rol es en base de datos
        //Dependiendo del rol, muestra el texto
        
        //ruta de la encuesta correspondiente
        $texto = '';
        $ruta = '';
        switch($id){
            case 1:
                return redirect('/menuEstudiantes');
            break;
            case 2:
                return redirect('/modulos');
            break;
            case 3:
                return redirect('/modulos');
            break;
            case 4:
                return redirect('/modulos');
            break;
            case 5:
                return redirect('/modulos');
            break;
            case 6:
                return redirect('/modulos');
            break;
            case 7:
                return redirect('/modulos');
            break;
            case 8:
                
            break;
            case 9:
                $texto = 'RESOLVER ENCUESTA DE ESTUDIANTES';
                $ruta = 'estudiante';
            break;
            case 10:
                $texto = 'RESOLVER ENCUESTA DE EGRESADOS';
                $ruta = 'egresado';
            break;
            case 11:
                $texto = 'RESOLVER ENCUESTA DE EMPRESARIO';
                $ruta = 'empresario';
            break;
        }

        return view('/login/menueg', [
            'texto' => $texto,
            'url' => $ruta,
            'id' => $id
        ]);
    }

    public function encuestas($encuesta)
    {
        //Aqui se mostraran las encuestas dependiendo de la validacion de index
        $opciones = Opciones::get();
        $preguntas = Preguntas::get();
     
        return view('login.'.$encuesta,[
            'preguntas' => $preguntas,
            'opciones' => $opciones
        ]);
    }
}