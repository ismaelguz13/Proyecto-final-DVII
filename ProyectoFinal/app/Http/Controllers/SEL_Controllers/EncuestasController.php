<?php

namespace App\Http\Controllers\SEL_Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\SEL_Modelos\E_Preguntas;
use App\SEL_Modelos\E_Respuesta;
use App\SEL_Modelos\E_Opciones;
//ID DEL USUARIO PARA LA ENCUESTA

class EncuestasController extends Controller
{
    public function encuestas($encuesta)
    {

        //Aqui se mostraran las encuestas dependiendo de la validacion de index
        if ($encuesta == 'P_EgresadoA') {
            $opciones = E_Opciones::get();
            $preguntas = E_Preguntas::where("id_encuesta", '3')->orderBy('id_seccion', 'asc')->get();

            return view('SEL_Vistas.Encuestas.P_EgresadoA', [
                'preguntas' => $preguntas,
                'opciones' => $opciones
            ]);
        }


        if ($encuesta == 'P_EncuestaEmpresario') {
            $opciones = collect([]);
            $preguntas = E_Preguntas::where("id_encuesta", '4')->orderBy('id_seccion', 'asc')->get();
            foreach ($preguntas as $pregunta) {
                $opcion = E_Opciones::where('id_pregunta', $pregunta->id_pregunta)->get();
                foreach ($opcion as $opc) {
                    $opciones->push($opc);
                }
            }
            //secciones
            $seccionA = E_Preguntas::where([["id_encuesta", '4'], ['id_seccion', '9']])->orderBy('id_seccion', 'asc')->first();
            $seccionB = E_Preguntas::where([["id_encuesta", '4'], ['id_seccion', '10']])->orderBy('id_seccion', 'asc')->first();
            $seccionC = E_Preguntas::where([["id_encuesta", '4'], ['id_seccion', '11']])->orderBy('id_seccion', 'asc')->first();

            return view('SEL_Vistas/Encuestas/' . $encuesta, [
                'preguntas' => $preguntas,
                'opciones' => $opciones,
                'seccionA' => $seccionA,
                'seccionB' => $seccionB,
                'seccionC' => $seccionC
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
        return redirect('pantalla_login');

    }
}
