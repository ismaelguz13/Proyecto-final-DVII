<?php

namespace App\Http\Controllers\SER_Controllers;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Http\Requests\EnviarEncuestaRequest;

use App\SER_Modelos\E_Usuario;
use App\SER_Modelos\E_Preguntas;
use App\SER_Modelos\E_Opciones;
use App\SER_Modelos\E_Asignatura;
use App\SER_Modelos\E_Grupo;
use App\SER_Modelos\E_Respuesta;

use Illuminate\Support\Facades\DB;

class C_ControlResponderEncuesta extends Controller
{
    public function Index(){
      return view('login.estudiante');  
    }

    public function store(EnviarEncuestaRequest $request){

      $idencuestado = E_Respuesta::select('id_usuario')->where('id_usuario', session('id_usuario'))->first();

      if($idencuestado != null){
        return redirect('/estudiante')->with('error','Usted ya respondió la encuesta correctamente');
      }

      $respuestas = request()->except('_token');
        foreach($respuestas as $key => $value){
          $keypre = substr($key, 0, 2);

          switch($keypre){
            case 48:
              if($value==221){
                $semestre = 'I Semestre';
              }
              elseif($value==222){
                $semestre = 'II Semestre';
              }
              else{
                $semestre = 'Verano';
              }
            break;

            case 49:
              $asignaturaE = E_Opciones::select('descrip_opcion')->where('id_opcion', $value)->first();
              $asignatura = E_Asignatura::select('id_asignatura')->where('nombre', $asignaturaE->descrip_opcion)->first();
              $idasignatura = $asignatura->id_asignatura;
            break;

            case 50:
              $grupo = E_Grupo::select('id_grupo')->where('cod_grupo', $value)->first();
              if($grupo != null){
                $idgrupo = $grupo->id_grupo;
              }
              else{
                $idgrupo = $grupo;
              }
            break;

            default:
            break;
          }
          
        }

        foreach ($respuestas as $key => $value){
          $keypre = substr($key, 0, 2);
            $pregunta = E_Preguntas::where('id_pregunta', $keypre)->first();
            if($pregunta->tipo_preg === 'A'){

              $opcion = E_Opciones::select('id_opcion')->where('id_pregunta', $keypre)->first();

                $insertar = [
                    'id_usuario' => session('id_usuario'),
                    'id_encuesta' => $pregunta->id_encuesta,
                    'id_seccion' => $pregunta->id_seccion,
                    'id_pregunta' => $pregunta->id_pregunta,
                    'id_opcion' => $opcion->id_opcion,
                    'descrip_respuesta' => $value,
                    'id_asignatura'=> $idasignatura,
                    'id_grupo' => $idgrupo,
                    'semestre' => $semestre
                ];
               
                E_Respuesta::create($insertar);
            } else if ($pregunta->tipo_preg === 'CR' && $pregunta->id_pregunta != '67' && $pregunta->id_pregunta != '69'){

                $insertar = [
                    'id_usuario' => session('id_usuario'),
                    'id_encuesta' => $pregunta->id_encuesta,
                    'id_seccion' => $pregunta->id_seccion,
                    'id_pregunta' => $pregunta->id_pregunta,
                    'id_opcion' => $value,
                    'descrip_respuesta' => null,
                    'id_asignatura'=> $idasignatura,
                    'id_grupo' => $idgrupo,
                    'semestre' => $semestre
                ];
                
                E_Respuesta::create($insertar);
            } else if ($pregunta->tipo_preg === 'CC'){
                $respuesta = E_Opciones::where('id_opcion',$value)->first();
                $insertar = [
                    'id_usuario' => session('id_usuario'),
                    'id_encuesta' => $pregunta->id_encuesta,
                    'id_seccion' => $pregunta->id_seccion,
                    'id_pregunta' => $respuesta->id_pregunta,
                    'id_opcion' => $value,
                    'descrip_respuesta' => null,
                    'id_asignatura'=> $idasignatura,
                    'id_grupo' => $idgrupo,
                    'semestre' => $semestre
                ];
                E_Respuesta::create($insertar);
            }
            else{
              $valueOp = substr($value, 0, 3);
              $calificaion = substr($value, -1);
              $insertar = [
                  'id_usuario' => session('id_usuario'),
                  'id_encuesta' => $pregunta->id_encuesta,
                  'id_seccion' => $pregunta->id_seccion,
                  'id_pregunta' => $pregunta->id_pregunta,
                  'id_opcion' => $valueOp,
                  'descrip_respuesta' => $calificaion,
                  'id_asignatura'=> $idasignatura,
                    'id_grupo' => $idgrupo,
                  'semestre' => $semestre

              ];
              E_Respuesta::create($insertar);
            }
        }

        return redirect('/estudiante')->with('success','Encuesta completada!');
}
}