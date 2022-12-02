<?php


namespace App\Http\Controllers\SEL_Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DB;
use App\SEL_Modelos\E_Usuario;
use App\SEL_Modelos\E_Estudiante;
use App\SEL_Modelos\E_Administrador;
use App\SEL_Modelos\E_Empresario;
use App\SEL_Modelos\E_Egresado;
use App\SEL_Modelos\E_Profesor;


class PantallaController extends Controller
{   

 //////////////////////// LOGIN DEL SISTEMA////////////////////////////

 public function pantalla_login(){
    return view('SEL_Vistas/Login/P_Login');
}

    public function recuperar_clave(){
        return view('SEL_Vistas/Login/P_RecuperarContraseña');
    }

 
    //////////////////////////////// MENU ////////////////////////////
    public function menu(){
        return view('SEL_Vistas/Administrador/P_MenuPrincipal');
    }

    public function menu_admi(){
        return view('SEL_Vistas/Administrador/P_MenuAdministrativos');
    }

//////////////////////// AGREGAR USUARIO ////////////////////////////

    public function menu_agregar_usuario(){
        return view('SEL_Vistas/Administrador/Agregar_Usuario/P_MenuAgregar');
    }
    
            public function agregar_administrador(){
                
                return view('SEL_Vistas/Administrador/Agregar_Usuario/P_AgregarAdministrador');
            }
    
            public function agregar_egresado(){
                return view('SEL_Vistas/Administrador/Agregar_Usuario/P_AgregarEgresado');
            }

            public function agregar_estudiante(){
                return view('SEL_Vistas/Administrador/Agregar_Usuario/P_AgregarEstudiante');
            }
    
            public function agregar_profesor(){
                return view('SEL_Vistas/Administrador/Agregar_Usuario/P_AgregarProfesor');
            }
    
            public function agregar_empresario(){
                return view('SEL_Vistas/Administrador/Agregar_Usuario/P_AgregarEmpresario');
            }
    
//////////////////////// ELIMINAR USUARIO ////////////////////////////
    
    public function menu_eliminar_usuario(){
        return view('SEL_Vistas/Administrador/Eliminar_Usuario/P_MenuEliminar');
    }
    
            public function eliminar_administrador(){
                $datos_admi =E_Administrador::all();
                return view('SEL_Vistas/Administrador/Eliminar_Usuario/P_EliminarAdministrador',['administrador'=>$datos_admi]);
            }
    
            public function eliminar_egresado(){
                $datos_egre = E_Egresado::all();
                return view('SEL_Vistas/Administrador/Eliminar_Usuario/P_EliminarEgresado',['egresado'=>$datos_egre]);
            }

            public function eliminar_estudiante(){
                $datos_estu = E_Estudiante::all();
                return view('SEL_Vistas/Administrador/Eliminar_Usuario/P_EliminarEstudiante',['estudiante'=>$datos_estu]);
            }
    
            public function eliminar_profesor(){
                $datos_prof= E_Profesor::all();
                return view('SEL_Vistas/Administrador/Eliminar_Usuario/P_EliminarProfesor',['profesor'=>$datos_prof]);
            }
    
            public function eliminar_empresario(){
                $datos_empre = E_Empresario::all();
                return view('SEL_Vistas/Administrador/Eliminar_Usuario/P_EliminarEmpresario',['empresario'=>$datos_empre]);
            }

//////////////////////// MODIFICAR USUARIO ////////////////////////////
    
    public function menu_modificar_usuario(){
        return view('SEL_Vistas/Administrador/Modificar_Usuario/P_MenuModificar');
    }
         //////////////////////// Listar Datos Para Modificar////////////////////////////
          
         
            public function listar_administrador(){
                $datos_admi = E_Administrador::all();
                return view ('SEL_Vistas/Administrador/Modificar_Usuario/P_ListarAdministrador',['administrador'=>$datos_admi]);
            }
            

            public function listar_profesor(){
                $datos_prof=  E_Profesor::all();
                return view ('SEL_Vistas/Administrador/Modificar_Usuario/P_ListarProfesor',['profesor'=>$datos_prof]);
            }


            public function listar_estudiante(){
                $datos_estu = E_Estudiante::all();
                return view ('SEL_Vistas/Administrador/Modificar_Usuario/P_ListarEstudiante',['estudiante'=>$datos_estu]);
            }

               
            public function listar_egresado(){
                $datos_egre = E_Egresado::all();
                return view ('SEL_Vistas/Administrador/Modificar_Usuario/P_ListarEgresado',['egresado'=>$datos_egre]);
            }

        
            public function listar_empresario(){
                $datos_empre = E_Empresario::all();
                return view ('SEL_Vistas/Administrador/Modificar_Usuario/P_ListarEmpresario',['empresario'=>$datos_empre]);
            }

////////////////////////  MENSAJE DEL SISTEMA ////////////////////////////

public function mensaje(){
    return view('SEL_Vistas/Mensaje_De_Sistema/P_Mensaje');
}

    public function mensaje_agregar(){
        return view('SEL_Vistas/Mensaje_De_Sistema/P_MensajeAgregado');
    }

    public function mensaje_eliminar(){
        return view('SEL_Vistas/Mensaje_De_Sistema/P_MensajeEliminado');
    }

    public function mensaje_modificar(){
        return view('SEL_Vistas/Mensaje_De_Sistema/P_MensajeModificado');
    }

    public function Mensaje_Recuperacion_Clave(){
        return view('SEL_Vistas/Mensaje_De_Sistema/P_MensajeCorreoEnviado');
    }
    public function Mensaje_Intentos (){
        return view('SEL_Vistas/Mensaje_De_Sistema/P_MensajeIntentosFallidos');
    }
    
    ////////////////////////  Pantallas de Administrador Empresario ////////////////////////////

    public function menuEmp(){
        return view ('SEL_Vistas/Administrador/Modulo_Empresario/P_MenuEmpresario');
    }

    public function agregar(){
        return view ('SEL_Vistas/Administrador/Modulo_Empresario/Mantenimiento/P_AgregarPreguntas');
    }

    public function mant(){
        return view('SEL_Vistas/Administrador/Modulo_Empresario/P_Mantenimiento');
    }



}


