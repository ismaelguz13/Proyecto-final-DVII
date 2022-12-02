<?php

namespace App\Http\Controllers\SER_Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\SER_Modelos\E_CarreraAsignatura;
use App\SER_Modelos\E_Asignatura;

class C_ControlModificarPlanEstudio extends Controller
{
    public function modificarPlanEst(){
        $id_asignaturas=null;
        $asignaturas=null;
        
        return view ('SER_Vistas/modificarPlan', ['asignaturas' => $asignaturas, 'id_asignaturas' => $id_asignaturas]);
    }

    public function filtrar(Request $request){
        $filtro = request()->except('_token');
        foreach($filtro as $key => $value){
            switch($key){
                case 'Carrera':
                    $idcarrera = $value;
                break;

                case 'Año':
                    $año = $value;
                break;

                case 'Semestre':
                    $semestre = $value;
                break;

                /*case 'Grupo':
                    $idgrupo = $value;
                break;*/
            }
        }

        $id_asignaturas = E_CarreraAsignatura::select('id_asignatura', 'semestre')
        ->where(['id_carrera' => $idcarrera, 'año_carrera' => $año, 'semestre' => $semestre])->get();

        $asignaturas = E_Asignatura::get();

        return view ('SER_Vistas/modificarPlan', ['asignaturas' => $asignaturas, 'id_asignaturas' => $id_asignaturas]);
    }

    public function agregarAsig(){
        return view ('SER_Vistas/ModificarPlan/NuevaAsignatura');
    }

    public function eliminarAsig(){
        return view ('SER_Vistas/ModificarPlan/EliminarAsignatura');
    }

    public function store(Request $request){

        $ver = false;

        $asignaturas = E_Asignatura::get()->all();

        $codasig = $request->cod_asig;
        $nombreasig = $request->nombre_asig;

        foreach($asignaturas as $asignatura){
            if ($codasig === $asignatura->cod_asignatura && $nombreasig === $asignatura->nombre) {
                $ver = false;
                return redirect ('/menu/est/modificarPlan/agregarAsignatura')->with('status','Asignatura ya existe!');
            break;
            }
            else{
                $ver = true;
            }
        }

        if($ver === true){
            $insertar = [
                'cod_asignatura' => $codasig,
                'nombre' => $nombreasig
            ];
    
            E_Asignatura::create($insertar);
        }
    
        return redirect ('/menu/est/modificarPlan/agregarAsignatura')->with('status','Asignatura Agregada!');
    }

    public function delete(Request $request){
        $asignaturas = E_Asignatura::get()->all();

        $codasig = $request->cod_asig;
        $nombreasig = $request->nombre_asig;

        foreach($asignaturas as $asignatura){
            if ($codasig === $asignatura->cod_asignatura && $nombreasig === $asignatura->nombre) {
                    E_Asignatura::destroy($asignatura->id_asignatura);
                return redirect ('/menu/est/modificarPlan/eliminarAsignatura')->with('status','Asignatura eliminada!');
                break;
            }
        }

        
    
        return redirect ('/menu/est/modificarPlan/eliminarAsignatura')->with('status','Asignatura no existe!');
    }
}
