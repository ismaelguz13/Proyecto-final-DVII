<?php

use Illuminate\Support\Facades\Route;
use App\Mail\EncuestaMail;

//<--------------------------------------------MODULO 3----------------------------------------------------->

//<--------------------------------------ENCUESTA A EGRESADOS  --------------------------------------------->
Route::get('/menueg','Modulo_Egresado\AuthController@index');
Route::get('/P_EgresadoA','Modulo_Egresado\EncuestaController@encuestas');
Route::get('/enviar','Modulo_Egresado\SecreEnviarController@enviar');
Route::post('/enviar-encuesta','Modulo_Egresado\SecreEnviarController@enviado');

//<------------------------------SECRETARIA DE LA VICEDECANA ACADEMICA ------------------------------------->
Route::get('/menusecre','Modulo_Egresado\AdminController@index');
Route::get('/menusecre/encuestaSecre','Modulo_Egresado\SecreEncuestaController@index');
Route::get('/menusecre/enviarSecre','Modulo_Egresado\SecreEncuestaController@index');
Route::get('/menusecre/encuestaSecre/estadoencues','Modulo_Egresado\EstadoEncuestaController@index');

//API <--ESTADO DE ENCUESTA -->
Route::get('allest','Modulo_Egresado\EstadoEncuestaController@GetEstados');
Route::get('pregunt', 'Modulo_Egresado\EncuestaController@Encuestasapi');
Route::post('api-save','Modulo_Egresado\EncuestaController@store_api');
Route::get('allest2','Modulo_Egresado\EstadoEncuestaController@GetEstados2');

//<-----------------------VICEDENA DE INVESTIGACION DE INVESTIGACIONS , POSTGRADO Y EXTERIOR---------------->

//MENU PRINCIPAL
Route::get('/menuvice','Modulo_Egresado\ViceController@inicio');
Route::get('/menuvice/mantenimiento','Modulo_Egresado\ViceController@menu');
Route::get('/menuvice/menureportes','Modulo_Egresado\ViceController@menuRP');
Route::get('/menuvice/menureportes/estadoencues','Modulo_Egresado\EstadoEncuestaController@index2');
//MANTENIMIENTO DE ENCUESTA A EGRESADOS 

Route::get('/AgregarPreguntas', 'Modulo_Egresado\AddpreguntaController@Index');
Route::post('/AgregarPreguntas', 'Modulo_Egresado\AddpreguntaController@Store');
Route::get('/modificarpreg','Modulo_Egresado\ModifpregController@show');
Route::get('allpreg','Modulo_Egresado\ModifpregController@GetPreguntas');
Route::get('delete/{idpreg}','Modulo_Egresado\ModifpregController@delete');
Route::get('/delete','Modulo_Egresado\ModifpregController@showdlt');
Route::get('/editarpreg/{idpreg}','Modulo_Egresado\ModifpregController@Editarpregunt');
Route::patch('/editarpreg/{idpreg}','Modulo_Egresado\ModifpregController@Updatepregunt');
///////////////////////////////////////////MODULO DE INTEGRACION/////////////////////////////

//////////////////////////////////////////  LOGIN DEL SISTEMA  /////////////////////////////////////

Route::get('pantalla_login','SEL_Controllers\PantallaController@pantalla_login')->name ('nav_login');
Route::get('recuperar_clave','SEL_Controllers\PantallaController@recuperar_clave')->name ('nav_back_clave');

Route::get('/', 'SEL_Controllers\LoginController@login')->name ('nav_iniciar_sesion');
Route::post('/','SEL_Controllers\LoginController@validacion');
Route::get('/rol/{id}','SEL_Controllers\LoginController@index');

//////////////////////////////////////////////////// MENU //////////////////////////////////////////////

Route::get('menu','SEL_Controllers\PantallaController@menu')->name ('nav_menu');
Route::get('menu_admi','SEL_Controllers\PantallaController@menu_admi')->name ('nav_menu_admi');


/////////////////////////////////////////// AGREGAR USUARIO //////////////////////////////////////////

Route::get('menu_agregar_usuario','SEL_Controllers\PantallaController@menu_agregar_usuario')->name ('nav_us_agregrar');

Route::get('agregar_administrador','SEL_Controllers\PantallaController@agregar_administrador')->name ('nav_add_admin');
Route::put('add_administrador','SEL_Controllers\AgregarUsuarioController@agregar_administrador')->name ('nav_new_admi');

Route::get('agregar_estudiante','SEL_Controllers\PantallaController@agregar_estudiante')->name ('nav_add_estu');
Route::put('add_estudiante','SEL_Controllers\AgregarUsuarioController@agregar_estudiante')->name ('nav_new_estu');

Route::get('agregar_profesor','SEL_Controllers\PantallaController@agregar_profesor')->name ('nav_add_prof');
Route::put('add_profesor','SEL_Controllers\AgregarUsuarioController@agregar_profesor')->name ('nav_new_prof');

Route::get('agregar_egresado','SEL_Controllers\PantallaController@agregar_egresado')->name ('nav_add_egre');
Route::put('add_egresado','SEL_Controllers\AgregarUsuarioController@agregar_egresado')->name ('nav_new_egre');

Route::get('agregar_empresario','SEL_Controllers\PantallaController@agregar_empresario')->name ('nav_add_empre');
Route::put('add_empresario','SEL_Controllers\AgregarUsuarioController@agregar_empresario')->name ('nav_new_empre');

////////////////////////////////////// MODIFICAR USUARIO (LISTAR USUARIO) ///////////////////////////////////////

Route::get('menu_modificar_usuario','SEL_Controllers\PantallaController@menu_modificar_usuario')->name ('nav_us_modificar');

Route::get('listar_administrador','SEL_Controllers\PantallaController@listar_administrador')->name ('nav_list_up_admi');
Route::get('listar_estudiante','SEL_Controllers\PantallaController@listar_estudiante')->name ('nav_list_up_estu');
Route::get('listar_profesor','SEL_Controllers\PantallaController@listar_profesor')->name ('nav_list_up_prof');
Route::get('listar_egresado','SEL_Controllers\PantallaController@listar_egresado')->name ('nav_list_up_egre');
Route::get('listar_empresario','SEL_Controllers\PantallaController@listar_empresario')->name ('nav_list_up_empre');

//////////////////////////////////////// MODIFICAR USUARIO (UPDATE) ///////////////////////////////////////

        //////////// MODIFICAR ESTUDIANTE ///////
        Route::get('/modificar_estudiante/{id_estudiante?}','SEL_Controllers\ModificarUsuarioController@modificar_estudiante')->name('nav_up_estu');
        Route::put('/put_estu/{id_estudiante?}', 'SEL_Controllers\ModificarUsuarioController@put_estudiante');

        //////////// MODIFICAR ADMINISTRADOR ///////
        Route::get('/modificar_administrador/{id_administrador?}','SEL_Controllers\ModificarUsuarioController@modificar_administrador')->name ('nav_up_admi');
        Route::put('/put_admi/{id_administrador?}', 'SEL_Controllers\ModificarUsuarioController@put_administrador');

        //////////// MODIFICAR EGRESADO ///////
        Route::get('/modificar_egresado/{id_egresado?}','SEL_Controllers\ModificarUsuarioController@modificar_egresado')->name ('nav_up_egre');
        Route::put('/put_egre/{id_egresado?}','SEL_Controllers\ModificarUsuarioController@put_egresado');

        //////////// MODIFICAR PROFESOR ///////
        Route::get('/modificar_profesor/{id_profesor?}','SEL_Controllers\ModificarUsuarioController@modificar_profesor')->name ('nav_up_prof');
        Route::put('/put_prof/{id_profesor?}','SEL_Controllers\ModificarUsuarioController@put_profesor');

          //////////// MODIFICAR EMPRESARIO ///////
        Route::get('/modificar_empresario/{id_empresario?}','SEL_Controllers\ModificarUsuarioController@modificar_empresario')->name ('nav_up_empre');
        Route::put('/put_empre/{id_empresario?}','SEL_Controllers\ModificarUsuarioController@put_empresario');


//////////////////////////////////////////// ELIMINAR USUARIO ///////////////////////////////////////

Route::get('menu_eliminar_usuario','SEL_Controllers\PantallaController@menu_eliminar_usuario')->name ('nav_us_eliminar');

Route::get('eliminar_administrador','SEL_Controllers\PantallaController@eliminar_administrador')->name ('nav_us_del_admin');
Route::get('eliminar_estudiante','SEL_Controllers\PantallaController@eliminar_estudiante')->name ('nav_us_del_estu');
Route::get('eliminar_profesor','SEL_Controllers\PantallaController@eliminar_profesor')->name ('nav_us_del_prof');
Route::get('eliminar_egresado','SEL_Controllers\PantallaController@eliminar_egresado')->name ('nav_us_del_egre');
Route::get('eliminar_empresario','SEL_Controllers\PantallaController@eliminar_empresario')->name ('nav_us_del_empre');

Route::delete('/delete_admi/{id_administrador?}', 'SEL_Controllers\EliminarUsuarioController@eliminar_administrador')->name('nav_del_admi');
Route::delete('/delete_estu/{id_estudiante?}', 'SEL_Controllers\EliminarUsuarioController@eliminar_estudiante')->name('nav_del_estu');
Route::delete('/delete_prof/{id_profesor?}','SEL_Controllers\EliminarUsuarioController@eliminar_profesor')->name('nav_del_prof');
Route::delete('/delete_egre/{id_egresado?}','SEL_Controllers\EliminarUsuarioController@eliminar_egresado')->name('nav_del_egre');
Route::delete('/delete_empre/{id_empresario?}','SEL_Controllers\EliminarUsuarioController@eliminar_empresario')->name('nav_del_empre');


////////////////////////////////////  MENSAJE DEL SISTEMA /////////////////////////////////////////

Route::get('mensaje','SEL_Controllers\PantallaController@mensaje')->name ('nav_msg');
Route::get('mensaje_agregar','SEL_Controllers\PantallaController@mensaje_agregar')->name ('nav_msg_add');
Route::get('mensaje_eliminar','SEL_Controllers\PantallaController@mensaje_eliminar')->name ('nav_msg_del');
Route::get('mensaje_modificar','SEL_Controllers\PantallaController@mensaje_modificar')->name ('nav_msg_update');
Route::get('mensaje_correoenviado','SEL_Controllers\PantallaController@Mensaje_Recuperacion_Clave')->name ('nav_recu_clave');
Route::get('mensaje_bloqueo','SEL_Controllers\PantallaController@Mensaje_Intentos')->name ('nav_intentos');

///////////////////////////////////////////////////////////////////////////////////////////////////

/////////////////////////////////  MODULO GESTION A EMPRESARIOS //////////////////////////////////

Route::get('/menu/emp', 'SEL_Controllers\PantallaController@menuEmp');
Route::get('/menu/emp/mantenimiento', 'Empresarios_Controllers\MantenimientoController@preguntasEmp');
Route::get('/menu/emp/mantenimiento/delete/{id}', 'Empresarios_Controllers\MantenimientoController@delete');
Route::get('/menu/emp/mantenimiento/agregar','SEL_Controllers\PantallaController@agregar');
Route::get('/menu/emp/mantenimiento/{id_pregunta}/edit','Empresarios_Controllers\MantenimientoController@edit');
Route::get('/menu/emp/estadisticas','Empresarios_Controllers\GenerarEstadisticasController@estadisticas');
Route::get('/menu/emp/enviar','Empresarios_Controllers\EnviarEncuestaController@enviar');
Route::get('/menu/emp/unavailable','SEL_Controllers\PantallaController@mant');


Route::post('/menu/emp/enviando','Empresarios_Controllers\EnviarEncuestaController@enviando');
Route::post('/menu/emp/mantenimiento/agregando','Empresarios_Controllers\MantenimientoController@store');
Route::patch('/menu/emp/mantenimiento/{id_pregunta}','Empresarios_Controllers\MantenimientoController@update');


/////////////////////////////////////////////////////////////////////////////////////////////////////////



//////////////////////////////////////////  RESOLVER ENCUESTA  /////////////////////////////////////

///Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/{encuesta}','SEL_Controllers\EncuestasController@encuestas');
Route::post('/enviar','SEL_Controllers\EncuestasController@store');

///////////////////////////////////////////////////////////////////////////////////////////////////




/*-----------------------------------------MODULO DE DOCENTES-------------------------------------------*/
//////////////////////////////Vistas de Admin/////////////////////////////////////////////////
Route::get('menu/ModuloDocente','Modulo_Docentes\C_PMenuInicial@Index')->name('P_MenuInicial');

Route::get('menu/ModuloDocente/Mantenimiento','Modulo_Docentes\C_MenuEncuesta@Index')->name('MenuEncuesta');

//////////////////Profesores que respondieron encuesta/////////////////
Route::get('menu/ModuloDocente/ProfesoresRespondido','Modulo_Docentes\C_ProfesoresRespondido@Index')->name('P_ProfesoresRespondido');
//////////////////Profesores que NO respondieron encuesta/////////////////
Route::get('menu/ModuloDocente/ProfesoresSinResponder','Modulo_Docentes\C_ProfesoresSinResponder@Index')->name('P_ProfesoresSinResponder');

///////////Actualizacion de una pregunta////////
Route::get('menu/ModuloDocente/Mantenimiento/ActualizarPregunta','Modulo_Docentes\C_ActualizarPregunta@Index')->name('ActualizarPreguntaDocente');
Route::get('menu/ModuloDocente/Mantenimiento/EditarPregunta','Modulo_Docentes\C_ActualizarPreguntaEditar@Show')->name('ActualizarPreguntaEditar');
Route::post('menu/ModuloDocente/Mantenimiento/EditarPregunta','Modulo_Docentes\C_ActualizarPreguntaEditar@update');

/////////Adicion de Pregunta/////////
Route::get('menu/ModuloDocente/Mantenimiento/AdicionarPreguntaDocente','Modulo_Docentes\C_Adicionarpregunta@Index')->name('AdicionarPreguntaDocente');
Route::post('menu/ModuloDocente/Mantenimiento/AdicionarPreguntaDocente','Modulo_Docentes\C_Adicionarpregunta@Store');

///////Eliminacion de Pregunta////////
Route::get('menu/ModuloDocente/Mantenimiento/EliminarPreguntaDocente','Modulo_Docentes\C_EliminarPregunta@Index')->name('EliminarPreguntaDocente');
Route::post('menu/ModuloDocente/Mantenimiento/EliminarPreguntaDocente','Modulo_Docentes\C_EliminarPregunta@Delete');

///////Consulta de Preguntas/////////
Route::get('menu/ModuloDocente/Mantenimiento/ConsultarPreguntasDocente','Modulo_Docentes\C_ConsultarPreguntas@Index')->name('ConsultarPreguntasDocente');

//////Menu de Listado de profesores///////////
Route::get('menu/ModuloDocente/Mantenimiento/ListaProfesores','Modulo_Docentes\C_ListaProfesores@Index')->name('ListaProfesores');
///////////Agregar Profesor///////////
Route::get('menu/ModuloDocente/Mantenimiento/ListaProfesores/AgregarProfesor', 'Modulo_Docentes\C_AgregarProfesor@AgregarProfesor')->name('AgregarProfesor');
Route::post('menu/ModuloDocente/Mantenimiento/ListaProfesores/AgregarProfesor', 'Modulo_Docentes\C_AgregarProfesor@Store')->name('AgregarProfesor');
///////////////////Mostrar lista de Profesores///////////
Route::get('menu/ModuloDocente/Mantenimiento/ListaProfesores/MostrarProfesores', 'Modulo_Docentes\C_MostrarProfesores@MostrarProfesores')->name('MostrarProfesores');

//////////////////Vista de Docentes/////////////////////////////////
Route::get('MenuDocentes','Modulo_Docentes\C_MenuDocente@Index')->name('MenuDocentes');
Route::post('profesor/EncuestaGuardado','Modulo_Docentes\C_MenuDocente@Store')->name('EncuestaGuardado');

Route::get('profesor/Encuesta','Modulo_Docentes\C_EncuestaDocentes@Index')->name('profesor');

Route::post('profesor/EncuestaDocenteFormulario','Modulo_Docentes\C_EncuestaDocenteFormulario@Index')->name('EncuestaDocenteFormulario');
Route::get('profesor/EncuestaDocenteFormulario','Modulo_Docentes\C_EncuestaDocenteFormulario@Index')->name('EncuestaDocenteFormulario');

//Insertar grupos asignaturas del profesor//////////
// Route::get('menu/ModuloDocente/Mantenimiento/ListaProfesores/MostrarProfesores/IngresarAsignaturaProfesor', 'Modulo_Docentes\C_IngresarAsignaturaProfesor@IngresarAsignaturaProfesor')->name('IngresarAsignaturaProfesor');

Route::post('menu/ModuloDocente/Mantenimiento/ListaProfesores/MostrarProfesores/IngresarAsignaturaProf', 'Modulo_Docentes\C_IngresarAsignaturaProfesor@Store');

Route::get('menu/ModuloDocente/Mantenimiento/ListaProfesores/MostrarProfesores/IngresarAsignaturaProfesor','Modulo_Docentes\C_IngresarAsignaturaProfesor@Index')->name('IngresarAsignaturaProfesor');

//Mostrar grupos asignaturas del profesor/////
Route::get('menu/ModuloDocente/Mantenimiento/ListaProfesores/MostrarProfesores/MostrarAsignaturaProfesor', 'Modulo_Docentes\C_MostrarAsignaturaProfesor@Store');

/*-----------------------------------------MODULO DE ESTUDIANTES-------------------------------------------*/
Route::get('/menu/est', 'SER_Controllers\EstudianteController@menuEst');
Route::get('/menu/est/mantenimiento', 'SER_Controllers\C_ControlMantenimientoEncuesta@preguntasEst');
Route::get('/menu/est/mantenimiento/{id_pregunta}/edit','SER_Controllers\C_ControlMantenimientoEncuesta@edit');
Route::patch('/menu/est/mantenimiento/{id_pregunta}','SER_Controllers\C_ControlMantenimientoEncuesta@update');
Route::get('/menu/est/mantenimiento/agregar','SER_Controllers\C_ControlMantenimientoEncuesta@agregar');
Route::post('/menu/est/mantenimiento/agregando','SER_Controllers\C_ControlMantenimientoEncuesta@store');
Route::get('/menu/est/mantenimiento/delete/{id}', 'SER_Controllers\C_ControlMantenimientoEncuesta@delete');

Route::post('/respuesta','SER_Controllers\C_ControlResponderEncuesta@store');
Route::get('/menu/est/modificarPlan', 'SER_Controllers\C_ControlModificarPlanEstudio@modificarPlanEst');
Route::post('/menu/est/modificarPlan/filtrar', 'SER_Controllers\C_ControlModificarPlanEstudio@filtrar');
Route::get('/menu/est/modificarPlan/agregarAsignatura', 'SER_Controllers\C_ControlModificarPlanEstudio@agregarAsig');
Route::get('/menu/est/modificarPlan/eliminarAsignatura', 'SER_Controllers\C_ControlModificarPlanEstudio@eliminarAsig');
Route::post('/menu/est/modificarPlan/agregar', 'SER_Controllers\C_ControlModificarPlanEstudio@store');
Route::post('/menu/est/modificarPlan/eliminar', 'SER_Controllers\C_ControlModificarPlanEstudio@delete');

Route::get('/menu/est/salonesEncuestados','SER_Controllers\C_ControlSalonesEncuestados@index')->name('SalonesEncuestados');
Route::get('/menu/est/salonesNoEncuestados','SER_Controllers\C_ControlSalonesNoEncuestados@index')->name('SalonesNoEncuestados');







