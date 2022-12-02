<?php

namespace App\Http\Controllers\Empresarios_Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\SEL_Modelos\E_Respuesta;
use App\SEL_Modelos\E_Empresario;



class GenerarEstadisticasAPIController extends Controller
{
    public function estadisticas()
    {

        $id_respondidos = E_Respuesta::select('id_usuario')->distinct()->where('id_encuesta', 4)->get();
        $empresarios = E_Empresario::select('id_usuario', 'nombre', 'apellido', 'correo')->get();
        $respondidos = collect([]);
        $noRespondidos = collect([$empresarios]);

        //VALIDA LOS QUE CONTESTARON LA ENCUESTA
        foreach ($id_respondidos as $id_respondido) {
            $empresarios = E_Empresario::select('id_usuario', 'nombre', 'apellido', 'correo')->where('id_usuario', $id_respondido->id_usuario)->get();
            $respondidos->push($empresarios[0]);
        }

        //VALIDA LOS QUE NO HAN RESPONDIDO LA ENCUESTA
        foreach ($id_respondidos as $id_respondido) {
            foreach($noRespondidos as $noRespondido){
                if ($id_respondido->id_usuario == $noRespondido[0]->id_usuario){
                    $noRespondido->shift();
                } 
        }}


        //ENVIA LA INFORMACIÓN A LA VISTA
        return ( [
            'respondidos' => $respondidos,
            'noRespondidos' => $noRespondidos[0]
        ]);
    }
}
