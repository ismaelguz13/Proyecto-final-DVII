<?php

namespace App\Http\Controllers\SER_Controllers;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use DB;
use App\SER_Modelos\E_Carrera;
use App\SER_Modelos\E_Grupo;
use App\SER_Modelos\E_Respuesta;


class C_ControlSalonesEncuestados extends Controller
{
    //
    public function index(Request $request)
    {
        //
        $año = $request->get('selectA');
        $carrera = $request->get('selectC');
        $semestre = $request->get('selectSe');

        $años = E_Respuesta::get(DB::raw('YEAR(año) as year'))
                            ->groupBy('year');
                            
        $carreras = E_Carrera::select('id_carrera','nombre_carrera')->get();

        $respuestas = E_Respuesta:: with('asignatura')
                    ->select('respuesta.id_asignatura','respuesta.semestre','grupo.id_grupo',
                    'grupo.cod_grupo','grupo.id_carrera',
                    DB::raw('YEAR(respuesta.año) as year'),
                    DB::raw('COUNT(DISTINCT respuesta.id_usuario) as estudiante'))
                    ->join('grupo','respuesta.id_grupo','grupo.id_grupo')                   
                    ->carrera($carrera)
                    ->año($año)
                    ->semestre($semestre)
                    ->groupBy('grupo.cod_grupo','respuesta.id_asignatura','respuesta.semestre','year')
                    ->having('estudiante','>=',10)
                    ->orderBy('grupo.cod_grupo')
                    ->paginate(25);
        return view('/SER_Vistas/SalonesEncuestados/SalonesEncuestados',compact('respuestas','carreras','años'));
    }
}
