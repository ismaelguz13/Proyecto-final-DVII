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
use App\SEL_Modelos\E_Sede;
use App\SEL_Modelos\E_Carrera;
use App\SEL_Modelos\E_Rol;



class AgregarUsuarioController extends Controller{

///////////////////////////////////////////////AGREGAR USUARIO////////////////////////////////////

    ////////////////////////////////ADMINISTRADOR////////////////////////////////////////
    public function agregar_administrador(Request $request){
        //Creamos nuevo objetos   
        $usuario= new E_Usuario();
        $admi = new E_Administrador();

        //Validar los campos del formulario Administrador
        $request->validate([
           'cedula'=>'required',
           'clave'=> 'required',
           'nombre' => 'required',
           'apellido'=>'required',
           'correo' =>'required',
           'telefono'=>'required']);

             //Validamos que no exista la cedula y correo
            $user = E_Usuario::get();
            $admis = E_Administrador::get();
            foreach ($user as $usuarios) {
                 if ($request->cedula === $usuarios->cedula  ){
                    return redirect()->route('nav_add_admin')
                    ->with('mensaje', 'Ya existe un usuario con esta cédula'); }}

                 foreach ($admis as $admis) {
                    if ($request->correo ===$admis->correo) {
                    return redirect()->route('nav_add_admin')
                    ->with('mensaje', 'Ya existe un administrador con este correo');
                }
               }
            ///Inserción en la tabla usuario
           $usuario->cedula = $request->cedula;
           $usuario->clave =  $request->clave;
           $usuario->id_rol_usuario = $request->rol;
           $usuario->save();
            ///Inserción en la tabla administrador
           $admi->nombre= $request->nombre;
           $admi->apellido= $request->apellido;
           $admi->cedula = $request->cedula;
           $admi->correo = $request->correo;
           $admi->telefono = $request->telefono;
           $admi->id_usuario =$usuario->id_usuario; //guardamos el fk del usuario
           $admi->save();

           return redirect()->route('nav_msg_add');
   }

//////////////////////////////////PROFESOR//////////////////////////////////////////
   public function agregar_profesor(Request $request){
      
    //creamos nuevos objetos para insertar
       $usuario= new E_Usuario();
       $prof = new E_Profesor();

   ///Validar los campos del formulario Profesor
       $request->validate([
          'cedula'=>'required',
          'clave'=> 'required',
          'nombre' => 'required',
          'apellido'=>'required',
          'correo' =>'required',
          'telefono'=>'required',
          'rol'=>'required',
          'sede'=>'required',
          'encuesta'=>'required']);

          //Validamos que no exista la cedula y correo
          $user = E_Usuario::get();
          $prof = E_Profesor::get();
          foreach ($user as $usuarios) {
               if ($request->cedula === $usuarios->cedula  ){
                  return redirect()->route('nav_add_prof')
                  ->with('mensaje', 'Ya existe un usuario con esta cédula'); }}

               foreach ($prof as $prof) {
                  if ($request->correo ===$prof->correo) {
                  return redirect()->route('nav_add_prof')
                  ->with('mensaje', 'Ya existe un profesor con este correo');
              }
             }
        
      
          ///Inserción en la tabla usuario
           $usuario->cedula = $request->cedula;
           $usuario->clave =  $request->clave ;
           $usuario->id_encuesta = $request->encuesta;
           $usuario->id_rol_usuario = $request->rol;
           $usuario->save();
           
          ///Inserción en la tabla profesor
          $prof->cedula = $request->cedula;
          $prof->nombre= $request->nombre;
          $prof->apellido= $request->apellido;
          $prof->correo = $request->correo;
          $prof->telefono = $request->telefono;
          $prof->id_usuario =$usuario->id_usuario; //guardamos el fk del usuario
          $prof->id_sede= $request->sede;
          $prof->save();
          
          return redirect()->route('nav_msg_add');
     
  }

///////////////////////////////ESTUDIANTE///////////////////////////////////
   public function agregar_estudiante(Request $request){
        //creamos nuevos objetos para insertar
       $usuario= new E_Usuario();
       $estu = new E_Estudiante();

        ///Validar los campos del formulario Estudiante
        $request->validate([
        'cedula'=>'required',
        'clave'=> 'required',
        'nombre' => 'required',
        'apellido'=>'required',
        'correo' =>'required',
        'telefono'=>'required',
        'rol'=>'required',
        'año_carrera'=>'required',
        'sede'=>'required',
        'encuesta'=>'required',
        'carrera'=>'required']);
        
            
          //Validamos que no exista la cedula y correo
          $user = E_Usuario::get();
          $estudi = E_Estudiante::get();
          foreach ($user as $usuarios) {
               if ($request->cedula === $usuarios->cedula  ){
                  return redirect()->route('nav_add_estu')
                  ->with('mensaje', 'Ya existe un usuario con esta cédula'); }}

               foreach ($estudi as $estudi) {
                  if ($request->correo ===$estudi->correo) {
                  return redirect()->route('nav_add_estu')
                  ->with('mensaje', 'Ya existe un estudiante con este correo');
              }
             }

           ///Inserción en la tabla Usuario
           $usuario->cedula = $request->cedula;
           $usuario->clave =  $request->clave;
           $usuario->id_encuesta =  $request->encuesta;
           $usuario->id_rol_usuario = $request->rol;
           $usuario->save();

          ///Inserción en la tabla Estudiante
          $estu->cedula = $request->cedula;
          $estu->nombre= $request->nombre;
          $estu->apellido= $request->apellido;
          $estu->correo = $request->correo;
          $estu->telefono = $request->telefono;
          $estu->año_carrera =$request->año_carrera;
          $estu->id_usuario =$usuario->id_usuario; //guardamos el fk del usuario
          $estu->id_sede= $request->sede;
          $estu->id_carrera= $request->carrera;
          $estu->save();

          return redirect()->route('nav_msg_add');
       
  }

////////////////////////EGRESADO////////////////////////////////////////
   public function agregar_egresado(Request $request){
        //creamos nuevos objetos para insertar
       $usuario= new E_Usuario();
       $egre = new E_Egresado();

   ///Validar los campos del formulario Egresado
   $request->validate([
       'cedula'=>'required',
       'clave'=> 'required',
       'nombre' => 'required',
       'apellido'=>'required',
       'correo' =>'required',
       'telefono'=>'required',
       'rol'=>'required',
       'sede'=>'required',
       'encuesta'=>'required',
       'carrera'=>'required',]);
        
            
          //Validamos que no exista la cedula y correo
          $user = E_Usuario::get();
          $egr = E_Egresado::get();
          foreach ($user as $usuarios) {
               if ($request->cedula === $usuarios->cedula  ){
                  return redirect()->route('nav_add_egre')
                  ->with('mensaje', 'Ya existe un usuario con esta cédula'); }}

               foreach ($egr as $egr) {
                  if ($request->correo ===$egr->correo) {
                  return redirect()->route('nav_add_egre')
                  ->with('mensaje', 'Ya existe un egresado con este correo');
              }
             }

           ///Inserción en la tabla Usuario
           $usuario->cedula = $request->cedula;
           $usuario->clave =  $request->clave;
           $usuario->id_encuesta = $request->encuesta;
           $usuario->id_rol_usuario = $request->rol;
           $usuario->save();

           ///Inserción en la tabla Egresado
           $egre->cedula = $request->cedula;
           $egre->nombre= $request->nombre;
           $egre->apellido= $request->apellido;
           $egre->correo = $request->correo;
           $egre->telefono = $request->telefono;
           $egre->id_usuario =$usuario->id_usuario; //guardamos el fk del usuario
           $egre->id_sede= $request->sede;
           $egre->id_carrera= $request->carrera;
           $egre->save();

          return redirect()->route('nav_msg_add');
  }

///////////////////////////////////EMPRESARIO////////////////////////////////

   public function agregar_empresario(Request $request){
        //creamos nuevos objetos para insertar
       $usuario= new E_Usuario();
       $empre = new E_Empresario();

     ///Validar los campos del formulario Empresario
       $request->validate([
          'cedula'=>'required',
          'clave'=> 'required',
          'nombre' => 'required',
          'apellido'=>'required',
          'correo' =>'required',
          'telefono'=>'required',
          'ruc'=>'required',
          'empresa'=>'required',
          'lugar'=>'required',
          'rol'=>'required',
          'encuesta'=>'required']);
        
            
          //Validamos que no exista la cedula y correo
          $user = E_Usuario::get();
          $emp = E_Empresario::get();
          foreach ($user as $usuarios) {
               if ($request->cedula === $usuarios->cedula  ){
                  return redirect()->route('nav_add_empre')
                  ->with('mensaje', 'Ya existe un usuario con esta cédula'); }}

               foreach ($emp as $emp) {
                  if ($request->correo ===$emp->correo) {
                  return redirect()->route('nav_add_empre')
                  ->with('mensaje', 'Ya existe un empresario con este correo');
              }
             }

           ///Inserción en la tabla Usuario
           $usuario->cedula = $request->cedula;
           $usuario->clave =  $request->clave;
           $usuario->id_encuesta =  $request->encuesta;
           $usuario->id_rol_usuario = $request->rol;
           $usuario->save();

           ///Inserción en la tabla Empresario
          $empre->cedula = $request->cedula;
          $empre->nombre= $request->nombre;
          $empre->apellido= $request->apellido;
          $empre->ruc = $request->ruc;
          $empre->correo = $request->correo;
          $empre->nombre_empresa= $request->empresa;
          $empre->lugar= $request->lugar;
          $empre->telefono = $request->telefono;
          $empre->id_usuario =$usuario->id_usuario; //guardamos el fk del usuario
          $empre->save();

          return redirect()->route('nav_msg_add');
  }

}
