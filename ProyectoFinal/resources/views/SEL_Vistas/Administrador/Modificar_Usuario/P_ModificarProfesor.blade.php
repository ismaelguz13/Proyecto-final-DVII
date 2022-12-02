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

@section('secciones')

<!------MENSAJE PARA VALIDAR LOS CAMPOS DEL ADMINISTRADOR-------->
    <div class="col-sm-10 col-md-10 col-lg-10 mx-auto">
        @if ($errors->any())
            <div class="alert alert-danger">
                Todos los campos deben estar llenos
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
    </div>

<!----------SE GUARDAN LOS DATOS CON EL MÉTODO POST------------>
<form action="/put_prof/{{ $usuario_prof[0]->id_profesor }}" method="POST">
    {{ method_field('PUT') }} 
    @csrf 

<!----------FORMULARIO DEL PROFESOR------------>
    <div class="col-sm-10 col-md-10 col-lg-10 mx-auto">
        <div class="container-sm  container-md container-lg">
            <h2 class="float-center">Modificar los datos de {{$usuario_prof[0]->nombre}}</h2>
            <hr style=" border-color: green; width:550px; margin-left:0%">
            <div class="form-group row">
                <label for="text" class = "col-sm-2 col-form-label">Cédula</label>
                    <input type="text" class="form-control" name="cedula"  maxlength="25"value= "{{$usuario_prof[0]->cedula}}" disabled><br>
                <label for="text" class ="col-sm-2 col-form-label">Nombre</label>
                    <input type= "text" class="form-control" name = "nombre"  maxlength="25"value="{{$usuario_prof[0]->nombre}}" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" title="Ingrese solo letras. Ejemplo: Pedro"><br>
                <label for="text" class = "col-sm-2 col-form-label">Apellido</label>
                    <input type ="text" class="form-control" name = "apellido"  maxlength="25"value="{{$usuario_prof[0]->apellido}}" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" title="Ingrese solo letras. Ejemplo: López"><br>
                <label for="" class ="col-sm-2 col-form-label">Correo</label>
                    <input type ="email" class="form-control" name = "correo"  maxlength="35" value="{{$usuario_prof[0]->correo}}" ><br>
                <label for="text" class = "col-sm-2 col-form-label">Teléfono</label>
                    <input class="form-control" type ="text" name = "telefono"  maxlength="20"value="{{$usuario_prof[0]->telefono}}" pattern="[0-9-]+"title="Ingrese solo números y guión. Ejemplo: 441-2421"><br>
           
                        <!------SELECCION DE LA SEDE------->
                        <label for="text" class = "col-sm-2 col-form-label">Sede</label>
                        <select class="form-control" name="sede">
                        <option  value="{{$usuario_prof[0]->id_sede}}" selected>{{$usuario_prof[0]->id_sede}}</option>
                        @foreach( App\SEL_Modelos\E_Sede::get() as $dato_sede) 
                        <option value= " {{ $dato_sede->id_sede }}"> {{$dato_sede->nombre_sede}} </option>
                        @endforeach
                        </select><br>

            </div>        

<!----------SE ENVIAN TODOS LOS DATOS CON SUBMIT------------>
            <button name="submit" type="submit" class="btn btn-success btn-opcion">Modificar</button>

<!----------RETORNA A LA LISTA DE PROFESORES------------>
            <a href="{{route('nav_list_up_prof')}}"  type="button"class="btn btn-success btn-opcion">Regresar</a>  
        </div>
            
    </div>
</form>

<!----------ESTILO DE BOTONES------------>
  <style>  
    .btn-opcion{
        background-color: #005B28;
        border-color: #005B28;
        margin:15px;
        width: 45%;
        padding: 15px;
        font-size:18px;
        display:inline-block;
    }

    </style>  
@endsection

