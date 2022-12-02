<?php

namespace App\Http\Controllers\SEL_Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\SEL_Modelos\E_Preguntas;
use App\SEL_Modelos\E_Respuesta;
use App\SEL_Modelos\E_Opciones;
use DB;
//ID DEL USUARIO PARA LA ENCUESTA

class EncuestasAPIController extends Controller
{
    public function encuestas($encuesta)
    {

        //Aqui se mostraran las encuestas dependiendo de la validacion de index
        if ($encuesta == 'P_EncuestaEmpresario') {
            $preguntas = DB::table('pregunta')
            ->join('opciones','pregunta.id_pregunta', '=','opciones.id_pregunta')
            ->select("opciones.id_pregunta","descrip_preg","tipo_preg",'descrip_opcion')
            ->where("id_encuesta", '4')->orderBy('pregunta.id_seccion', 'asc')->get();

            return ([
                'preguntas' => $preguntas
            ]);
        }
    }

    public function store()
    {

        $respuestasArray = request()->except('_token');
        //PROCESO DE GUARDAR LA INFORMACION DE LA ENCUESTA EMPRESARIO.
        foreach ($respuestasArray as $key => $value) {

            //RECIBE EL ID DE PREGUNTA AL QUE ES IGUAL A LA BASE DE DATOS
            $pregunta = E_Preguntas::where('id_pregunta', $key)->first();

            //SI LA PREGUNTA CONTESTADA ES LIBRE
            if ($pregunta->tipo_preg === 'A') {

                $insertar = [
                    'id_usuario' => session('id_usuario'),
                    'id_encuesta' => $pregunta->id_encuesta,
                    'id_seccion' => $pregunta->id_seccion,
                    'id_pregunta' => $pregunta->id_pregunta,
                    'descrip_respuesta' => $value,
                    'id_asignatura' => null,
                    'id_grupo' => null,
                    'semestre' => null
                ];

                E_Respuesta::create($insertar);
            } else if ($pregunta->tipo_preg === 'CR') {

                //INSERCIÓN DE UNA RESPUESTA A TRAVÉS DE RADIOS
                $insertar = [
                    'id_usuario' => session('id_usuario'),
                    'id_encuesta' => $pregunta->id_encuesta,
                    'id_seccion' => $pregunta->id_seccion,
                    'id_pregunta' => $pregunta->id_pregunta,
                    'id_opcion' => $value,
                    'descrip_respuesta' => null,
                    'id_asignatura' => null,
                    'id_grupo' => null,
                    'semestre' => null
                ];

                E_Respuesta::create($insertar);
            } else {
                //SI HAY MUCHAS RESPUESTAS EN LA PREGUNTA CHECKBOX
                $respuesta = E_Opciones::where('id_opcion', $value)->first();
                $insertar = [
                    'id_usuario' => session('id_usuario'),
                    'id_encuesta' => $pregunta->id_encuesta,
                    'id_seccion' => $pregunta->id_seccion,
                    'id_pregunta' => $respuesta->id_pregunta,
                    'id_opcion' => $value,
                    'descrip_respuesta' => null,
                    'id_asignatura' => null,
                    'id_grupo' => null,
                    'semestre' => null
                ];
                E_Respuesta::create($insertar);
            }
        }

    }
}
