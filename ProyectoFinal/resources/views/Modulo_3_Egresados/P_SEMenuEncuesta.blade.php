@extends('layouts.admin')
@section('navprin')
<nav class="navbar navbar-expand-sm  navbar-expand-md navbar-expand-lg d-flex justify-content-start navbar-light" style="font-family: Pill Gothic 600mg Semibd, sans-serif; background-color:  rgba(80, 78, 78, 0.233);">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="navbar-link anav" href="/rol/7"><img style="width: 25px; height: 25px;" src="{{asset('/icons/regreso.svg')}}" alt="home SVG"> Volver</a>
      </li>
    </ul>
  </nav> <br>
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
<!--TITULO DE LA PANTALLA-->
<div class="col" style="margin-left:-21rem;margin-top:-5rem">
<br>
<h4 class="tit1" >ENCUESTAS</h4>
<hr style="border: 3px solid green;width:350px;margin-left:0%;">
</div>
<div class="container">
    <div class="row d-flex justify-content-center" >
            <div class="col-4 d-flex justify-content-center">
                <div class="card text-center" style="margin-top:100px; width: 250px ;height: 200px;" >
                        <div class="card-body" >
                            <img src="{{asset('icons/noun_Sending email_526632.svg')}}" alt="imglge1"style= "width: 100px; height: 150px;">
                        </div>
                        <a class="btn btn-success" href="/enviar" role="button" style="font-size:25px; color:#fff; background-color:#005B28;">Enviar Encuesta</a>
                </div>
                
            </div>
            <div class="col-4 d-flex justify-content-center">
                <div class="card text-center"style="margin-top:100px; idth: 250px ;height: 200px;">
                    <div class="card-body">
                        <img src="{{asset ('icons/noun_report_414040.svg')}}" alt="imglge1"style= "width: 100px; height: 150px;">
                    </div>
                    <a class="btn btn-success" href="/menusecre/encuestaSecre/estadoencues" role="button" style="font-size:25px; color:#fff; background-color:#005B28;">Estado de Encuesta</a>
                </div>
            </div>
    </div>
</div>
@endsection