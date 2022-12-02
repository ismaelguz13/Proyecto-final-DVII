@extends('layouts.admin')

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
}</style>
@endsection

@section('navprin')
<nav class="navbar navbar-expand-sm  navbar-expand-md navbar-expand-lg d-flex justify-content-start navbar-light" style="font-family: Pill Gothic 600mg Semibd, sans-serif; background-color:  rgba(80, 78, 78, 0.233);">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="navbar-link anav" href="menuvice/mantenimiento"><img style="width: 25px; height: 25px;" src="{{asset('/icons/regreso.svg')}}" alt="home SVG"> Volver</a>
      </li>
    </ul>
  </nav><br>
  @endsection
@section('content')

<div class="container">
<div class="row justify-content-center"> 
  <div class="col=md=8">
      <div class="card">
          <div class="card-header justify-content-center " style="text-align:center;background-color: rgba(0, 91, 40, 1) !important; color: white;">
          <h5>Modificar y Eliminar Preguntas</h5>
        </div>

          <div class="container">
              <table class="table" id="dtpreguntas">
                  <thead>
                      <th width="5px">ID</th>
                      <th width="700px">PREGUNTA</th>
                      <th Style="text-align: center;">DETALLES</th>
                      <th Style="text-align: center;" >MODIFICAR</th>
                      <th Style="text-align: center;" >BORRAR</th>
                  </thead>
                  <tbody>

                  </tbody>
              </table>
          </div>
      </div>
  </div>
</div>

<!--Modal: modalConfirmDelete-->
<div class="modal fade" id="modalConfirmDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm modal-notify modal-danger" role="document">
    <!--Content-->
    <div class="modal-content text-center">
      <!--Header-->
      <div class="modal-header d-flex justify-content-center">
        <p class="heading"><h4 style="color: #ffff">Ventana de Confirmacion</h4></p>
      </div>

      <!--Body-->
      <div class="modal-body">
        <input type="hidden" id="idpreg">
        <p><strong>Una vez borrada la informacion, no podra recuperarse; Desea continuar?</strong></p>

      </div>

      <!--Footer-->
      <div class="modal-footer flex-center justify-content-center">
        <a type="button" class="btn btn-danger waves-effect" data-dismiss="modal" style="color:white"><strong>No</strong></a>
        <button  id="btneliminar" onClick="eliminaryes(idpreg)" class="btn  btn-outline-danger" ><strong>Sí</strong></button>
      </div>
    </div>
    <!--/.Content-->
  </div>
</div>
<!--Modal: modalConfirmDelete-->
<br>
</div>
@endsection

@section('scripts')
<script
  src="https://code.jquery.com/jquery-3.5.1.min.js"
  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
  crossorigin="anonymous"></script>
<script src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<script src="{{ asset('js/datatablef.js')}}"></script>
@endsection
