<?php

namespace App\Http\Controllers\SER_Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class C_ControlMenuReportes extends Controller
{
    public function index(){
        return view('/admin/menureportes');
    }
}
