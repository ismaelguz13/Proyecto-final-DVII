<?php
namespace App\Http\Controllers\SEL_Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DB;

class EliminarUsuarioController extends Controller{


////////////////////////////////////////////ELIMINAR USUARIO/////////////////////////////////////

         ///////Administrador//////////
         public function eliminar_administrador($id_administrador){
                
            //Obtenemos del id del administrador que se va a eliminar
            //Realizamos un inner join para que cuando encuentre el admi a eliminar 
            //Tambien se elimine en la tabla madre Usuario esa referencia
            //Asi lo realizamos para cada uno de los diferentes usuarios
           
            $usuario_eliminado =  DB::table('usuario')
            ->join ('administrador', 'usuario.id_usuario', '=', 'administrador.id_usuario')
            ->where('id_administrador', 'like', $id_administrador)->delete();
            return redirect()->route('nav_msg_del');        }
    

            ///////Profesor//////////
            public function eliminar_profesor($id_profesor){
                
                $usuario_eliminado =  DB::table('usuario')
                ->join ('profesor', 'usuario.id_usuario', '=', 'profesor.id_usuario')
                ->where('id_profesor', 'like', $id_profesor)->delete();
                return redirect()->route('nav_msg_del');  }
        

            ///////Estudiante//////////
            public function eliminar_estudiante($id_estudiante){
                
                 $usuario_eliminado = DB::table('usuario')
                 ->join ('estudiante', 'usuario.id_usuario', '=', 'estudiante.id_usuario')
                 ->where('id_estudiante', 'like', $id_estudiante)->delete();
                 return redirect()->route('nav_msg_del');  }
         
    
            ///////Egresado//////////
            public function eliminar_egresado($id_egresado){
                $usuario_eliminado =  DB::table('usuario')
                ->join ('egresado', 'usuario.id_usuario', '=', 'egresado.id_usuario')
                ->where('id_egresado', 'like', $id_egresado)->delete();
                return redirect()->route('nav_msg_del');  }

            ///////Empresario//////////
            public function eliminar_empresario($id_empresario){
              
                $usuario_eliminado =  DB::table('usuario')
                ->join ('empresario', 'usuario.id_usuario', '=', 'empresario.id_usuario')
                ->where('id_empresario', 'like', $id_empresario)->delete();
                return redirect()->route('nav_msg_del'); }

}





