<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers\Modulo_Docentes;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class C_ProfesoresRespondido extends Controller
{
    public function Index(){

        $profesor= \DB::table('profesor')
        ->join('usuario', 'usuario.id_usuario','=', 'profesor.id_usuario')
        ->join('respuesta','respuesta.id_usuario','=','usuario.id_usuario')
        ->join('asignatura','asignatura.id_asignatura','=','respuesta.id_asignatura')
        ->join('grupo','grupo.id_grupo','=','respuesta.id_grupo')
        ->selectRaw('cod_grupo,profesor.cedula,profesor.id_profesor,respuesta.id_grupo,asignatura.nombre,respuesta.semestre,year(respuesta.año) AS año')
        ->distinct()
        ->paginate(8);

        return view('Modulo_Docentes\P_ProfesoresRespondido')->with('profesor',$profesor);
    }
}
