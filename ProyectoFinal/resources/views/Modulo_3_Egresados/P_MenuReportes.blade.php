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
<div class="col" style="margin-left:-21rem;margin-top:-5rem">
<h4>Menú Reportes</h4>
<hr style="border: 3px solid green;width:350px;margin-left:0%;">
</div>
<div class="container">
    <div class="row d-flex justify-content-center" >
            <div class="col-4 d-flex justify-content-center">
                <div class="card text-center" style="margin-top:100px; width: 250px ;height: 200px;">
                        <div class="card-body" >
                            <img src="{{asset ('icons/noun_report_414042.svg')}}" alt="encuestas" style= "width: 100px; height: 150px;">
                        </div>
                        <a class="btn btn-success disabled" href="#" role="button" style="font-size:25px; color:#fff; background-color:#005B28;">Generar Reportes</a>
                </div>
                
            </div>
            <div class="col-4 d-flex justify-content-center">
                <div class="card text-center"style="margin-top:100px; width: 280px ;height: 200px;">
                    <div class="card-body" >
                        <img src="{{asset ('icons/estadoenc.svg')}}" alt="imglge1" style= "width: 110px; height: 150px;">
                    </div>
                    <a class="btn btn-success" href="/menuvice/menureportes/estadoencues" role="button" style="font-size:25px; color:#fff; background-color:#005B28;">Estado De Encuesta</a>
                </div>
            </div>
    </div>
</div>
@endsection