@extends('P_PantallaBase')
<!----------Nombre del ROL------------>
@section('rol')
<a class="navbar-brand-sm" style="color: #fff">Administrador del sistema</a>  
@endsection
<!----------PARA VOLVER AL MENU PRINCIPAL------------>
@section('nav')
<li class="nav-item ml-4">
    <a class="navbar-link anav" href="{{route('nav_menu')}}"><img src="{{asset('icons/file.svg')}}" alt="file SVG"> Mantenimiento de Usuarios</a>
  </li>
@endsection
<!-------------------------------------------------------------------------------------------------->
    @section('secciones')
    <!----------tITULO DE PANTALLA------------>
    <div class="contenido">
        <h3 class="tit1" >  <strong>AGREGAR USUARIO </strong></h3> 
            <hr style=" border-color: green; width:300px; margin-left:0%">
              <!----------TIPOS DE USUARIOS------------>
                <div class="row">
                    <div class="col-12">
                            <a href="{{route('nav_add_admin')}}"  class="btn btn-success btn-tipo"    role="button">ADMINISTRATIVO FISC</a>
                      
                            <a href="{{route('nav_add_prof')}}"  class="btn btn-success btn-tipo"   role="button">PROFESOR</a>
                       
                            <a href="{{route('nav_add_estu')}}"  class="btn btn-success btn-tipo"    role="button">ESTUDIANTE</a>
                        
                            <a href="{{route('nav_add_egre')}}"  class="btn btn-success btn-tipo"   role="button">EGRESADO</a>
                      
                            <div class="col-12 d-flex flex-column align-items-center">
                            <a href="{{route('nav_add_empre')}}"  class="btn btn-success btn-tipo"    role="button">EMPRESARIO</a>
                            </div>
                             <!---------REGRESAR AL MENU PRINCIPAL--------->
                            <a href="{{route('nav_menu')}}"  class="btn btn-success btn-back"   role="button">REGRESAR </a>
                    </div>         
               </div>

<!----------ESTILO DE BOTONES------------>
 <style>  
    .btn-tipo {
        background-color: #005B28;
        border-color: #005B28;
        margin:15px;
        width: 45%;
        padding: 15px;
        font-size:18px;
        display:inline-block;
    }
.btn-back {
        background-color: #005B28;
        border-color: #005B28;
        margin:15px;
        width: 20%;
        padding: 15px;
        font-size:15px;
        display:block;
    } 
</style>        
            
@endsection 