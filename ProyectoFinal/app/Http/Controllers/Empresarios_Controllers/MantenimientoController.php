<?php
namespace App\Http\Controllers\Empresarios_Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\SEL_Modelos\E_Preguntas;
use App\SEL_Modelos\E_Opciones;



class MantenimientoController extends Controller{

    // Empresario
    
    public function preguntasEmp(){
        $preguntas = E_Preguntas::where('id_encuesta','4')->get();
        $opciones = collect([]);
        foreach ($preguntas as $pregunta){
            $opcion = E_Opciones::where('id_pregunta',$pregunta->id_pregunta)->get();
            foreach ($opcion as $opc){
            $opciones->push($opc);
            }
        }

        //MOSTRAR TODAS LAS PREGUNTAS DE LA ENCUESTA EMPRESARIO
        return view ('SEL_Vistas/Administrador/Modulo_Empresario/Mantenimiento/P_MostrarPreguntas',[
            "preguntas" => $preguntas,
            "opciones" => $opciones
        ]);
    }
  
    public function delete($id){
        //BORRAR LA PREGUNTA (INCLUYENDO SUS OPCIONES) A TRAVÉS DEL ID
        $id_pregunta = E_Preguntas::find($id);
        $id_pregunta->delete();
        return redirect('/menu/emp/mantenimiento')->with('status','Borrando Exitosamente');
    }

    public function store(){

        //VALIDA DE QUE TODOS LOS CAMPOS ESTEN LLENOS
        $tipo = request()->tipo_preg;
        $preguntas = request()->validate([
            'descrip_preg' => 'required',
            'tipo_preg' => 'required',
            'id_encuesta' => 'required',
            'id_seccion' => 'required'
        ]);
        $preguntas['cod_preg'] = null;


        if ($tipo == 'A') {
            //SI ES ABIERTA, SOLO AGREGA LA PREGUNTA.
            E_Preguntas::create($preguntas);
        } else if ($tipo == 'CR' || $tipo == 'CC') {
            //SI SON RESPUESTAS CON OPCIONES, SE VALIDA LOS CAMPOS QUE DEBE ESTAR LLENOS.
            $respuestasArray = request()->all();
            foreach ($respuestasArray as $key => $value) {
                $respuestasArray = request()->validate([
                    $key => 'required'
                ]);
            }

            //PROCEDE A INSERTAR LA PREGUNTA.
            E_Preguntas::create($preguntas);
         
            $respuestasArray = request()->except('_token', 'descrip_preg', 'tipo_preg', 'id_encuesta', 'id_seccion');

            //PROCEDE A INSERTAR LAS OPCIONES CONECTANDO LA ULTIMA PREGUNTA INSERTADA
            foreach ($respuestasArray as $key => $value) {
                $key = 'descrip_opcion';
                $pregunta = E_Preguntas::orderBy('id_pregunta','DESC')->first();
                $array = [$key => $value];
                $array['id_pregunta'] = $pregunta->id_pregunta;
                E_Opciones::create($array);
            }
        }


        return redirect('/menu/emp/mantenimiento')->with('status','Pregunta Agregada!');
    }

    public function edit($id){

        $editPregunta = E_Preguntas::where('id_pregunta', $id)->first();
        $editOpciones = E_Opciones::where('id_pregunta', $id)->get();

        //MODIFICAR LA PREGUNTA SELECCIONADA CON SUS OPCIONES
        return view('SEL_Vistas/Administrador/Modulo_Empresario/Mantenimiento/P_ActualizarPreguntas', [
            'id' => $id,
            'pregunta' => $editPregunta,
            'opciones' => $editOpciones
        ]);
    }

    public function update($id){
        $tipo = request()->tipo_preg;
        //VALIDA DE QUE TODAS LAS PREGUNTAS ESTEN LLENOS
        $preguntas = request()->validate([
            'descrip_preg' => 'required',
            'tipo_preg' => 'required',
            'id_encuesta' => 'required',
            'id_seccion' => 'required'
        ]);

        $tipodb = E_Preguntas::where('id_pregunta', $id)->first();
   
        //SI EL TIPO DE PREG ES IGUAL A LA BASE DE DATOS
        if ($tipo == $tipodb->tipo_preg) {
            if ($tipo == 'A')
            //SOLO SE MODIFICA LA PREGUNTA.
                E_Preguntas::where('id_pregunta', $id)->update($preguntas);
            else if ($tipo == 'CC' || $tipo == 'CR') {
                $respuestasArray = request()->all();
                foreach ($respuestasArray as $key => $value) {
                    $respuestasArray = request()->validate([
                        $key => 'required'
                    ]);
                }
                //HACE EL MISMO PROCESO QUE INSERCIÓN DE PREGUNTA, SOLO BORRANDO LAS EXISTENTES EN LA BASE DE DATOS
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
            //SI LA PREGUNTA MODIFICADA, EL TIPO DE PREG ERA DIFERENTE A LA BASE DE DATOS
            //SE BORRAN LAS OPCIONES ENCONTRADAS EN LA PREGUNTA ANTERIOR
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


        return redirect('/menu/emp/mantenimiento')->with('status','Actualizado Correctamente!');
    }


}


