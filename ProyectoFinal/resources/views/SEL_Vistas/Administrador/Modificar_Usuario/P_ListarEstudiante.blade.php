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
        <h1 class="text-center">Lista de Estudiantes </h1><br>
<!------------INPUT PARA BUSCAR UN ESTUDIANTE EN ESPECIFICO------------>  
     <div class="input-group">
            <a href="{{route('nav_us_modificar')}}" class="btn-sm btn-success" style="background-color: #005B28; margin-left: 20px;color: white">  <i class="fa fa-arrow-left  fa-2x" aria-hidden="true"></i> </a>
            <input class="form-control" id="buscar_estu" type="text" placeholder="Buscar estudiante">
        </div> <br>
<!------------CONTENEDOR DE LA TABLA ESTUDIANTE------------>
        <div class="table-responsive mx-auto d-block">
            <div class="row">
                <div class="col-md mx-auto d-block"> 
                    <table class="table table-hover">
                     <!------------COLUMNAS DE LA TABLA ESTUDIANTE---------------->
                        <thead class="text-center">
                            <tr>
                            <th>Cédula</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Correo</th>
                            <th>Teléfono</th>
                            <th>Nivel</th>
                            </tr>
                        </thead>
                          <!-----------------IMPRIME LOS DATOS------------>
                        <tbody id="tabla_estu" class="text-center"> <!----ID para buscar dato---->
                            @foreach ($estudiante as $datos_estu)
                            <tr>
                                <td scope="row">{{$datos_estu->cedula}}</td>
                                <td>{{$datos_estu->nombre}}</td>
                                <td>{{$datos_estu->apellido}}</td>
                                <td>{{$datos_estu->correo}}</td>
                                <td>{{$datos_estu->telefono}}</td>
                                <td>{{$datos_estu->año_carrera}}</td>
                                  <!--------BOTON DE MODIFICAR------>
                                <td><a href="{{route('nav_up_estu',$datos_estu->id_estudiante)}}" ><i class="far fa-2x fa-edit text-primary"></i></a>
                                </td>
                            </tr>
                            @endforeach  
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
      </form>

     <!-------------------BUSCAR ESTUDIANTE---------------------->
    <script>
        $(document).ready(function(){
          $("#buscar_estu").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#tabla_estu tr").filter(function() {
              $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
          });
        });
    </script>
  
@endsection

