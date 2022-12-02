@extends('SEL_Vistas/Login/P_LoginBase')
@section('seccion_login')

<form method="POST" action={{route('nav_new_admi')}}>
<div class="main">
        <div class=" col-6 col-sm-12" >
        
            <div style="text-align:center">
            <h1 > Recuperar Contraseña </h1>
      
             <br><div class="form-group">
                <h3 style="text-align=center">Correo:</h3>
                <input type="text" class="form-control" placeholder="Ingrese su Correo">
             </div> 

             <div style="display:inline-block; margin:30px; padding:10px 20px;">
            <a href="{{route('nav_iniciar_sesion')}}" type="button" class="btn btn-black"> <h4>Regresar</h4></a>
            <a href="{{route('nav_recu_clave')}}" type="submit" class="btn btn-black"> <h4>Enviar</h4></a>
         </div>
      </div>
</div>
</div>
</form>
@endsection