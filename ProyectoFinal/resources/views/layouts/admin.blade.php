<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>@yield('title')</title>

  <!-- Scripts -->
  <script url="js/app.js" defer></script>
  <script url="js/bootstrap.min.js"></script>
  @yield('scripts')

  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">

  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <style>
    .anav{
    color: black;
    font-family: "Pill Gothic 600mg Semibd", sans-serif;
    }
  </style>
  @yield('styles')
</head>
<!-- UTP HEADER -->
<header style="background-image: url(/imagenes/headerutp.jpg); background-repeat: no-repeat; background-size: cover; padding: 8.3%; ">
</header>
<nav>
  <!--NAV NAME -->
  <nav class="navbar navbar-light-sm navbar-light-md navbar-light-lg" style="background-color:#005B28;">
      <!-- Navbar content -->
      <div class="col">
      <a class="navbar-brand-md" style="color:#fff; font-size:16px;">{{$texto ?? '' ?? ''}}<a>
    </div>
    <div class="col d-flex justify-content-center">
    <a class="navbar-brand-md" style="color: #fff; font-size:16px;">Gestión Encuesta a Egresados</a>
    </div>
    <div class="col d-flex justify-content-end" >
    <a class="navbar-brand-md" style="color: #fff; font-size:16px;" href="http://www.utp.ac.pa/"> Cerrar sesión </a>
    </div>
    </nav>
  </nav>
  <!-- NAV PRINCIPAL -->
@yield('navprin')
<body>
@yield('imgpub')

    @yield('content')
    
</body>

</html>