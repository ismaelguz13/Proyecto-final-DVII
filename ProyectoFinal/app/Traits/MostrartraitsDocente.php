<?php
namespace App\Traits;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
/**
 *
 */

 trait MostrartraitsDocente {


    public function cedul($atrapar){

        $ce=\DB::table('usuario')->select('cedula')->where('cedula',$atrapar)->value($atrapar);
        if($atrapar==$ce){

            return 1;
        } else {
            return 0;
        }



    }
    public function idactualizar($atrapar, $obtener){
        if($obtener){
            $idusuario=0;
            $idusuario=\DB::table('usuario')->select('id_usuario')->where('cedula',$atrapar)->value('id_usuario');

            \DB::table('profesor')->where('cedula',$atrapar)->update(['id_usuario'=>$idusuario]);
        }
    }

    public function control($viene_id_profesor, $viene_id_grupo, $viene_id_asignatura){

    $id_grupos=\DB::table('profesor_asignatura_grupo')->select('id_grupo')->where('id_profesor',$viene_id_profesor)->where('id_grupo',$viene_id_grupo)->value('id_grupo');
    $id_asignaturas=\DB::table('profesor_asignatura_grupo')->select('id_asignatura')->where('id_profesor',$viene_id_profesor)->where('id_asignatura',$viene_id_asignatura)->value('id_asignatura');


    if($viene_id_grupo==$id_grupos && $viene_id_asignatura==$id_asignaturas){
        return 1;
    } else {
        return 0;
    }
  }

 }
