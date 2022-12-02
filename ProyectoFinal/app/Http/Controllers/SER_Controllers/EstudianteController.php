<?php

namespace App\Http\Controllers\SER_Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;




class EstudianteController extends Controller
{
    public function menuEst(){
        return view ('SER_Vistas/menuEstudiante');
    }   

}
