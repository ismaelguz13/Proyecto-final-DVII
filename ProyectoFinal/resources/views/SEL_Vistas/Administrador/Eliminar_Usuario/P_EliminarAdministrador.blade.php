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

<!----------METODO GET PARA  MOSTRAR LOS DATOS------------>

     <form action="" method="GET"> <!----Entrada del form----->
        <h1 class="text-center">Lista de Administradores</h1><br>

<!----------INPUT PARA BUSCAR UN ADMINISTRADOR EN ESPECIFICO------------>
    <div class="input-group">
        <a href="{{route('nav_us_eliminar')}}" class="btn-sm btn-success" style="background-color: #005B28; margin-left: 20px;color: white">  <i class="fa fa-arrow-left  fa-2x" aria-hidden="true"></i> </a>
        <input class="form-control"  id="buscar_admi" type="text" placeholder="Buscar administrador">
</div> <br>
<!----------CONTENEDOR DE LA TABLA ADMINISTRADOR------------>
        <div class="table-responsive mx-auto d-block">
            <div class="row">
                <div class="col-md  mx-auto d-block"> 
                    <table class="table table-hover" >

<!----------COLUMNAS DE LA TABLA ADMINISTRADOR------------>
                        <thead class="text-center">
                            <tr >                     
                              <th>Cédula</th>
                              <th>Nombre</th>
                              <th>Apellido</th>
                              <th>Correo</th>
                              <th>Teléfono</th>
                            </tr>
                        </thead>
                          <!-----------------IMPRIME LOS DATOS------------>
                          <tbody id= "tabla_admi" class="text-center">
                            @foreach ($administrador as $datos_admi)
                            <tr> 
                                <td scope="row">{{$datos_admi->cedula}}</td>
                                <td>{{$datos_admi->nombre}}</td>
                                <td>{{$datos_admi->apellido}}</td>
                                <td>{{$datos_admi->correo}}</td>
                                <td>{{$datos_admi->telefono}}</td>

                                <!-------SE DIRECCIONA A LA PANTALLA MODAL--------->
                                <td><a href="javascript:;" data-toggle="modal" onclick="deleteData({{$datos_admi->id_administrador}})" 
                                  data-target="#Delete_Modal_admi" ><i class="fas fa-2x fa-trash-alt text-danger"></i></a>
                                </td>
                            </tr>
                            @endforeach  
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </form> <!-------Cierre del form--------->
      
<!----------------------PANTALLA MODAL------------------------->

  <div id="Delete_Modal_admi" class="modal fade" role="dialog">
    <div class="modal-dialog">
    <!-- Modal Contenedor-->
     <form action="/delete_admi/{{ $datos_admi->id_administrador }}" class="d-inline" method="POST" id="delete_admi">
         <div class="modal-content">
          <!-----------Encabezado-------->
           <div class="modal-header" style="background-color: #005B28">
             <h4 class="modal-title text-white" >Eliminar Administrador</h4> 
           </div>
           <!-----------Contenido-------->
           <div class="modal-body">
             {{ csrf_field() }}
             {{ method_field('DELETE') }}
             <br>
             <p class="text-center "><strong> ¿ Esta seguro que desea eliminar este administrador ? </strong></p>   
             <br>     
           </div>
           <!------------Footer-------->
           <div class="modal-footer">
             <button type="submit" name="" class="btn btn-danger mr-auto" data-dismiss="modal" onclick="formSubmit()">Si</button>
             <button type="button" class="btn btn-success" style="background-color: #005B28; border:#005B28;" data-dismiss="modal">No</button>
           </div>
         </div>
     </form>
     </div>
 </div> 

 <!-------------------Buscar Administrador----------------------->
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

<!-----------------Eiminar Administrador-------------------->
<script type="text/javascript">
    function deleteData(id)
    {  
      var id = id;
      var url = '{{route("nav_del_admi", ":id") }}';
      url = url.replace(':id', id);
      $("#delete_admi").attr('action', url);
    }

    function formSubmit()
    { $("#delete_admi").submit();//Se envia los datos con el metodo submit a el route eliminar
    }
  </script>

  
@endsection

