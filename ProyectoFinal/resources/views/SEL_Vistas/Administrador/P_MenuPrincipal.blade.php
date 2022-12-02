@extends('P_PantallaBase')
<!----------Nombre de Rol------------>
@section('rol')
<a class="navbar-brand-sm" style="color: #fff">Administrador del sistema</a>  
@endsection
<!-------------------------------------------------------------------------------------------------->
@section('secciones')
 <!----------TITULO DE PANTALLA------------>
<div class="contenido">
   <center> <h1 class="tit1">Menú de Administrador del Sistema</h1> <center> <br>
        <div class="row">
        <!----------IMAGENES DE USUARIOS------------>
            <img src="{{asset('imagenes/Img_add.png')}}" alt="" width="32%" height=""> 
            <img src="{{asset('imagenes/Img_update.png')}}" alt="" width="32%" height="">
            <img src="{{asset('imagenes/Img_delete.png')}}" alt="" width="32%" height="">  
            <!-------------BOTONES-------------->  
            <a href="{{route('nav_us_agregrar')}}"  class="btn btn-success btn-menu"      role="button">AGREGAR USUARIO </a>
            <a href="{{route('nav_us_modificar')}}"  class="btn btn-success btn-menu"      role="button">MODIFICAR USUARIO </a>
            <a href="{{route('nav_us_eliminar')}}"  class="btn btn-success btn-menu"     role="button">ELIMINAR USUARIO </a>
        </div>
    </div>
<!----------ESTILO DE BOTONES------------>
<style>  
    .btn-menu {
        background-color: #005B28;
        border-color: #005B28;
        margin-bottom: 10px;
        margin-left:20px;
        width: 30%;
        padding: 10px;
        font-size:18px;
        display:inline-block;
    }
</style>
@endsection

       