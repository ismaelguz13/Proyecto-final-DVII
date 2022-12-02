@extends('layouts.admin')
@section('navprin')
<nav class="navbar navbar-expand-sm  navbar-expand-md navbar-expand-lg d-flex justify-content-start navbar-light" style="font-family: Pill Gothic 600mg Semibd, sans-serif; background-color:  rgba(80, 78, 78, 0.233);">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="navbar-link anav" href="{{$url ?? '' }}"><img style="width: 25px; height: 25px;" src="{{asset('/icons/regreso.svg')}}" alt="home SVG"> Volver</a>
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
@section('styles')
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
@endsection

@section('content')
<div class="col d-block " style="margin-left:-21rem;margin-top:-5rem">
<h4 class="tit1" >Estado de Encuestas</h4>
<hr style="border: 3px solid green;width:350px;margin-left:0%;">
</div>
    <div class="row"style="margin-left:-55rem;">
        <!--Data Table-->
        <div class="col">
            <div class="row justify-content-center"> 
                <div class="col=md=8">
                    <div class="card">
                        <div class="card-header" style="text-align: center; background-color: rgba(0, 91, 40, 1) !important; color: white;"><h4>Estado de Encuesta</h4>    </div>

                        <div class="container">
                            <table class="table" id="dtpreguntas">
                                <thead>
                                    <th>ID</th>  
                                    <th style="width:300px;text-align: center">Correo Electronico</th>
                                    <th>Estado</th>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
<br>


@endsection

@section('scripts')
<script
  src="https://code.jquery.com/jquery-3.5.1.min.js"
  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
  crossorigin="anonymous"></script>
<script src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js" ></script>
<script> 
    $(document).ready( function () {
        $('#dtpreguntas').DataTable({ 
            ajax:{
                url: "{{url('allest')}}",
                method: "GET"
            },
            columns:[
                {data: 'id_egresado'},
                {data: 'correo'},
                {data: 'Estado'},
            ],
            language:{
                info: "_TOTAL_ registros",
                search: '<br><a style="color:white">hola</a>Buscar:',
                paginate:{
                    next:"Siguiente",
                    previous:"Anterior"
                },
                lengthMenu: '<br>Mostrar <select>'+
                        '<option value="10">10</option>'+
                        '<option value="30">30</option>'+
                        '<option value="-1">Todos</option>'+
                        '</select> registros por página',
                loadingRecords: "Cargando...",
                processing: "Procesando...",
                emptyTable: "No hay datos...",
                zeroRecords: "No hay coincidencias",
                infoEmpty: "",
                infoFiltered: ""
            },
            //Funcion para colorear la celda dependiendo del estado
            rowCallback:function(nRow, aData, iDisplayIndex, iDisplayIndexFull){
                console.log(aData);
                if(aData.Estado == "Respondida"){
                    $($(nRow).find("td")[2]).css("background-color","#3D9606");
                    $($(nRow).find("td")[2]).css('color', '#FFF');
                    $($(nRow).find("td")[2]).css('text-align', 'center');
                }else{
                    $($(nRow).find("td")[2]).css("background-color","#AF081C");
                    $($(nRow).find("td")[2]).css('color', '#FFF');
                    $($(nRow).find("td")[2]).css('text-align', 'center');
                }

            }
        });
    } );
</script>
@endsection
