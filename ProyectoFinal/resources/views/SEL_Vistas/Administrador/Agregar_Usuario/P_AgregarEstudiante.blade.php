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

<!------METODO POST PARA GUARDAR LOS DATOS DEL ESTUDIANTE -------->
<form method="POST" action={{route('nav_new_estu')}}>
    {{ csrf_field()}}
    {{ method_field('PUT')}}

<!------MENSAJE PARA VALIDAR LOS CAMPOS DEL ESTUDIANTE-------->
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

  <!------MENSAJE PARA VALIDAR LA INSERCIÓN-------->
   <div class="col-sm-10 col-md-10 col-lg-10 mx-auto">
    @if (session('mensaje'))
        <div class="alert alert-danger">
            {{ session('mensaje') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
        </div>
    @endif
</div>

  <!------FORMULARIO PARA AGREGAR EL ESTUDIANTE-------->    
  <div class="col-sm-10 col-md-10 col-lg-10 mx-auto"><br>
    <div class="container-sm  container-md container-lg">
      <h3 class="tit1" >Ingrese los datos del estudiante</h3>
      <hr style=" border-color: green; width:550px; margin-left:0%">

        <label for="">Cédula</label>
        <input type="text" class="form-control" name="cedula" maxlength="12" value="{{old('cedula')}}"pattern="[A-Z0-9-]+" title="Ingrese caracteres validos. Ejemplo: E-8-4352 o 8-54-353"><br>
        <label for="">Contraseña</label>
        <input type="password" class="form-control" name="clave" maxlength="10" value="{{old('clave')}}"><br>
        <label for="">Nombre</label>
        <input type="text" class="form-control" name="nombre"maxlength="15" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" title="Ingrese solo letras. Ejemplo: Pedro"><br>
        <label for="">Apellido</label>
        <input type="text" class="form-control" name="apellido"maxlength="15" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" title="Ingrese solo letras. Ejemplo: López"><br>
        <label for="">Correo</label>
        <input type="email" class="form-control" name="correo" maxlength="30"><br>
        <label for="">Télefono</label>
        <input type="text" class="form-control" name="telefono" maxlength="10" pattern="[0-9-]+"title="Ingrese solo números y guión. Ejemplo: 441-2421"><br>
                
     
    <!------SELECCION DEL AÑO------>
      <label for="">Año de carrera</label>
      <select class="form-control" name="año_carrera">
        <option  value="">Seleccionar año de carrera</option>
        <option name="año_carrera" value="I año">I año</option>
        <option name="año_carrera" value="II año">II año</option>
        <option name ="año_carrera" value="III año">III año</option>
        <option name="año_carrera" value="IV año">IV año</option>
        <option name="año_carrera" value="V año">V año</option>  
      </select><br>

   <!------SELECCION DEL ROL------>
    <label for="">Rol</label>
      <select class="form-control" name="rol">
        <option value="9">Estudiante</option>
      </select><br>

  <!------SELECCION DEL ENCUESTA------>
   <label for="">Encuesta</label>
      <select class="form-control" name="encuesta">
        <option value="2">Encuesta de Estudiante</option>
      </select><br>

  <!------SELECCION DE LA SEDE------->
      <label for="">Sede</label>
      <select class="form-control" name="sede">
        <option value="">Seleccionar sede</option>
        @foreach( App\SEL_Modelos\E_Sede::get() as $dato_sede) 
        <option value= " {{ $dato_sede->id_sede }}"> {{$dato_sede->nombre_sede}} </option>
        @endforeach
      </select><br>

  <!------SELECCION DE CARRERA------->
        <label for="">Carrera</label>
        <select class="form-control" name="carrera">
          <option value="">Seleccionar carrera</option>
          @foreach(App\SEL_Modelos\E_Carrera::all() as $dato_carrera) 
          <option value= " {{ $dato_carrera->id_carrera }} "> {{$dato_carrera->nombre_carrera}} </option>
          @endforeach
        </select><br>

  <!------BOTÓN PARA ENVIAR LOS DATOS AL POST-------->  
        <button name="submit" type="submit" class="btn btn-success btn-opcion" >Guardar</button>
        <a href="{{route('nav_us_agregrar')}}"  type="button" class="btn btn-success btn-opcion">Regresar</a><br>
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