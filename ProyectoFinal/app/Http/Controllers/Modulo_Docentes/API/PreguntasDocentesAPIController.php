<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers\Modulo_Docentes\API;

use App\Model\PreguntasDocente;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Model\OpcionesEncuestaDocente;
use App\Model\RespuestasDocente;

class PreguntasDocentesAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Mostrar todas las preguntas

        $preguntas = PreguntasDocente::all();

        $preguntas = DB::table('pregunta')
        ->select('pregunta.id_pregunta','descrip_preg','tipo_preg','descrip_opcion')
        ->Leftjoin('opciones','pregunta.id_pregunta','opciones.id_pregunta')
        ->where('id_encuesta','=',1)
        ->get();

        return $preguntas;

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
        //Añadir una nueva pregunta
        $pregunta = new PreguntasDocente;
        $pregunta->descrip_preg = $request->descrip_preg;
        $pregunta->tipo_preg = $request->tipo_preg;
        $pregunta->id_encuesta = $request->id_encuesta;
        $pregunta->id_seccion = $request->id_seccion;

        //Guardo en la BD
        $pregunta->save();

        //Consigo el ID de la pregunta insertada en la BD
        $id_pregunta = $pregunta->id_pregunta;

        $opcionesArray = $request->except('descrip_preg','tipo_preg','id_encuesta','id_seccion');

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
        //Mostrar una pregunta con sus respuestas (si esque tiene respuestas)

        $pregunta = DB::table('pregunta')
        ->select('pregunta.id_pregunta','descrip_preg','tipo_preg','descrip_opcion','id_opcion')
        ->Leftjoin('opciones','pregunta.id_pregunta','opciones.id_pregunta')
        ->where('id_encuesta','=',1)
        ->where('opciones.id_pregunta','=',$id)
        ->get();

        return $pregunta;

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
    public function update(Request $request)
    {
        //ACTUALIZAR LA DESCRIPCION DE UNA PREGUNTA
        DB::table('pregunta')
        ->where('id_pregunta',$request->id_preg)
        ->update(['descrip_preg'=>$request->descrip_preg]);

        return $request;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Eliminar una pregunta

        $pregunta = PreguntasDocente::findOrFail($id);
        //Eliminar una pregunta
        RespuestasDocente::where("id_pregunta",$id)
        ->delete();
        OpcionesEncuestaDocente::where("id_pregunta",$id)
        ->delete();
        PreguntasDocente::where("id_pregunta",$id)
        ->delete();

        return $pregunta;


    }
}
