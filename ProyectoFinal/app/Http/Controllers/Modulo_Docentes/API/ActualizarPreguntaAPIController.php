<?php

namespace App\Http\Controllers\Modulo_Docentes\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\PreguntasDocente;
use App\Model\OpcionesEncuestaDocente;
use Illuminate\Support\Facades\DB;

class ActualizarPreguntaAPIController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //AGREGAR UNA NUEVA OPCION A LA PREGUNTA
        $agregar = new OpcionesEncuestaDocente;
        $agregar->descrip_opcion = $request->descrip_opcion;
        $agregar->id_pregunta = $request->id_pregunta;
        //salvo los datos
        $agregar->save();

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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //CAMBIAR DESCRIPCION DE UNA OPCION DE LA PREGUNTA
        DB::table('opciones')
        ->where('id_opcion',$request->id_opcion)
        ->update(['descrip_opcion'=>$request->descrip_opcion]);

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
        //ELIMINAR UN OPCION DE LA PRGUNTA
       $result = DB::table('opciones')
        ->where('id_opcion',$id)
        ->delete();
        return $result;
    }
}
