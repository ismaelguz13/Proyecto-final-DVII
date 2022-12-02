<?php
namespace App\Http\Controllers;
namespace App\Http\Controllers\Modulo_Docentes;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\http\Requests\InsertarAsignaturaProfesores;
use App\Traits\MostrartraitsDocente;
use App\Model\IngresarAsignaturaProf;
use Illuminate\Support\Facades\DB;
use App\Model\GruposDocente;
use App\Model\AsignaturasDocente;
use App\Model\Profesores;


class C_IngresarAsignaturaProfesor extends Controller
{
    use MostrartraitsDocente;

    public function IngresarAsignaturaProfesor(){
        return view('Modulo_Docentes\IngresarAsignaturaProfesor');
    }

    public function Store(InsertarAsignaturaProfesores $request){

        $id_profesor=$request['id_profesor'];

        $id_grup=$request['id_grupo'];
        $id_asign=$request['id_asignatura'];

        $traer=$this->control($id_profesor, $id_grup, $id_asign);

        if($traer==0){

            $saved = IngresarAsignaturaProf::create($request->all());
            if ($saved){
                //$this->idactualizarprofesorasignatura($id_profesor, $saved);
             return redirect('menu/ModuloDocente/Mantenimiento/ListaProfesores/MostrarProfesores')->with('status', 'El Registro fue exitoso');

            } else{
                  return redirect()->back()->withInput()->withErrors('No se ingresaron las materias');

            }
        } else {
            return redirect()->back()->withInput()->withErrors('La Asignatura y el grupo ya esta registrada con el profesor');
        }
    }


    public function Index(){

        $grupos = GruposDocente::all();

        $asignaturas = AsignaturasDocente::all();

        $data = array(

            'grupo' => GruposDocente::all(),

            'asignatura' => AsignaturasDocente::all()
        );

        return view('Modulo_Docentes\IngresarAsignaturaProfesor')
        ->with(compact('grupos','asignaturas'));
    }
}
