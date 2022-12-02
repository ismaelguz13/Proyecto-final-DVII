    <!doctype html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">

      <!-- CSRF Token -->
      <meta name="csrf-token" content="{{ csrf_token() }}">

      <title>@yield('title')</title>



      <!-- Fonts -->
      <link rel="dns-prefetch" href="//fonts.gstatic.com">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
      <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
      <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
      <!-- Styles -->
      @yield('styles')
      <style>
        .anav {
          color: black;
          font-family: "Pill Gothic 600mg Semibd", sans-serif;
          font-weight:bold;
        }

        .btn-black {
          background-color: #005B28 !important;
          color: #fff;
          display: inline-block;
          text-align: center;
          font-size: 16px;
          width: 40%;
          height: 45px;
          font-family: "Pill Gothic 600mg Semibd", sans-serif;
        }

        .btn-action {
          background-color: #005B28 !important;
          color: #fff;
          display: inline-block;
          text-align: center;
          width: 100%;
          height: 45px;
          font-family: "Pill Gothic 600mg Semibd", sans-serif;
        }
      </style>

      <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <!-- UTP HEADER -->
    <header>
      <img src="{{asset('imagenes/headerutp.jpg')}}" width="100%">
    </header>
    <!--NAV NAME -->
    <nav class="navbar navbar-light-sm navbar-light-md navbar-light-lg" style="background-color:#005B28;">
      <!-- Navbar content -->
       @yield('rol')
      <a class="navbar-brand-sm" style="color: #fff">SISTEMA DE GESTIÓN DE ENCUESTA DE LA FISC</a>
<!-------Referencia Cerrar Sesión--------->
<a type ="submit" class="navbar-brand-sm"
style="color: #fff" 
data-toggle="modal" 
data-target="#cerrar_sesion">
Cerrar Sesión</a> 

<!-----------MODAL CERRAR SESION--------->

<div id="cerrar_sesion" class="modal fade" role="dialog">
<div class="modal-dialog">
  <!-- Modal Contenedor-->
  <div class="modal-content">
    <!-----------Encabezado-------->
      <div class="modal-header" style="background-color: #005B28">
        <h4 class="modal-title text-white" >Cerrar Sesión</h4> 
      </div>
      <!---------Contenido-------->
      <div class="modal-body">
        <br>
        <p class="text-center "><strong> ¿ Desea cerrar sesión ?</strong></p>   
        <br>     
      </div>
      <!--------Footer-------->
      <div class="modal-footer">
        <a type="submit" class="btn btn-danger mr-auto" style="color: #fff"  href="http://www.utp.ac.pa/">Si</a>
        <button type="button" class="btn btn-success" style="background-color: #005B28; border:#005B28;" data-dismiss="modal">No</button>
      </div>
  </div>
</div>
</div> 


    </nav>
    <!-- NAV PRINCIPAL -->

    <nav class="navbar navbar-expand-sm  navbar-expand-md navbar-expand-lg d-flex justify-content-center navbar-light sticky-top" style="font-family: Pill Gothic 600mg Semibd, sans-serif; background-color:  rgba(80, 78, 78, 0.233);">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link anav p-0 text-dark" href="{{route('nav_menu_admi')}}"><img src="{{asset('/icons/home.svg')}}" alt="home SVG"> INICIO</a>
        </li>
        @yield('nav')
      </ul>
    </nav> <br>

    <body>
      <div class="container-fluid">
        <div class=" d-flex flex-wrap justify-content-center row justify-content-md-justify">
          <div class="col-lg-4">
            <div class="d-flex flex-column mb-2 ">
              <img src="{{asset('imagenes/IMGWEB1.jpg')}}" alt="" width="100%" height="">
              <img src="{{asset('imagenes/IMGWEB.jpg')}}" alt="" width="100%" class="mt-2">
            </div>
          </div>

          <div class="col-lg-8">
            @yield('secciones')
          </div>
        </div>
      </div>
    </body>

    <script src="{{asset('js/app.js')}}"></script>
    <script src="{{asset('js/fontawesome_5-14-0.js')}}"></script>
    <script src="{{asset('js/jquery_min_3-5-1.js')}}"></script>
    <script src="{{asset('js/bootstrap_min_4-5-0.js')}}"></script>
    @yield('scripts')

    </html>
