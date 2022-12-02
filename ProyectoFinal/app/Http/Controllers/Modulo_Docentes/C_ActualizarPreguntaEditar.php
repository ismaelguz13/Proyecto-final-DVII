<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers\Modulo_Docentes;

use App\Model\PreguntasDocente;
use App\Model\OpcionesEncuestaDocente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

use App\Http\Requests\ActualizarPreguntaRequestDocente;
use App\Http\Requests\PreguntaRequestDocente;

class C_ActualizarPreguntaEditar extends Controller
{
    public function Show(PreguntaRequestDocente $request){

        //dd($request);

        $id_preg = $request->id_preg;

        $preguntas = PreguntasDocente::all();

        $preguntas = DB::table('pregunta')
        ->select('pregunta.id_pregunta','descrip_preg','tipo_preg','descrip_opcion','id_opcion')
        ->Leftjoin('opciones','pregunta.id_pregunta','opciones.id_pregunta')
        ->where('id_encuesta','=',1)
        ->get();

        return view('Modulo_Docentes\ActualizarPreguntaEditar',compact('preguntas'),compact('id_preg'));
    }

    public function update(ActualizarPreguntaRequestDocente  $request){
        //dd($request);

        //Ingreso en la tabla 'preguntas' la pregunta a editar
        if($request->aux == null){
            DB::table('pregunta')
            ->where('id_pregunta',$request->id_preg)
            ->update(['descrip_preg'=>$request->descrip_preg]);
        }

        //Ingreso en la tabla 'opciones' la opción a editar
        DB::table('opciones')
        ->where('id_opcion',$request->valor)
        ->update(['descrip_opcion'=>$request->editar]);

        //Ingreso en la tabla 'opciones' la opción a eliminar
        DB::table('opciones')
        ->where('id_opcion',$request->eliminar)
        ->delete();

        //Ingresar en la tabla 'opciones' una nueva respuesta
        if($request->agregar != null){
        $agregar = new OpcionesEncuestaDocente;
            $agregar->descrip_opcion = $request->agregar;
            $agregar->id_pregunta = $request->aux;
            //salvo los datos
            $agregar->save();
        }

        $id_preg = $request->id_preg;
        $preguntas = PreguntasDocente::all();

        $preguntas = DB::table('pregunta')
        ->select('pregunta.id_pregunta','descrip_preg','tipo_preg','descrip_opcion','id_opcion')
        ->Leftjoin('opciones','pregunta.id_pregunta','opciones.id_pregunta')
        ->where('id_encuesta','=',1)
        ->get();

        return view('Modulo_Docentes\ActualizarPreguntaEditar',compact('preguntas'),compact('id_preg'))->with('status','La pregunta ha sido actualizada correctamente');
    }
}
