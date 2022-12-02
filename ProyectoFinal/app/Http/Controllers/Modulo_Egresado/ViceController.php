<?php

namespace App\Http\Controllers\Modulo_Egresado;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ViceController extends Controller
{
    public function inicio(){
        $texto ='Vicedecana de Investigación, Postgrado y Extensión';
        return view ('/Modulo_3_Egresados/P_MenuVicedecana',[
        'texto' => $texto
        ]);
    }

    public function menu(){
        $texto ='Vicedecana de Investigación, Postgrado y Extensión';
        return view ('/Modulo_3_Egresados/P_Mantenimiento',[
        'texto' => $texto
        ]);
    }

    public function menuRP(){
        $texto ='Vicedeca de Investigación, Postgrado y Extensión';
        return view ('/Modulo_3_Egresados/P_MenuReportes',[
        'texto' => $texto
        ]);
    }
}
