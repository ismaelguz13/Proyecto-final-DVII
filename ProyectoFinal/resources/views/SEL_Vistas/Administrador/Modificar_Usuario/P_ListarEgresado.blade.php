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
        <h1 class="text-center">Lista de Egresados </h1><br>
<!------------INPUT PARA BUSCAR UN EGRESADO EN ESPECIFICO------------>  
             <div class="input-group">
            <a href="{{route('nav_us_modificar')}}" class="btn-sm btn-success" style="background-color: #005B28; margin-left: 20px;color: white">  <i class="fa fa-arrow-left  fa-2x" aria-hidden="true"></i> </a>
            <input class="form-control" id="buscar_egre" type="text" placeholder="Buscar egresado">
        </div> <br>
  <!------------CONTENEDOR DE LA TABLA EGRESADO------------>      
        <div class="table-responsive mx-auto d-block">
            <div class="row">
                <div class="col-md mx-auto d-block"> 
                    <table class="table table-hover">
                     <!------------COLUMNAS DE LA TABLA EGRESADO---------------->
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
                        <tbody id="tabla_egre" class="text-center">  <!----ID para buscar dato---->
                            @foreach ($egresado as $datos_egre)
                            <tr>
                            </form> 
                                <td scope="row"> {{$datos_egre->cedula}}</td>
                                <td>{{$datos_egre->nombre}}</td>
                                <td>{{$datos_egre->apellido}}</td>
                                <td>{{$datos_egre->correo}}</td>
                                <td>{{$datos_egre->telefono}}</td>
                                  <!--------BOTON DE MODIFICAR------>
                                <td><a href="{{route('nav_up_egre',$datos_egre->id_egresado)}}" ><i class="far fa-2x fa-edit text-primary"></i></a>
                                </td>
                            </tr>
                            @endforeach  
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
      </form>
    <!-------------------BUSCAR EGRESADO----------------------->
 <script>
    $(document).ready(function(){
      $("#buscar_egre").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#tabla_egre tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });
    });
</script>
  
@endsection

