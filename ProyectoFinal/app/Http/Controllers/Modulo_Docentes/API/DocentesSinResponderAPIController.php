<?php

namespace App\Http\Controllers\Modulo_Docentes\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DocentesSinResponderAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $profesor= DB::table('profesor')
        ->leftJoin('respuesta', 'respuesta.id_usuario','=', 'profesor.id_usuario')
        ->leftJoin('profesor_asignatura_grupo','profesor.id_profesor','=','profesor_asignatura_grupo.id_profesor')
        ->Join('asignatura','asignatura.id_asignatura','=','profesor_asignatura_grupo.id_asignatura')
        ->join('grupo','grupo.id_grupo','=','profesor_asignatura_grupo.id_grupo')
        ->select('profesor.correo','profesor.id_profesor','profesor.cedula','asignatura.nombre','grupo.cod_grupo','profesor_asignatura_grupo.semestre','profesor_asignatura_grupo.año')
        ->whereNull('respuesta.id_grupo')
        ->distinct()
        ->orderBy('profesor.id_profesor', 'asc')
        ->get();

        return $profesor;

    }

}
