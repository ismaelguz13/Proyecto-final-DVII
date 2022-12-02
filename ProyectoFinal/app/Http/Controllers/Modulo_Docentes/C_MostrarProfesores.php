<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers\Modulo_Docentes;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Collection;
use App\http\Requests\R_AgregarProfesor;

use App\Traits\MostrartraitsDocente;
class C_MostrarProfesores extends Controller
{
    use MostrartraitsDocente;
    public function MostrarProfesores(){
        $profesor= \DB::table('profesor')
        ->join('sede','sede.id_sede', '=', 'profesor.id_sede')
        ->select('profesor.id_profesor','profesor.nombre', 'profesor.apellido', 'profesor.cedula', 'profesor.correo', 'profesor.telefono', 'sede.nombre_sede as sedenombre')
        ->paginate(5);
        return view('Modulo_Docentes\mostrarprofesores')->with('profesor',$profesor);
    }

}
