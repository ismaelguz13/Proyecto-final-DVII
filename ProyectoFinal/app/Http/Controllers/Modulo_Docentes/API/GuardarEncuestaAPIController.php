<?php

namespace App\Http\Controllers\Modulo_Docentes\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\RespuestasDocente;


class GuardarEncuestaAPIController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Request tiene una coleccion de "arreglos", cada uno de estos representa una respuesta
        //El problema se haya con las respuesta de seleccion multiple, ya que estas se almacenan en un
        //mismo "arreglo", pero en la base de datos cada opcion representa una respuesta distinta.

        /*Recibo mediante el REQUEST la cantidad de preguntas que se generaron en el formulario
        esto me indicara cuantas veces debo iterar*/

        for($i = 1 ; $i<$request->cantidad+1;$i++){
            /*"Objeto" not sure como llamarlo de tipo Respuestas
            Esto se hace para manejar mejor que insertar y que no.
            */

            $respuestas = new RespuestasDocente();
            /*Ahora con el indice del bucle for, voy iterando en cada "arreglo" de la coleccion
            Los nombres de los "arreglos" esan definidos simplemente por numeros
            1:[respuesta]
            2:[respuesta]
            3:[respuesta]
            */
            $data = $request->$i;


            if($data["tipo_resp"]=="abierta"){

                $respuestas->id_usuario = $data["id_usuario"];
                $respuestas->id_encuesta = $data["id_encuesta"];
                $respuestas->id_seccion = $data["id_seccion"];
                $respuestas->id_pregunta = $data["id_pregunta"];
                $respuestas->id_opcion = $data["id_opcion0"];
                $respuestas->descrip_respuesta = $data["descrip_resp"];
                $respuestas->id_asignatura = $data["id_asignatura"];
                $respuestas->id_grupo = $data["id_grupo"];
                $respuestas->semestre = $data["semestre"];
             $respuestas->save();

            }else{
                /*Al ser respuesta de una pregunta cerrada
                se debe "separar" cada opcion seleccionada
                para que se inserte como un solo registro en la
                BD

                Ahora, primero reviso la cantidad de opciones que se generaron para dicha
                pregunta.
                Cada opcion termina con un numero:
                id_opcion0
                id_opcion1
                etc..
                */
                for($j = 0; $j<$data["cant_opciones"];$j++){

                    if(array_key_exists("id_opcion".$j, $data)){
                    $respuestas = new RespuestasDocente();

                    $respuestas->id_usuario = $data["id_usuario"];
                    $respuestas->id_encuesta = $data["id_encuesta"];
                    $respuestas->id_seccion = $data["id_seccion"];
                    $respuestas->id_pregunta = $data["id_pregunta"];
                    $respuestas->id_asignatura = $data["id_asignatura"];
                    $respuestas->id_grupo = $data["id_grupo"];
                    $respuestas->semestre = $data["semestre"];
                    /*Si en el arreglo se encuentra el campo, entonces procede a insertar en la BD
                    Si el id_opcion[indice], fue seleccionado, entonces este va a estar en el arreglo.
                    */

                        if(array_key_exists("respuesta", $data)){

                            $respuesta = $data["respuesta"];

                            if($respuesta == null){

                                    if($data["id_opcion_escribir"] !== $data["id_opcion".$j]){
                                        $respuestas->descrip_respuesta = null;
                                        $respuestas->id_opcion = $data["id_opcion".$j];
                                        $respuestas->save();
                                    }

                            }
                            else{
                                if($data["id_opcion_escribir"] == $data["id_opcion".$j]){

                                    $respuestas->id_opcion = $data["id_opcion_escribir"];
                                    $respuestas->descrip_respuesta = $data["respuesta"];

                                }else{
                                    $respuestas->id_opcion = $data["id_opcion".$j];
                                }
                                $respuestas->save();
                            }
                        }
                        else{
                            $respuestas->id_opcion = $data["id_opcion".$j];
                            $respuestas->save();
                        }
                    }
                }

            }

        }
        return $request;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
