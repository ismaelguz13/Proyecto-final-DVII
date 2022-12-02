<?php

namespace App\Http\Controllers\Modulo_Egresado;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Model\Pregunta;
use App\Model\Opcion;
use DB;
class ModifpregController extends Controller
{
    public function show(){
        return view('Modulo_3_Egresados.P_ModificarEliminarPreguntas');
    }
    /* Metodo para comsultar las preguntas editables */
    public function GetPreguntas(){
        $preguntas = Pregunta::WHERE('id_encuesta','=',3)->get();
        $opcion = DB::select('call T_resp');
        $opciones = DB::select('select * from opciones');
        foreach ($preguntas as $keyp => $valuep) {
            foreach ($opcion as $keyo => $valueo) {
                if ($valuep->id_pregunta == $valueo->id_pregunta) {
                    $valuep->details = $valueo->Total;
                }
            }
        }
        $a='';
        foreach ($preguntas as $keyp => $valuep) {
            foreach ($opciones as $keyo => $valueo) {
                if ($valuep->id_pregunta == $valueo->id_pregunta) {
                     $a.=$valueo->descrip_opcion."<br>";
                }
            }
            $valuep->pregunta = $a;
            $a="";
        }

        $forDtt['data']=$preguntas;
        return response()->json($forDtt);
    }

    public function Editarpregunt($idpreg){
        $preguntas = Pregunta::find($idpreg);
        $opciones = Opcion::where('id_pregunta', $idpreg)->get();
        return view('Modulo_3_Egresados/P_EditarPregunta', array('preguntas'=> $preguntas), array('opciones'=> $opciones));
    }
/* Metodo para Actualizar las preguntas*/
    public function Updatepregunt($idpreg){
        $tipo = request()->tipo_preg;
        $preguntas = request()->validate([
            'descrip_preg' => 'required',
            'tipo_preg' => 'required',
            'id_encuesta' => 'required',
            'id_seccion' => 'required'
        ]);

        $tipopregunta = Pregunta::where('id_pregunta', $idpreg)->first();

        if ($tipo == $tipopregunta->tipo_preg) {
            if ($tipo == 'A')
                Pregunta::where('id_pregunta', $idpreg)->update($preguntas);
            else if ($tipo == 'CC' || $tipo == 'CR') {
                $respuestasArray = request()->all();
                foreach ($respuestasArray as $key => $value) {
                    $respuestasArray = request()->validate([
                        $key => 'required'
                    ]);
                }

                Pregunta::where('id_pregunta', $idpreg)->update($preguntas);
                $respuestasArray = request()->except('_token','_method', 'descrip_preg', 'tipo_preg','id_encuesta','id_seccion');

                Opcion::where('id_pregunta',$idpreg)->delete();
                foreach ($respuestasArray as $key => $value) {
                    $key = 'descrip_opcion';
                    $array = [$key => $value];
                        $pregunta = Pregunta::where('id_pregunta',$idpreg)->first();
                        $array = [$key => $value];
                        $array['id_pregunta'] = $pregunta->id_pregunta;
                        Opcion::create($array);
                    }
            }
            
        }else if ($tipo != $tipopregunta->id_preg) {
        
            if ($tipo == 'A'){
                Pregunta::where('id_pregunta',$idpreg)->update($preguntas);
                Opcion::where('id_pregunta',$idpreg)->delete();

            } else if ($tipo == 'CC' || $tipo == 'CR'){
                $respuestasArray = request()->all();
                foreach ($respuestasArray as $key => $value) {
                    $respuestasArray = request()->validate([
                        $key => 'required'
                    ]);
                }

                Pregunta::where('id_pregunta',$idpreg)->update($preguntas);

                $respuestasArray = request()->except('_token','_method', 'descrip_preg', 'tipo_preg','id_encuesta','id_seccion');
                
                Opcion::where('id_pregunta',$id)->delete();
                foreach ($respuestasArray as $key => $value) {
                    $key = 'descrip_opcion';
                    $pregunta = Pregunta::where('id_pregunta',$idpreg)->first();
                    $array = [$key => $value];
                    $array['id_pregunta'] = $pregunta->id_pregunta;
                    Opcion::create($array);
                }
            }
        }


        return redirect('Modulo_3_Egresados/P_EditarPregunta')->with('status','Actualizado Correctamente!');
    }
//Metodo para eliminar
        public function delete($id_pregunta){
            Pregunta::destroy($id_pregunta);
            
            if(Pregunta::find($id_pregunta) == null){
                return response()->json(1);
            }
            return response()->json(0) ;        
        }

        public function showdlt(){
            return view('Modulo_3_Egresados.delete');
        }
    } 