@extends('P_PantallaBase')
<!----------Librerias para opcion de buscar------------>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
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

@section('secciones')
<!----------MENSAJE PARA VALIDAR LA MODIFICACION----------->
@if (session('mensaje'))
  <div class="alert alert-success">
      {{ session('mensaje') }}
  </div>
@endif
<!------------METODO GET PARA  MOSTRAR LOS DATOS------------>
      <form action="//" method="GET"> 
        <h1 class="text-center">Lista de Administradores </h1><br>
<!------------INPUT PARA BUSCAR UN ADMINISTRADOR EN ESPECIFICO------------>  
         <div class="input-group">
            <a href="{{route('nav_us_modificar')}}" class="btn-sm btn-success" style="background-color: #005B28; margin-left: 20px;color: white">  <i class="fa fa-arrow-left  fa-2x" aria-hidden="true"></i> </a>
            <input class="form-control" id="buscar_admi" type="text" placeholder="Buscar administrador">
            </div> <br>
 <!------------CONTENEDOR DE LA TABLA ADMINISTRADOR------------>       
        <div class="table-responsive mx-auto d-block">
            <div class="row">
                <div class="col-md mx-auto d-block"> 
                    <table class="table table-hover" >
                     <!------------COLUMNAS DE LA TABLA ADMINISTRADOR--------------->
                        <thead class="text-center">
                            <tr>                     
                            <th>Cédula</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Correo</th>
                            <th>Teléfono</th>
                            </tr>
                        </thead>
                          <!-----------------IMPRIME LOS DATOS------------>
                        <tbody id= "tabla_admi" class="text-center"><!----ID para buscar dato---->
                            @foreach ($administrador as $datos_admi)
                                <tr>
                             </form>                  
                                <td scope="row">{{$datos_admi->cedula}}</td>
                                <td>{{$datos_admi->nombre}}</td>
                                <td>{{$datos_admi->apellido}}</td>
                                <td>{{$datos_admi->correo}}</td>
                                <td>{{$datos_admi->telefono}}</td>
                                  <!--------BOTON DE MODIFICAR------>
                                <td><a href="{{route('nav_up_admi',$datos_admi->id_administrador)}}"  ><i class="far fa-2x fa-edit text-primary"></i></a>
                                </td>
                            </tr>
                            @endforeach  
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
      </form>


      
<!-------------------BUSCAR ADMINISTRADOR----------------------->
 <script>
    $(document).ready(function(){
      $("#buscar_admi").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#tabla_admi tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });
    });
</script>
   
@endsection

