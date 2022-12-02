<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/styles.css') }}">
    <!-- Styles -->
    <style>
    .anav{
    color: black;
    font-family: "Pill Gothic 600mg Semibd", sans-serif;
    }
    </style>
    
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">     
</head>
<!-- UTP HEADER -->
<header style="background-image: url(../imagenes/headerutp.jpg); background-repeat: no-repeat; background-size: cover; padding: 8.3%; ">
</header>
<!--NAV NAME -->
<nav class="navbar navbar-light" style="background-color:#005B28;">
  <!-- Navbar content -->
  @yield('navbar')
  <a href="http://www.utp.ac.pa/" class="text-white">CERRAR SESION</a>
</nav>
   <!-- NAV PRINCIPAL -->

<nav class="navbar navbar-expand-sm justify-content-center navbar-light sticky-top" style="background-color:  rgba(80, 78, 78, 0.233);">
  <ul class="navbar-nav">
    <!-- <li class="nav-item" >
      <a class="navbar-link anav" href="#SeccionA" > SECCION A </a>
    </li>
    <div Style="width: 50px;"></div>
    <li class="nav-item" >
      <a class="navbar-link anav" href="#SeccionB" > SECCION B </a>
    </li> -->
    @yield('seccion')
  </ul>
</nav>

<body style="background-image: url(../imagenes/WebBackground.jpg); background-repeat: no-repeat; background-size: cover;">
    <row class="container-fluid">
      <div class="col-12">
    @yield('content')
    </div>
    </row>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
</body>
</html>