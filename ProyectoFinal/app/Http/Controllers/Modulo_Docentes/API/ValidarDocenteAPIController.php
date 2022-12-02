<?php

namespace App\Http\Controllers\Modulo_Docentes\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\PreguntasDocente;
use App\Model\UsuariosDocente;
use Illuminate\Support\Facades\DB;
use App\Model\RespuestasDocente;

class ValidarDocenteAPIController extends Controller
{


//validaciones antes de que el docente pueda emepzar a realizar la

public function validar(Request $request){

    $respuestas = RespuestasDocente::all();
    $idUsuario = UsuariosDocente::all();

    /*Consulto la tabla USUARIO
    y rescato el ID en base a la CEDULA insertada.
    Utilizo el REQUEST para saber la CEDULA insertada-
    */
    $idUsuario = DB::table('usuario')
    ->select('id_usuario')
    ->where('cedula','=',$request->cedula)
    ->get();

    /*Ahora verifico:
    SI la consulta es distinto de NULL
    OSEA que si RETORNA ALGO entonces:
        - Significa que la cedula existe en la BD

    SI NO retorna NADA entonces:
        - La cedula no esta en la BD.
    */
    if($idUsuario->first()!==null){
        /*Si la cedula se encuentra entonces:
        Creo una variable para manejar mejor el ID de usuario del DOCENTE
        */
        $id_usuario = "";
        foreach ($idUsuario as $id){
            //Asigno EL ID
            $id_usuario = $id->id_usuario;
        }

        $idProfesor = DB::table('profesor')
        ->select('id_profesor')
        ->where('id_usuario','=',$id_usuario)
        ->get();

        $id_profesor = "";
        foreach ($idProfesor as $id){
            //Asigno EL ID
            $id_profesor = $id->id_profesor;
        }

        $resultado = DB::select('SELECT*FROM profesor_asignatura_grupo
        WHERE id_profesor=?
        AND id_grupo=?
        AND id_asignatura=?',
        [$id_profesor,$request->grupos,$request->asignaturas]);

        //VALIDACION DE QUE RESPONDA A SU ASIGNATURAS Y GRUPOS
        if(empty($resultado)){

            $asignaturasGrupos = DB::select('SELECT nombre,cod_grupo FROM profesor_asignatura_grupo
            JOIN asignatura ON profesor_asignatura_grupo.id_asignatura = asignatura.id_asignatura
            JOIN grupo ON profesor_asignatura_grupo.id_grupo = grupo.id_grupo
            WHERE id_profesor=?',
            [$id_profesor,$request->grupos,$request->asignaturas]);

            return "Debe escoger el Grupo y Asignatura que tenga asignado";
        }
        else{

        /*Luego procedo a consultar la tabla RESPUESTA
            En esta consulta intento ver si el docente
            ya habia contestado a la encuesta
            en base a LA ASIGNATURA, EL GRUPO y el año.
        */

        $result = DB::select('SELECT*FROM respuesta
        WHERE EXTRACT(YEAR FROM año)=?
        AND id_usuario=?
        AND id_asignatura=?
        AND id_grupo=?',
        [date('Y'),$id_usuario,$request->asignaturas,$request->grupos]);

        /*AHORA, si contesto alguna pregunta SIGNIFICA QUE:
            Ya hizo la encuesta anteriormente*/
        if(empty($result)){
            /*Si la consulta es NULL, osea si no devuelve NADA
            Significa que NO hizo la encuesta para el GRUPO Y ASIGNATURA seleccionados*/
            $preguntas = PreguntasDocente::all();

            /*Consulto la tabla pregunta*/
            $preguntas = DB::table('pregunta')
            ->select('pregunta.id_pregunta','descrip_preg','tipo_preg','descrip_opcion','id_opcion','id_seccion')
            ->Leftjoin('opciones','pregunta.id_pregunta','opciones.id_pregunta')
            ->where('id_encuesta','=',1)
            ->get();

            $id_asignatura = $request->asignaturas;
            $id_grupo = $request->grupos;
            $semestre = $request->semestres;

            /*RETORNO LA VISTA, juntado con el Json con todas las preguntas de id_encuesta = 1
            Osea las encuesta a DOCENTES*/
            //
            return "Puede continuar con la encuesta";

        }
        /*Si ya hizo la encuesta, entonces mando un mensaje de error de vuelta*/
        return "Ya contesto la encuesta para ese Grupo y Asignatura";

    }

    }


    /*Si la cedula insertada no se encuentra en la BD,
    mando un mensaje de error de vuelta*/
    return "No se encontro la cedula";

}



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
        //
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
