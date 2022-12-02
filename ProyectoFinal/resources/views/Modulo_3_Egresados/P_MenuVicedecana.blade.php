@extends('layouts.admin')


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
<br>
<h4 class="tit1" >Menú</h4>
<hr style="border: 3px solid green;width:350px;margin-left:0%;">
</div>
<div class="container">
    <div class="row d-flex justify-content-center" >
            <div class="col-4 d-flex justify-content-center">
                <div class="card text-center" style="margin-top:100px; width: 250px ;height: 200px;">
                        <div class="card-body" >
                            <img src="{{asset ('icons/noun_edit_1166304.svg')}}" alt="encuestas" style= "width: 100px; height: 150px;">
                        </div>
                        <a class="btn btn-success" href="/menuvice/mantenimiento" role="button" style="font-size:25px; color:#fff; background-color:#005B28;">   Mantenimiento  </a>
                </div>
                
            </div>
            <div class="col-4 d-flex justify-content-center">
                <div class="card text-center"style="margin-top:100px; width: 250px ;height: 200px;">
                    <div class="card-body">
                        <img src="{{asset ('icons/noun_report_414042.svg')}}" alt="imglge1" style= "width: 100px; height: 150px;">
                    </div>
                    <a class="btn btn-success" href="/menuvice/menureportes" role="button" style="font-size:25px; color:#fff; background-color:#005B28;">Reportes</a>
                </div>
            </div>
    </div>
</div>
@endsection