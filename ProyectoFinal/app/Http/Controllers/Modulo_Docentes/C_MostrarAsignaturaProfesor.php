<?php
namespace App\Http\Controllers;
namespace App\Http\Controllers\Modulo_Docentes;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\http\Requests\InsertarAsignaturaProfesores;
use App\http\Requests\R_MostrarAsignaturaProfesor;
use App\Traits\Mostrartraits;
use App\Model\IngresarAsignaturaProf;
use App\Model\M_MostrarAsignaturaProfesor;
use Illuminate\Support\Facades\DB;
use App\Model\Grupos;
use App\Model\Asignaturas;
use App\Model\Profesores;

class C_MostrarAsignaturaProfesor extends Controller
{
    public function Index(){
        return view('Modulo_Docentes\MostrarAsignaturaProfesor');
    }


    public function Store(R_MostrarAsignaturaProfesor $request){

        $id_profesor=$request['id_profesor'];
        //dd($id_profesor);
            $mostrargrupos_asignatura_profesores= \DB::table('profesor_asignatura_grupo')
        ->join('grupo','grupo.id_grupo', '=', 'profesor_asignatura_grupo.id_grupo')
        ->join('asignatura','asignatura.id_asignatura', '=', 'profesor_asignatura_grupo.id_asignatura')
        ->where('id_profesor',$id_profesor)
        ->select('grupo.cod_grupo as grupos','asignatura.nombre AS asignaturas','profesor_asignatura_grupo.semestre', 'profesor_asignatura_grupo.año')
        ->paginate(100);

        return view('Modulo_Docentes\MostrarAsignaturaProfesor')->with('mostrargrupos_asignatura_profesor',$mostrargrupos_asignatura_profesores);

    }
}
