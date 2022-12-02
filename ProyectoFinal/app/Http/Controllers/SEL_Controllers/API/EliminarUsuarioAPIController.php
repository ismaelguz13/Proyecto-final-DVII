<?php
namespace App\Http\Controllers\SEL_Controllers\API;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DB;

class EliminarUsuarioAPIController extends Controller{


////////////////////////////////////////////ELIMINAR USUARIO/////////////////////////////////////

         ///////Administrador//////////
         public function eliminar_administrador($id_administrador){
                
            $usuario_eliminado =  DB::table('usuario')
            ->join ('administrador', 'usuario.id_usuario', '=', 'administrador.id_usuario')
            ->select('administrador.cedula','administrador.nombre', 'administrador.apellido')
            ->where('id_administrador', 'like', $id_administrador)
            ->get();


            DB::table('usuario')
            ->join ('administrador', 'usuario.id_usuario', '=', 'administrador.id_usuario')
            ->where('id_administrador', 'like', $id_administrador)->delete();
            return response()->json(['Administrador eliminado' => $usuario_eliminado]); }
        
    

            ///////Estudiante//////////
            public function eliminar_estudiante($id_estudiante){
                
                $usuario_eliminado = DB::table('usuario')
                ->join ('estudiante', 'usuario.id_usuario', '=', 'estudiante.id_usuario')
                ->select('estudiante.cedula','estudiante.nombre', 'estudiante.apellido')
                ->where('id_estudiante', 'like', $id_estudiante)
                ->get();

                
                 DB::table('usuario')
                 ->join ('estudiante', 'usuario.id_usuario', '=', 'estudiante.id_usuario')
                 ->where('id_estudiante', 'like', $id_estudiante)->delete();
                 return response()->json(['Estudiante eliminado' => $usuario_eliminado]); }
                 
            ///////Profesor//////////
            public function eliminar_profesor($id_profesor){
                

                $usuario_eliminado =  DB::table('usuario')
                ->join ('profesor', 'usuario.id_usuario', '=', 'profesor.id_usuario')
                ->select('profesor.cedula','profesor.nombre', 'profesor.apellido')
                ->where('id_profesor', 'like', $id_profesor)
                ->get();

                DB::table('usuario')
                ->join ('profesor', 'usuario.id_usuario', '=', 'profesor.id_usuario')
                ->where('id_profesor', 'like', $id_profesor)
                ->delete();

                return response()->json(['Profesor eliminado' => $usuario_eliminado]); }
        

           
            ///////Egresado//////////
            public function eliminar_egresado($id_egresado){
                
                $usuario_eliminado =  DB::table('usuario')
                ->join ('egresado', 'usuario.id_usuario', '=', 'egresado.id_usuario')
                ->select('egresado.cedula','egresado.nombre', 'egresado.apellido')
                ->where('id_egresado', 'like', $id_egresado)->get();
                
                DB::table('usuario')
                ->join ('egresado', 'usuario.id_usuario', '=', 'egresado.id_usuario')
                ->where('id_egresado', 'like', $id_egresado)->delete();

                return response()->json(['Egresado eliminado' => $usuario_eliminado]); }

            ///////Empresario//////////
            public function eliminar_empresario($id_empresario){
                
                $usuario_eliminado =  DB::table('usuario')
                ->join ('empresario', 'usuario.id_usuario', '=', 'empresario.id_usuario')
                ->select('empresario.cedula','empresario.nombre', 'empresario.apellido')
                ->where('id_empresario', 'like', $id_empresario)->get();

                DB::table('usuario')
                ->join ('empresario', 'usuario.id_usuario', '=', 'empresario.id_usuario')
                ->where('id_empresario', 'like', $id_empresario)->delete();

                return response()->json(['Empresario eliminado' => $usuario_eliminado]); }

}





