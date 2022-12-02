<?php

namespace App\Http\Controllers\SER_Controllers;
use App\Http\Controllers\Controller;

use App\SER_Modelos\E_Preguntas;
use App\SER_Modelos\E_Opciones;

use Illuminate\Http\Request;

class C_ControlMantenimientoEncuesta extends Controller
{
    public function preguntasEst(){
        $preguntas = E_Preguntas::where('id_encuesta','2')->get();
        $opciones = E_Opciones::get()->all();

        return view ('SER_Vistas/Mantenimiento/P_SeleccionPregunta',[
            "preguntas" => $preguntas,
            "opciones" => $opciones
        ]);
    }

    public function store(){
        $tipo = request()->tipo_preg;
        $preguntas = request()->validate([
            'descrip_preg' => 'required',
            'tipo_preg' => 'required',
            'id_encuesta' => 'required',
            'id_seccion' => 'required'
        ]);
        $preguntas['cod_preg'] = null;


        if ($tipo == 'A') {
            E_Preguntas::create($preguntas);
        } else if ($tipo == 'CR' || $tipo == 'CC') {
            $respuestasArray = request()->all();
            foreach ($respuestasArray as $key => $value) {
                $respuestasArray = request()->validate([
                    $key => 'required'
                ]);
            }

            E_Preguntas::create($preguntas);
            
            $respuestasArray = request()->except('_token', 'descrip_preg', 'tipo_preg', 'id_encuesta', 'id_seccion');
            foreach ($respuestasArray as $key => $value) {
                $key = 'descrip_opcion';
                $pregunta = E_Preguntas::orderBy('id_pregunta','DESC')->first();
                $array = [$key => $value];
                $array['id_pregunta'] = $pregunta->id_pregunta;
                E_Opciones::create($array);
            }
        }


        return redirect('/menu/est/mantenimiento')->with('status','Pregunta Agregada!');
    }


    public function edit($id){

        $editPregunta = E_Preguntas::where('id_pregunta', $id)->first();
        $editOpciones = E_Opciones::where('id_pregunta', $id)->get();

        return view('SER_Vistas/Mantenimiento/P_ActulizarPregunta', [
            'id' => $id,
            'pregunta' => $editPregunta,
            'opciones' => $editOpciones
        ]);
    }

    public function update($id){
        $tipo = request()->tipo_preg;
        $preguntas = request()->validate([
            'descrip_preg' => 'required',
            'tipo_preg' => 'required',
            'id_encuesta' => 'required',
            'id_seccion' => 'required'
        ]);

        $tipodb = E_Preguntas::where('id_pregunta', $id)->first();
        
        
        if ($tipo == $tipodb->tipo_preg) {
            if ($tipo == 'A')
                E_Preguntas::where('id_pregunta', $id)->update($preguntas);
            else if ($tipo == 'CC' || $tipo == 'CR') {
                $respuestasArray = request()->all();
                foreach ($respuestasArray as $key => $value) {
                    $respuestasArray = request()->validate([
                        $key => 'required'
                    ]);
                }

                E_Preguntas::where('id_pregunta', $id)->update($preguntas);
                $respuestasArray = request()->except('_token','_method', 'descrip_preg', 'tipo_preg','id_encuesta','id_seccion');

                E_Opciones::where('id_pregunta',$id)->delete();
                foreach ($respuestasArray as $key => $value) {
                    $key = 'descrip_opcion';
                    $array = [$key => $value];
                        $pregunta = E_Preguntas::where('id_pregunta',$id)->first();
                        $array = [$key => $value];
                        $array['id_pregunta'] = $pregunta->id_pregunta;
                        E_Opciones::create($array);
                    }
            }
        } else if ($tipo != $tipodb->id_preg) {
        
            if ($tipo == 'A'){
                E_Preguntas::where('id_pregunta',$id)->update($preguntas);
                E_Opciones::where('id_pregunta',$id)->delete();

            } else if ($tipo == 'CC' || $tipo == 'CR'){
                $respuestasArray = request()->all();
                foreach ($respuestasArray as $key => $value) {
                    $respuestasArray = request()->validate([
                        $key => 'required'
                    ]);
                }

                E_Preguntas::where('id_pregunta',$id)->update($preguntas);

                $respuestasArray = request()->except('_token','_method', 'descrip_preg', 'tipo_preg','id_encuesta','id_seccion');
                
                E_Opciones::where('id_pregunta',$id)->delete();
                foreach ($respuestasArray as $key => $value) {
                    $key = 'descrip_opcion';
                    $pregunta = E_Preguntas::where('id_pregunta',$id)->first();
                    $array = [$key => $value];
                    $array['id_pregunta'] = $pregunta->id_pregunta;
                    E_Opciones::create($array);
                }
            }
        }


        return redirect('/menu/est/mantenimiento')->with('status','Actualizado Correctamente!');
    }

    public function delete($id){
        
        $id_pregunta = E_Preguntas::find($id);
        $id_pregunta->delete();
        return redirect('/menu/est/mantenimiento')->with('status','Borrando Exitosamente');
    }

    public function agregar(){
        return view ('SER_Vistas/Mantenimiento/P_AgregarPregunta');
    }
}
