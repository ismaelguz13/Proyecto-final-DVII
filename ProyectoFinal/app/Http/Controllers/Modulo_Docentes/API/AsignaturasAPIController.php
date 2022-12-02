<?php

namespace App\Http\Controllers\Modulo_Docentes\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\AsignaturasDocente;

class AsignaturasAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Mostrar todas las preguntas

        $asignaturas = AsignaturasDocente::all();

        return $asignaturas;

    }
}
