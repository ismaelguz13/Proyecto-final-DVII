<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers\Modulo_Docentes;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class C_ListaProfesores extends Controller
{
    public function Index(){
        return view('Modulo_Docentes\ListaProfesores');
    }
}
