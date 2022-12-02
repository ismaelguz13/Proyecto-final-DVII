@extends('P_PantallaBase')
<!----------Nombre del ROL------------>
@section('rol')
<a class="navbar-brand-sm" style="color: #fff">Administradores</a>
@endsection
<!----------------------------------------------------------------------------------------------->
@section('secciones')
  <!-------------TITULO DE PANTALLA------------>
  <div class="container">
    <h2 class="tit1">Seleccione el módulo en el cual desea trabajar</h2>
    <hr style=" border-color: green; width:550px; margin-left:0%">
    <!----------BOTONES DE OPCIONES------------>
    <div class="row mt-4">
      <div class="col-12 d-flex flex-column align-items-center">
        <a href="/menu/est" class="btn btn-success btn-menu"    role="button">Gestión de Seguimiento de Asignatura</a>

        <a href="{{route('P_MenuInicial')}}" class="btn btn-success btn-menu"     role="button">Gestión de Encuesta de fin de curso a Docentes</a>

        <a href="/menuvice" class="btn btn-success btn-menu"  role="button">Gestión de encuesta a Egresados</a>

        <a href="/menu/emp" class="btn btn-success btn-menu" role="button" >Gestión de encuesta a Empresarios</a>

        <a href="{{route('nav_menu')}}" class="btn btn-success btn-menu"    role="button">Administrador del Sistema</a>

      </div>
    </div>
  </div>
</div>


<!----------ESTILO DE BOTONES------------>
<style>
    .btn-menu {
        background-color: #005B28;
        border-color: #005B28;
        margin-bottom: 10px;
        width: 65%;
        padding: 10px;
        font-size:24px;
    }
</style>


  @endsection
