@extends('P_PantallaBase')
<!----------PARA VOLVER AL MENU PRINCIPAL------------>
@section('nav')
<li class="nav-item ml-4">
    <a class="navbar-link anav" href="{{route('nav_menu')}}"><img src="{{asset('icons/file.svg')}}" alt="file SVG"> Mantenimiento de Usuarios</a>
  </li>
@endsection

@section('rol')
<a class="navbar-brand-sm" style="color: #fff">Administrador del sistema</a>  
@endsection

@section('secciones')
 <div class="col-12 d-flex flex-column align-items-center" style="margin-top: 50px;">
     
              <div class="centrado" >

                <table width="500" margin-top= "20%" cellspacing="1" cellpadding="3" border="1" bgcolor="#FFFFFF">
                <tr>
                <td bgcolor="#005B28">
                <font size=3 color="#FFFFFF" face="verdana, arial, helvetica">
                <center> <b>Usuario eliminado</b> <center>
                </font>
                </td>
                </tr>
                </table>

                <table width="500" height="200" cellspacing="1" cellpadding="3" border="1" bgcolor="#FFFFFF">
                <tr>
                <td bgcolor="#FFFFFF">
                <font face="verdana, arial, helvetica" size=5>
                <center>El usuario ha sido eliminado exitosamente.</center> 
                </font>
                 <br>
                <center>
                <a href="{{route('nav_menu')}}"  class="btn btn-success btn-back"   role="button">Ver menú</a>
                <center>
                </td>
                </tr>
                </table>

            </div>
        </div>

<style>
.btn-back {
        background-color: #005B28;
        border-color: #005B28;
   
    } 
</style>        
           

@endsection