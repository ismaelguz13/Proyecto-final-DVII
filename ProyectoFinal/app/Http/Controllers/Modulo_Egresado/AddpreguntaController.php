<?php

namespace App\Http\Controllers\Modulo_Egresado;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\AddPreguntaRequestDocente;
use App\Model\PreguntasDocente;
use App\Model\OpcionesEncuestaDocente;

class AddpreguntaController extends Controller
{
    public function Index(){
        $texto ='Vicedecana de Investigación, Postgrado y Extensión';
        return view('/Modulo_3_Egresados/P_AgregarPreguntas', [
            'texto' => $texto,
            ]);
}

public function Store(AddPreguntaRequestDocente $request){

    //objeto del Modelo Pregunta
    $pregunta = new PreguntasDocente;

    //Asigno a cada fila del array creado en el modelo
    //Usando el $request consigo lo que se inserto en el formulario
    $pregunta->descrip_preg = $request->descrip_preg;
    $pregunta->tipo_preg = $request->tipo_preg;
    $pregunta->id_encuesta = $request->id_encuesta;
    $pregunta->id_seccion = $request->id_seccion;

    //Guardo en la BD y se lo asigno a la variable $pregunta
    $pregunta->save();

    //Consigo el ID de la pregunta insertada en la BD
    $id_pregunta = $pregunta->id_pregunta;

    //Arreglo con todas las opciones agregadas para la respuesta CERRADA
    $opcionesArray = $request->except('_token','descrip_preg','tipo_preg','id_encuesta','id_seccion');

    //Decalaro un arreglo
    $data = array();

    //Luego le asignas las opciones almacenadas, mediante un recorrido foreach.
    foreach($opcionesArray as $opcion){
        $data []= [
            'descrip_opcion' => $opcion,
            'id_pregunta' => $id_pregunta
        ];
    }
    //Guardando en la Base de datos.
    OpcionesEncuestaDocente::insert($data);

    //Devolviendo un pequeño mensaje

    return redirect()->back()->with('status','Pregunta añadida');

}
}