@extends('layouts.admin')
@section('navprin')
<nav class="navbar navbar-expand-sm  navbar-expand-md navbar-expand-lg d-flex justify-content-start navbar-light" style="font-family: Pill Gothic 600mg Semibd, sans-serif; background-color:  rgba(80, 78, 78, 0.233);">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="navbar-link anav" href="/menusecre/encuestaSecre"><img style="width: 25px; height: 25px;" src="{{asset('/icons/regreso.svg')}}" alt="home SVG"> Volver</a>
      </li>
    </ul>
  </nav> <br>
  @endsection
@section('styles')
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
   
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <style>
    td.details-control {
    background: url('icons/details_open.png') no-repeat center center;
    cursor: pointer;
    }
    tr.details td.details-control {
    background: url('icons/details_close.png') no-repeat center center;
    }
    .modal-dialog.modal-notify.modal-danger .modal-header {
    background-color: #ff3547;
    .btn-color {
        border-color: #005B28 !important;
        background-color: #005B28 !important;
    }
    .btn-color:hover {
        background-color: rgba(0, 91, 40, 0.8) !important;
    }
}</style>
@endsection 
  <!--ENVIAR ENCUESTA -->

@section('content')

<form action="/enviar-encuesta" method="POST">
<div class="container">
<div class=" justify-content-center"style="margin-top:100px;" >
    @csrf
    <h2 class="tit1" > Enviar Encuesta </h2>
    <hr style="border: 3px solid green;width:350px;margin-left:0%;">
    <div class="form-group">
        <label for="id_usuario">Correos Registrados</label>
        <select name="id_usuario" id="id_usuario" class="form-control">
            @foreach($egresado as $egresados)
            <option value="{{$egresados->id_usuario}}">{{$egresados->correo}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group d-flex justify-content-between">
        <a href="/menusecre/encuestaSecre" class="btn btn-success btn-danger">Cancelar</a>

</button>
        <button id="enviar" class="btn btn-success btn-color">Enviar</button>
    </div>
    </div>
</div>
</form>




<!--Modal: modalConfirmDelete-->
<div class="modal fade" id="modalConfirmDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm modal-notify modal-danger" role="document">
    <!--Content-->
    <div class="modal-content text-center">
      <!--Header-->
      <div class="modal-header d-flex justify-content-center">
        <p class="heading"><h4 style="color: #ffff">Correo Enviado</h4></p>
      </div>

      <!--Body-->
      <div class="modal-body">
        <input type="hidden" id="idpreg">
        <p><strong>La encuesta ha sido enviada con exito</strong></p>

      </div>

      <!--Footer-->
      <div class="modal-footer flex-center justify-content-center">
        <a type="button" class="btn btn-danger waves-effect" data-dismiss="modal" style="color:white"><strong>LISTO</strong></a>
      </button>
      </div>
    </div>
    <!--/.Content-->
  </div>
</div>
<!--Modal: modalConfirmDelete-->
<br>
</div>
@endsection
<script>    
  
    function modalcmf(idpre){
        $('#modalConfirmDelete').modal({
        keyboard: false,
        backdrop: 'static'});z
    }

</script>