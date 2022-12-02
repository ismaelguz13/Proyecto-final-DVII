<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});




/////////////////////////////////  MODULO GESTION A EMPRESARIOS APIS //////////////////////////////////
//GENERAR QUIENES CONTESTARON Y QUIENES NO
Route::get('/menu/emp/estadisticas','Empresarios_Controllers\API\GenerarEstadisticasAPIController@estadisticas');
///////////////////////////////////////////////////////////////////////////////////////////////////

/////////////////////////////////  ENCUESTAS APIS //////////////////////////////////

//TRAE TODAS LAS PREGUNTAS DEL TIPO EMPRESARIO
Route::get('/{encuesta}','SEL_Controllers\API\EncuestasAPIController@encuestas');

//INSERTA DATA A LA ENCUESTA DE EMPRESARIO
Route::post('/enviar','SEL_Controllers\API\EncuestasAPIController@store');

///////////////////////////////////////////////////////////////////////////////////////////////////

///////////////////////////////MODULOO INTEGRACION////////////////////////////////////
/////Login//

Route::post('/','SEL_Controllers\API\ListarUsuariosAPIController@validacion');

///LISTAR///
Route::get('lista_admi','SEL_Controllers\API\ListarUsuariosAPIController@listar_admi');
Route::get('lista_estu','SEL_Controllers\API\ListarUsuariosAPIController@listar_estudiante');
Route::get('lista_egre','SEL_Controllers\API\ListarUsuariosAPIController@listar_egresado');
Route::get('lista_prof','SEL_Controllers\API\ListarUsuariosAPIController@listar_profesor');
Route::get('lista_empre','SEL_Controllers\API\ListarUsuariosAPIController@listar_empresario');

/////////////////////////////MODULO DOCENTES/////////////////////////
//Listar preguntas a Docentes
Route::get('docentes/preguntasDocentes','Modulo_Docentes\API\PreguntasDocentesAPIController@index');

//Listar UNA pregunta a Docentes
Route::get('docentes/preguntaDocentes/{id}','Modulo_Docentes\API\PreguntasDocentesAPIController@show');

//Añadir nueva pregunta
Route::post('docentes/preguntaDocentes','Modulo_Docentes\API\PreguntasDocentesAPIController@store');

//Editar descripcion de Pregunta
Route::put('docentes/preguntaDocentes','Modulo_Docentes\API\PreguntasDocentesAPIController@update');

//Editar una opcion de pregunta
Route::put('docentes/actualizarPreguntaDocente','Modulo_Docentes\API\ActualizarPreguntaAPIController@update');

//Eliminar una opcion de pregunta
Route::delete('docentes/actualizarPreguntaDocente/{id}','Modulo_Docentes\API\ActualizarPreguntaAPIController@destroy');

//Agregar una opcion a pregunta
Route::post('docentes/actualizarPreguntaDocente','Modulo_Docentes\API\ActualizarPreguntaAPIController@store');

//Eliminar Pregunta
Route::delete('docentes/preguntaDocentes/{id}','Modulo_Docentes\API\PreguntasDocentesAPIController@destroy');

//Listar Docentes
Route::get('docentes/listaDocentes','Modulo_Docentes\API\ListaProfesoresAPIController@index');

//Agregar docentes
Route::post('docentes/listaDocentes','Modulo_Docentes\API\ListaProfesoresAPIController@store');

//Listar docentes que han respondido a encuesta
Route::get('docentes/docentesRespondido','Modulo_Docentes\API\DocentesRespondidoAPIController@index');

//Listar docentes sin responder encuesta
Route::get('docentes/docentesSinResponder','Modulo_Docentes\API\DocentesSinResponderAPIController@index');

//Listar Grupos
Route::get('docentes/gruposLista','Modulo_Docentes\API\GruposAPIController@index');

//Lista Asignaturas
Route::get('docentes/asignaturasLista','Modulo_Docentes\API\AsignaturasAPIController@index');

//Guardar Encuesta
Route::post('docentes/guardarEncuestaDocentes','Modulo_Docentes\API\GuardarEncuestaAPIController@store');

//Validar docente
Route::post('docentes/validarDocente','Modulo_Docentes\API\ValidarDocenteAPIController@validar');


/////////////////////////////MODULO ESTUDIANTES/////////////////////////
//Rutas de la encuesta
Route::get('encuesta/estudiantes','SER_CONTROLLERS\API\EncuestaAPIController@cargarEncuesta');


//Rutas de los reportes de salones
Route::get('salones_encuestados/estudiantes','SER_CONTROLLERS\API\ReportesSalonesAPIController@salonesEncuestados');
Route::get('salones_no_encuestados/estudiantes','SER_CONTROLLERS\API\ReportesSalonesAPIController@salonesNoEncuestados');