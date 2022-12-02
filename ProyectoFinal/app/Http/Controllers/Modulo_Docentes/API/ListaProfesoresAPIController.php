<?php

namespace App\Http\Controllers\Modulo_Docentes\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Traits\MostrartraitsDocente;
use App\Model\ingresar_profesores;

class ListaProfesoresAPIController extends Controller
{
    Use MostrartraitsDocente;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profesor= DB::table('profesor')
        ->join('sede','sede.id_sede', '=', 'profesor.id_sede')
        ->select('profesor.nombre', 'profesor.apellido', 'profesor.cedula', 'profesor.correo', 'profesor.telefono', 'sede.nombre_sede as sedenombre')
        ->get();

        return $profesor;
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Agregar un profesor a la lista

        $ced=$request['cedula'];


        $bro=$this->cedul($ced);



           if(1==$bro){

               $saved = ingresar_profesores::create($request->all());

               $this->idactualizar($ced, $saved);

               return "El profesor se ingreso correctamente";
             } else {

              return "EL PROFESOR COMO USUARIO NO ESTA REGISTRADO";
            }

    }

}
