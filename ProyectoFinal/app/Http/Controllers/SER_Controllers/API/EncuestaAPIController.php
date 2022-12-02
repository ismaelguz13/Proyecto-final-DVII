<?php

namespace App\Http\Controllers\SER_Controllers\API;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use App\SEL_Modelos\E_Usuario;
use App\SEL_Modelos\E_Preguntas;
use App\SEL_Modelos\E_Respuesta;
use App\SEL_Modelos\E_Opciones;

class EncuestaAPIController extends Controller
{
    //Carga los datos de la encuesta de Estudiantes
    public function cargarEncuesta(){
        //Aqui se mostraran las encuestas dependiendo de la validacion de index
        //$encuesta = 'Estudiantes';
        //if ($encuesta == 'Estudiantes') {
            $opciones = collect([]);
            $preguntas = E_Preguntas::where("id_encuesta", '2')->orderBy('id_seccion', 'asc')->get();
            foreach ($preguntas as $pregunta) {
                $opcion = E_Opciones::where('id_pregunta', $pregunta->id_pregunta)->get();
                foreach($opcion as $opc){
                $opciones->push($opc);
                }
            }

            //secciones
            //$seccionA = E_Preguntas::where([["id_encuesta", '2'], ['id_seccion', '3']])->orderBy('id_seccion', 'asc')->first();
            //$seccionB = E_Preguntas::where([["id_encuesta", '2'], ['id_seccion', '4']])->orderBy('id_seccion', 'asc')->first();
            //$seccionC = E_Preguntas::where([["id_encuesta", '2'], ['id_seccion', '5']])->orderBy('id_seccion', 'asc')->first();
            //$seccionD = E_Preguntas::where([["id_encuesta", '2'], ['id_seccion', '6']])->orderBy('id_seccion', 'asc')->first();

            return ([
                'preguntas' => $preguntas,
                'opciones' => $opciones,
            ]);
        //}
    }
}
