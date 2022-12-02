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

<!------------METODO GET PARA  MOSTRAR LOS DATOS------------>

      <form action="" method="GET"> <!----Entrada del form----->
        <h1 class="text-center">Lista de Empresarios</h1><br>
       
<!------------INPUT PARA BUSCAR UN EMPRESARIO EN ESPECIFICO------------>       
        <div class="input-group">
          <a href="{{route('nav_us_eliminar')}}" class="btn-sm btn-success" style="background-color: #005B28; margin-left: 20px;color: white">  <i class="fa fa-arrow-left  fa-2x" aria-hidden="true"></i> </a>
          <input class="form-control" id="buscar_empre" type="text" placeholder="Buscar empresario">
       </div> <br>
<!------------CONTENEDOR DE LA TABLA EMPRESARIO------------>
        <div class="table-responsive mx-auto d-block">
            <div class="row">
                <div class="col-md mx-auto d-block"> 
                    <table class="table table-hover">

<!------------COLUMNAS DE LA TABLA EMPRESARIO---------------->
                        <thead class="text-center">
                            <tr>
                           <th>Cédula</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Ruc</th>
                            <th>Correo</th>
                            <th>Empresa</th>
                            <th>Lugar</th>
                            <th>Teléfono</th>
                            </tr>
                        </thead>
                          <!-----------------IMPRIME LOS DATOS------------>
                        <tbody id="tabla_empre" class="text-center">
                            @foreach ($empresario as $datos_empre)
                            <tr>
                                <td scope="row">{{$datos_empre->cedula}}</td>
                                <td>{{$datos_empre->nombre}}</td>
                                <td>{{$datos_empre->apellido}}</td>
                                <td>{{$datos_empre->ruc}}</td>
                                <td>{{$datos_empre->correo}}</td>
                                <td>{{$datos_empre->nombre_empresa}}</td>
                                <td>{{$datos_empre->lugar}}</td>
                                <td>{{$datos_empre->telefono}}</td>
                                
                            <!-------SE DIRECCIONA A LA PANTALLA MODAL--------->
                                <td><a href="javascript:;" data-toggle="modal" onclick="deleteData({{$datos_empre->id_empresario}})" 
                                  data-target="#Delete_Modal_empre"><i class="fas fa-2x fa-trash-alt text-danger"></i></a>
                                </td>                               
                            </tr>
                            @endforeach  
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
      </form><!-------Cierre del form--------->
         
<!-------------------------PANTALLA MODAL------------------------>

  <div id="Delete_Modal_empre" class="modal fade" role="dialog">
    <div class="modal-dialog">
    <!-- Modal Contenedor-->
     <form action="/delete_empre/{{$datos_empre->id_empresario}}" class="d-inline" method="POST" id="delete_empre">
         <div class="modal-content">
          <!-----------Encabezado-------->
           <div class="modal-header"style="background-color: #005B28">
             <h4 class="modal-title text-white">Eliminar Empresario</h4>
           </div>
           <!-----------Contenido-------->
           <div class="modal-body">
             {{ csrf_field() }}
             {{ method_field('DELETE') }}
             <br>
             <p class="text-center "><strong> ¿ Esta seguro que desea eliminar este empresario? </strong></p>   
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


<!-------------------Buscar Empresario----------------------->
 <script>
    $(document).ready(function(){
      $("#buscar_empre").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#tabla_empre tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });
    });
</script>


<!----------------------Eliminar Empresario--------->
<script type="text/javascript">
      function deleteData(id)
      {  
        var id = id;
        var url = '{{route("nav_del_empre", ":id") }}';
        url = url.replace(':id', id);
        $("#delete_empre").attr('action', url);
      }
      function formSubmit()
      {$("#delete_empre").submit();//Se envia los datos con el metodo submit a el route eliminar
      }
  </script>  
  
@endsection

