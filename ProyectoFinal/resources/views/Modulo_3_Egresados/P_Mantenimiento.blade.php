@extends('layouts.admin')
@section('navprin')
<nav class="navbar navbar-expand-sm  navbar-expand-md navbar-expand-lg d-flex justify-content-start navbar-light" style="font-family: Pill Gothic 600mg Semibd, sans-serif; background-color:  rgba(80, 78, 78, 0.233);">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="navbar-link anav" href="/menuvice"><img style="width: 25px; height: 25px;" src="{{asset('/icons/regreso.svg')}}" alt="home SVG"> Volver</a>
      </li>
    </ul>
  </nav><br>
  @endsection
@section('imgpub')
<div class="container-fluid" style="margin-top:5rem;">
        <div class="row justify-content-md-justify">
          <div class="col-sm-4 col-md-4 col-lg-3">
            <div class="d-flex flex-column mb-2 ">
              <img src="{{asset('imagenes/IMGWEB1.jpg')}}" alt="" width="250" height="">
              <img src="{{asset('imagenes/IMGWEB.jpg')}}" alt="" width="250" class="mt-2">
            </div>
          </div>
@endsection

@section('content')
<!--Titulo de la patalla -->
<div class="col-inline" style="margin-left:-20rem;margin-top:-5rem">
<h5>MANTENIMIENTO DE ENCUESTAS</h5>
<hr style="border: 3px solid green;width:350px;margin-left:0%;">
</div>

<!-- Botones de la pantalla -->
<div class="container">
    <div class="row d-flex justify-content-center" >
    <div class="col-4"></div>
            <div class="col-3 d-flex justify-content-center">
                <div class="card text-center" style="margin-top:-20rem; width: 250px ;height: 200px;">
                        <div class="card-body" >
                            <img src="{{asset ('icons/noun_Add Document_403320.svg')}}" alt="encuestas" style= "width: 100px; height: 150px;">
                        </div>
                        <a class="btn btn-success" href="/AgregarPreguntas" role="button" style="font-size:20px; color:#fff; background-color:#005B28;">Agregar Preguntas</a>
                </div>
                
            </div>
            <div class="col-4 d-flex justify-content-center">
                <div class="card text-center"style="margin-top:-20rem; width: 2200px ;height: 200px;">
                    <div class="card-body">
                        <img src="{{asset ('icons/noun_write document_403326.svg')}}"   alt="imglge1" style= "width: 100px; height: 150px;">
                        <img src="{{asset ('icons/noun_Remove Document_403334.svg')}}" alt="imglge1" style= "width: 100px; height: 150px;">
                
                    </div>
                    <a class="btn btn-success" href="/modificarpreg" role="button" style="font-size:20px; color:#fff; background-color:#005B28;"> Modificar/Eliminar Preguntas
                    </a>
                </div>
            </div>
    </div>
</div>
@endsection