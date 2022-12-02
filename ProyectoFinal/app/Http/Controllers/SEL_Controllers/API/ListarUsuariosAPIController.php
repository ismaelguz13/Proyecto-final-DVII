<?php
namespace App\Http\Controllers\SEL_Controllers\API;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DB;
use App\SEL_Modelos\E_Estudiante;
use App\SEL_Modelos\E_Administrador;
use App\SEL_Modelos\E_Empresario;
use App\SEL_Modelos\E_Egresado;
use App\SEL_Modelos\E_Profesor;
use App\SEL_Modelos\E_Usuario;




class ListarUsuariosAPIController extends Controller{

/////////////////////////////LISTAR//////////////////////////////////////777
public function validacion(Request $request)
    {
        
        $usuarios = E_Usuario::get()->all();
        $cedula = $request->cedula;
        $clave = $request->clave;
        foreach ($usuarios as $usuario) {
            if($cedula === $usuario->cedula && $clave === $usuario->clave) 
            {
                $authen =true;
                $rol = $usuario->id_rol_usuario;
                $retorno =(['Authenticate' =>$authen,'Message' =>'','id_rol' =>$rol]);
                return response()->json($retorno);
            }

        }
               $authen=false;
               $retorno =(['Authenticate' =>$authen,'Message' =>'Error, datos incorrectos','id_rol' =>0]);
               return response()->json($retorno);
    }


public function listar_admi() {
    $admin = E_Administrador::get();
    return $admin;
    }

    public function listar_estudiante() {
    $estu = E_Estudiante::get();
    return response()->json($estu);
    }

    public function listar_profesor() {
    $profe = E_Profesor::get();
    return response()->json($profe);
    }

    public function listar_egresado() {
    $egre = E_Egresado::get();
    return response()->json($egre);
    }

    public function listar_empresario() {
    $empre = E_Empresario::get();
    return response()->json($empre);
    }
}