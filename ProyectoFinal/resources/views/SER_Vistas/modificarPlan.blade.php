@extends('layouts.admin')

@section('content')
    <H1 id="title">Modificar Plan de Estudio</h1>
    <h3>Filtrar Busqueda:</h3>
  
    <form action="/menu/est/modificarPlan/filtrar" method="post">
    @csrf
    <div class="row">
  <div class="col-12 d-flex justify-content-between">
  <!-------------------------------------->
  <div class="col-6">
    <select name="Carrera" class="dropdown">
        <option selected value="0">Carrera</option>
        <option value="1">Licenciatura en Desarrollo de Software</option>
        <option value="2">Licenciatura en Redes Informáticas</option>
        <option value="3">Licenciatura en Ingeniería de Sistemas y Computación</option>
        <option value="4">Licenciatura en Ingeniería de Sistemas de Información</option>
        <option value="5">Licenciatura en Ingeniería de Software</option>
        <option value="6">Licenciatura en Informática Aplicada a la Educación</option>
        <option value="7">Técnico en Informática para la Gestión Empresarial</option>
    </select>
  </div>
  <!-------------------------------------->
  <div class="col-1">
    <select name="Año" class="dropdown">
        <option selected value="0">Año</option>
        <option value="I año">I</option>
        <option value="II año">II</option>
        <option value="III año">III</option>
        <option value="IV año">IV</option>
        <option value="V año">V</option>
    </select>
  </div>
  <!-------------------------------------->
  <div class="col-2">
    <select name="Semestre" class="dropdown">
        <option selected value="0">Semestre</option>
        <option value="I semestre">I Semestre</option>
        <option value="II semestre">II Semestre</option>
        <option value="Verano">Verano</option>
    </select>
  </div>
  <!--------------------------------------
  <div class="col-2">
    <select name="Grupo" class="dropdown">
        <option selected value="0">Grupo</option>
        <option value="1">1LS131</option>
        <option value="2">1LS132</option>
    </select>
  </div>
  ------------------------------------>
  <div class="col-1">
    <button type="submit" class="btn btn-success ">Filtrar</button>
    </div>
    </div>
    </div>
    </form>
    
  <!-------------------------------------->
    <br>
    <table class="table table-bordered">
    <thead>
    <tr>
        <th scope="col" style="table-layout: fixed; width: 25%;">Código</th>
        <th scope="col" style="table-layout: fixed; width: 50%;">Nombre</th>
        <th scope="col" style="table-layout: fixed; width: 25%;">Semestre</th>
    </tr>
    </thead>
    <tbody>
    @if (!is_null($asignaturas)&&!is_null($id_asignaturas))
        @foreach($asignaturas as $asignatura)
        @foreach($id_asignaturas as $id_asignatura)
        @if($asignatura->id_asignatura == $id_asignatura->id_asignatura)
          <tr>
            <td style="table-layout: fixed; width: 25%;">{{$asignatura->cod_asignatura}}</td>
            <td style="table-layout: fixed; width: 50%;">{{$asignatura->nombre}}</td>
            <td style="table-layout: fixed; width: 25%;">{{$id_asignatura->semestre}}</td>
          </tr>
          @endif
          @endforeach
        @endforeach
    @endif

    </tbody>
    </table>
    <br>

    <div class="row">
        <div class="col-9">
        <a href="/menu/est" class="btn btn-success">Regresar</a>
        </div>
        <div class="col-3">
        <a href="/menu/est/modificarPlan/agregarAsignatura" class="btn btn-success">Agregar</a>
        <a href="/menu/est/modificarPlan/eliminarAsignatura" class="btn btn-success">Eliminar</a>
        </div>
    </div>
    <br>
@endsection