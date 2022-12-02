@extends('SEL_Vistas/Login/P_LoginBase')

@section('styles')
<link rel="stylesheet" href="{{asset('css/checkmark.css')}}">
@endsection


@section('seccion_login')

<div class="main">

   <div class="col-md-6 col-sm-12">
      <div class="login-form">
         <h1> INICIAR SESIÓN </h1> <br>
         <p> Sistema de gestión de encuestas de la FISC</p>
         <form action="/" method="POST">
            @csrf

            <div class="form-group">
               <h3>Cédula:</h3>
               <input type="text" class="form-control @error('cedula') is-invalid @enderror" name="cedula" id="cedula" placeholder="Ingrese su cédula">
            </div>
            @error('cedula')
            <div class="alert alert-danger h5">Introduzca su cédula</div>
            @enderror
            <div class="form-group">
               <h3>Contraseña:</h3>
               <input type="password" class="form-control" name="clave" placeholder="************">
            </div>
            <span></span>
            @error('clave')
            <div class="alert alert-danger h5">Cedula o Contraseña Incorrecta</div>
            @enderror
            @if (session('status'))
            <h5 class="text-danger">{{session('status')}}</h5>
            @endif
            <center>
               <button type="submit" class="btn btn-black">
                  <h4>Acceder</h4>
               </button>
         </form>


         <h4><a href="{{route('nav_back_clave')}}" id="forgot_pswd">Recuperar contraseña</a></h4>
         <center>
      </div>
   </div>
</div>
@endsection