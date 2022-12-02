<?php

namespace App\Http\Controllers\Modulo_Docentes\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DocentesRespondidoAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profesor= DB::table('profesor')
        ->join('usuario', 'usuario.id_usuario','=', 'profesor.id_usuario')
        ->join('respuesta','respuesta.id_usuario','=','usuario.id_usuario')
        ->join('asignatura','asignatura.id_asignatura','=','respuesta.id_asignatura')
        ->select('profesor.id_profesor','profesor.cedula','respuesta.id_grupo','asignatura.nombre','respuesta.semestre','respuesta.año')
        ->distinct()
        ->get();

        return $profesor;

    }

}
