<?php


namespace App\Http\Controllers;
namespace App\Http\Controllers\Modulo_Docentes;

use App\Http\Controllers\Controller;

use App\Model\AsignaturasDocente;

use App\Model\CarrerasDocente;
use App\Model\GruposDocente;
use App\Model\SedesDocente;
use App\Model\Usuarios;
use App\Model\Respuestas;
use Illuminate\Http\Request;
use App\Http\Requests\EncuestaDocenteRequest;
use Illuminate\Support\Facades\DB;

class C_EncuestaDocentes extends Controller
{
    public function index(){

        $sedes = SedesDocente::all();
        $grupos = GruposDocente::all();
        $carreras = CarrerasDocente::all();
        $asignaturas = AsignaturasDocente::all();
/*
        $data = array(
            'sede' => Sedes::all(),
            'grupo' => Grupos::all(),
            'carrera' => Carreras::all(),
            'asignatura' => Asignaturas::all()
        );
*/
        return view('Modulo_Docentes\EncuestaDocentes')
        ->with(compact('sedes','grupos','carreras','asignaturas'));

        // return view('EncuestaDocentes')
        // ->with(compact('data'));
    }

}
