<?php

namespace App\Http\Controllers\SER_Controllers\API;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\SER_Modelos\E_Respuesta;
use App\SER_Modelos\E_Grupo;
use App\SER_Modelos\E_AsignaturaGrupo;
use App\SER_Modelos\E_Asignatura;
use App\SER_Modelos\E_Carrera;
use App\SER_Modelos\E_CarreraAsignatura;

class ReportesSalonesAPIController extends Controller
{
    //Carga los datos de la encuesta de Estudiantes
    public function salonesEncuestados(){

        //$id_salrespondidos = E_Respuesta::select('id_grupo')->where('id_encuesta', '2')->get();

        //Consuta de los salones Encuestados
        $salonesEncuestados = E_Grupo::
                    join('asignatura_grupo','grupo.id_grupo','=','asignatura_grupo.id_grupo')
                    ->join('asignatura','asignatura.id_asignatura','=','asignatura_grupo.id_asignatura')
                    ->join('carrera_asignatura','carrera_asignatura.id_asignatura','=','asignatura.id_asignatura')
                    ->join('carrera','carrera.id_carrera','=','carrera_asignatura.id_carrera')
                    ->join('respuesta','respuesta.id_grupo','=','grupo.id_grupo')
                    ->select('grupo.cod_grupo','asignatura.nombre','carrera.nombre_carrera','carrera_asignatura.año_carrera','grupo.año')
                    ->where('respuesta.id_encuesta','=','2')
                    ->get();

        return ([
            'SalonesEncuestados' => $salonesEncuestados
        ]);
    }

    public function salonesNoEncuestados(){

        //Consuta de los salones No Encuestados
        $salonesNoEncuestados = E_Grupo::
                    join('asignatura_grupo','grupo.id_grupo','=','asignatura_grupo.id_grupo')
                    ->join('asignatura','asignatura.id_asignatura','=','asignatura_grupo.id_asignatura')
                    ->join('carrera_asignatura','carrera_asignatura.id_asignatura','=','asignatura.id_asignatura')
                    ->join('carrera','carrera.id_carrera','=','carrera_asignatura.id_carrera')
                    ->leftjoin('respuesta','respuesta.id_grupo','=','grupo.id_grupo')
                    ->select('grupo.cod_grupo','asignatura.nombre','carrera.nombre_carrera','carrera_asignatura.año_carrera','grupo.año')
                    ->get();

        return ([
            'SalonesNoEncuestados' => $salonesNoEncuestados
        ]);
    }
}
