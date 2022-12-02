<?php
namespace App\Http\Controllers\SEL_Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DB;


class ModificarUsuarioController extends Controller{

////////////////////////////////////////////MODIFICAR USUARIO/////////////////////////////////////

         ///////Administrador//////////

         /*Recibimos de la pantalla Listar_Administrador el id del admi seleccionado
           Realizamos un select en la BD para obtener todos los datos de la tabla y mostrarlo*/
         public function modificar_administrador($id_administrador) {
            $usuario_admi = DB::select('select * from administrador where id_administrador = ?', [$id_administrador]);
            return view ('SEL_Vistas/Administrador/Modificar_Usuario/P_ModificarAdministrador',compact('usuario_admi'));
        }

        /*Al momento de seleccionar el botón de modificar se envia a este método, el cual recibe
        los datos introducidos o modificados y el identificador de ese usuario. */
        public function put_administrador(Request $request, $id_administrador) {

             //Validar los campos del formulario Administrador
            $request->validate([
                'nombre' => 'required',
                'apellido'=>'required',
                'correo' =>'required',
                'telefono'=>'required']);

            //Le asignamos variables a los diversos datos introducidos
            $nombre_admi  = $request->input('nombre');
            $apellido_admi = $request->input('apellido');
            $correo_admi = $request->input('correo');
            $telefono_admi = $request->input('telefono');

            //Realizamos la modificacion en la BD
            DB::update('update administrador set  nombre = ?, apellido = ?,  correo = ?, telefono = ? where id_administrador = ?',
            [$nombre_admi, $apellido_admi, $correo_admi, $telefono_admi,$id_administrador]);
            
            return redirect()->route('nav_msg_update'); }
           
        ///////Profesor//////////
            public function modificar_profesor($id_profesor) {
                $usuario_prof  = DB::select('select * from profesor where id_profesor = ?', [$id_profesor]);
                
                return view ('SEL_Vistas/Administrador/Modificar_Usuario/P_ModificarProfesor',compact('usuario_prof'));
            }

            
            public function put_profesor(Request $request, $id_profesor) {
             
             $request->validate([
                'nombre' => 'required',
                'apellido'=>'required',
                'correo' =>'required',
                'telefono'=>'required',
                'sede'=>'required' ]);
         
                $nombre_prof  = $request->input('nombre');
                $apellido_prof = $request->input('apellido');
                $correo_prof = $request->input('correo');
                $telefono_prof = $request->input('telefono');
                $sede_prof  = $request->input('sede');
                
                DB::update('update profesor set  nombre = ?, apellido = ?,  correo = ?, telefono = ?, id_sede = ? where id_profesor = ?',
                [ $nombre_prof, $apellido_prof, $correo_prof, $telefono_prof,$sede_prof ,$id_profesor]);
                
                return redirect()->route('nav_msg_update'); }

        ///////Estudiante//////////
            
            public function modificar_estudiante($id_estudiante) {
                $usuario_estu  = DB::select('select * from estudiante where id_estudiante = ?', [$id_estudiante]);
               
                return view ('SEL_Vistas/Administrador/Modificar_Usuario/P_ModificarEstudiante',compact('usuario_estu'));
            }

            public function put_estudiante(Request $request, $id_estudiante) {

                $request->validate([
                    'nombre' => 'required',
                    'apellido'=>'required',
                    'correo' =>'required',
                    'telefono'=>'required',
                    'año_carrera' =>'required',
                    'carrera'=>'required',
                    'sede'=>'required' ]);

            
                $nombre_estu  = $request->input('nombre');
                $apellido_estu = $request->input('apellido');
                $correo_estu = $request->input('correo');
                $telefono_estu = $request->input('telefono');
                $año_carrera_estu  = $request->input('año_carrera');
                $sede_estu  = $request->input('sede');
                $carrera_estu  = $request->input('carrera');
                
                DB::update('update estudiante set  nombre = ?, apellido = ?,  correo = ?, telefono = ?, año_carrera = ?,  id_sede = ?, id_carrera = ? where id_estudiante = ?',
                [ $nombre_estu, $apellido_estu, $correo_estu, $telefono_estu, $año_carrera_estu,  $sede_estu , $carrera_estu ,  $id_estudiante]);
               
                return redirect()->route('nav_msg_update'); }


            ///////Egresado//////////
            public function modificar_egresado($id_egresado) {
                $usuario_egre = DB::select('select * from egresado where id_egresado = ?', [$id_egresado]);
                
                return view ('SEL_Vistas/Administrador/Modificar_Usuario/P_ModificarEgresado',compact('usuario_egre'));
            }

            public function put_egresado(Request $request, $id_egresado) {

                $request->validate([
                    'nombre' => 'required',
                    'apellido'=>'required',
                    'correo' =>'required',
                    'telefono'=>'required',
                    'carrera'=>'required',
                    'sede'=>'required' ]);

                    $nombre_egre  = $request->input('nombre');
                    $apellido_egre = $request->input('apellido');
                    $correo_egre = $request->input('correo');
                    $telefono_egre = $request->input('telefono');
                    $sede_estu  = $request->input('sede');
                    $carrera_estu  = $request->input('carrera');
                
                DB::update('update egresado set nombre = ?, apellido = ?,  correo = ?, telefono = ?,  id_sede = ?, id_carrera = ? where id_egresado = ?',
                [ $nombre_egre, $apellido_egre, $correo_egre, $telefono_egre, $sede_egre,$carrera_egre, $id_egresado]);
               
                return redirect()->route('nav_msg_update');  }


            ///////Empresario//////////
            
            public function modificar_empresario($id_empresario) {
                $usuario_empre  = DB::select('select * from empresario where id_empresario = ?', [$id_empresario]);
                
                return view ('SEL_Vistas/Administrador/Modificar_Usuario/P_ModificarEmpresario',compact('usuario_empre'));
            }

            public function put_empresario(Request $request, $id_empresario) {
               
                $request->validate([
                    'nombre' => 'required',
                    'apellido'=>'required',
                    'correo' =>'required',
                    'telefono'=>'required',
                    'ruc'=>'required',
                    'empresa'=>'required',
                    'lugar'=> 'required' ]);

                $nombre_empre  = $request->input('nombre');
                $apellido_empre = $request->input('apellido');
                $correo_empre = $request->input('correo');
                $telefono_empre = $request->input('telefono');
                $ruc_empre  = $request->input('ruc');
                $empresa_empre  = $request->input('empresa');
                $lugar_empre  = $request->input('lugar');
              
                DB::update('update empresario set nombre = ?, apellido = ?,  correo = ?, telefono = ?, ruc=?, nombre_empresa=?, lugar=? where id_empresario = ?',
                [ $nombre_empre, $apellido_empre, $correo_empre, $telefono_empre,$ruc_empre,$empresa_empre,$lugar_empre,$id_empresario]);
               
                return redirect()->route('nav_msg_update'); }

}





