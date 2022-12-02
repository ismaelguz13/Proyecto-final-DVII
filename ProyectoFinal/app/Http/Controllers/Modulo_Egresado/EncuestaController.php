<?php

namespace App\Http\Controllers\Modulo_Egresado;
use App\Http\Controllers\Controller;
use App\Http\Requests\EgresadoRequest;
use Illuminate\Http\Request;
use App\Model\Usuario;
use App\Model\Pregunta;
use App\Model\Respuesta;
use App\Model\Opcion;
//ID DEL USUARIO PARA LA ENCUESTA

class EncuestaController extends Controller
{
    public function encuestas()
    {
        //Aqui se mostraran las encuestas dependiendo de la validacion de index
        $opciones = Opcion::get();
        $preguntas = Pregunta::where("id_encuesta",'3')->orderBy('id_seccion','asc')->get();

       
        

        return view('SEL_Vistas.Encuestas.P_EgresadoA',[
            'preguntas' => $preguntas,
            'opciones' => $opciones
        ]);
    }

    public function store(Request $data){
        $respuestasArray = request()->except('_token');
        foreach ($respuestasArray as $key => $value){

            $pregunta = Pregunta::where('id_pregunta', $key)->first();
            if($pregunta->tipo_preg === 'A'){

                $insertar = [
                    'id_encuesta' => $pregunta->id_encuesta,
                    'id_seccion' => $pregunta->id_seccion,
                    'id_pregunta' => $pregunta->id_pregunta,
                    'descrip_respuesta' => $value,
                    'id_asignatura'=> null,
                    'id_grupo' => null,
                    'semestre' => null
                ];
               
                Respuesta::create($insertar);
            } else if ($pregunta->tipo_preg === 'CR'){

                $insertar = [
                    'id_encuesta' => $pregunta->id_encuesta,
                    'id_seccion' => $pregunta->id_seccion,
                    'id_pregunta' => $pregunta->id_pregunta,
                    'id_opcion' => $value,
                    'descrip_respuesta' => null,
                    'id_asignatura' => null,
                    'id_grupo' => null,
                    'semestre' => null
                ];
                
                Respuesta::create($insertar);
            } else{
                $respuesta = Opcion::where('id_opcion',$value)->first();
                $insertar = [
                    'id_encuesta' => $pregunta->id_encuesta,
                    'id_seccion' => $pregunta->id_seccion,
                    'id_pregunta' => $respuesta->id_pregunta,
                    'id_opcion' => $value,
                    'descrip_respuesta' => null,
                    'id_asignatura' => null,
                    'id_grupo' => null,
                    'semestre' => null
                ];
                Respuesta::create($insertar);
            }
        }

        return redirect('login');
    }

    public function Encuestasapi()
    {
        //Aqui se mostraran las encuestas dependiendo de la validacion de index
        $opciones = Opcion::get();
        $preguntas = Pregunta::where("id_encuesta",'3')->orderBy('id_seccion','asc')->get();

       
        

        return response()->json([
            'preguntas' => $preguntas,
            'opciones' => $opciones
        ]);
    }


    public function store_api(Request $data){
        $respuestasArray = json_decode($data->data);
       // dd($respuestasArray);
        foreach ($respuestasArray as $key => $value){
 
            $pregunta = Pregunta::where('id_pregunta', $key)->first();
            if($pregunta->tipo_preg === 'A'){

                $insertar = [
                    'id_encuesta' => $pregunta->id_encuesta,
                    'id_seccion' => $pregunta->id_seccion,
                    'id_pregunta' => $pregunta->id_pregunta,
                    'descrip_respuesta' => $value,
                    'id_asignatura'=> null,
                    'id_grupo' => null,
                    'semestre' => null
                ];
               
                Respuesta::create($insertar);
            } else if ($pregunta->tipo_preg === 'CR'){

                $insertar = [
                    'id_encuesta' => $pregunta->id_encuesta,
                    'id_seccion' => $pregunta->id_seccion,
                    'id_pregunta' => $pregunta->id_pregunta,
                    'id_opcion' => $value,
                    'descrip_respuesta' => null,
                    'id_asignatura' => null,
                    'id_grupo' => null,
                    'semestre' => null
                ];
                
                Respuesta::create($insertar);
            } else{
                $respuesta = Opcion::where('id_opcion',$value)->first();
                $insertar = [
                    'id_encuesta' => $pregunta->id_encuesta,
                    'id_seccion' => $pregunta->id_seccion,
                    'id_pregunta' => $respuesta->id_pregunta,
                    'id_opcion' => $value,
                    'descrip_respuesta' => null,
                    'id_asignatura' => null,
                    'id_grupo' => null,
                    'semestre' => null
                ];
                Respuesta::create($insertar);
            }
        }
 
        return response()->json(['exito'=>true,'message'=>'Encuesta registrada con exito']);
    }
}