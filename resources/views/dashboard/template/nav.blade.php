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
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

  <!-- Styles -->
  <link href="{{ asset('default/css/fontawesome-free/css/all.css') }}" rel="stylesheet">
  <link href="{{ asset('default/css/app.css') }}" rel="stylesheet">
  <link href="{{ asset('dashboard/css/style.css') }}" rel="stylesheet">

</head>

<body>
  <div class="page-wrapper chiller-theme" id="navbar">
    <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
      <i class="fas fa-bars" onclick="addToggled()"></i>
    </a>
    <nav id="sidebar" class="sidebar-wrapper">
      <div class="sidebar-content">
        <div class="sidebar-brand">
          <a href="{{ route('home') }}">QuickAccess</a>
          <div id="close-sidebar">
            <i class="fas fa-times" onclick="removeToggled()"></i>
          </div>
        </div>
        <div class="sidebar-header">
          <div class="row">
            <div class="col-lg-6">
              <div class="user-pic">
                <img class="img-responsive rounded-circle" src="{{asset('storage/user/'.Auth::user()->image)}}" alt="User picture">
              </div>
            </div>
            <div class="col-lg-6">
              <div class="user-info">
                <span class="user-name">{{Auth::user()->name}}
                </span>
                <span class="user-role">{{Auth::user()->accesslevel}}</span>

                <form id="frm-logout" action="{{ route('logout') }}" method="POST">
                  {{ csrf_field() }}
                  <button type="submit" class="button"><i class="fas fa-power-off"></i></button>
                </form>

              </div>
            </div>
          </div>
        </div>
        <!-- sidebar-header  -->

        <div class="sidebar-menu">
          <ul>
            <li class="header-menu">
              <span>Opções</span>
            </li>
            <li class="sidebar-dropdown">
              <a href="{{ route('dashboard') }}">
                <i class="fa fa-tachometer-alt"></i>
                <span>Dashboard</span>
              </a>
            </li>
            <li class="sidebar-dropdown">
              <a href="{{ route('course') }}">
                <i class="fa fa-tachometer-alt"></i>
                <span>Cadastrar Curso</span>
              </a>
            </li>
            <li class="sidebar-dropdown">
              <a href="{{ route('course.list') }}">
                <i class="fa fa-tachometer-alt"></i>
                <span>Listar Cursos</span>
              </a>
            </li>
            <li class="sidebar-dropdown">
              <a href="{{ route('module.list') }}">
                <i class="fa fa-tachometer-alt"></i>
                <span>Listar Modulos</span>
              </a>
            </li>
            <li class="sidebar-dropdown">
              <a href="{{ route('lesson.list') }}">
                <i class="fa fa-tachometer-alt"></i>
                <span>Listar Aulas</span>
              </a>
            </li>
            <li class="sidebar-dropdown">
              <a href="{{ route('user.list') }}">
                <i class="fa fa-tachometer-alt"></i>
                <span>Listar Usuarios</span>
              </a>
            </li>

          </ul>
        </div>

      </div>
    </nav>
    <main class="page-content">
      @yield('content')
    </main>
  </div>

  <script type="text/javascript" src="{{ asset('dashboard/js/script.js') }}"></script>
  <script type="text/javascript" src="{{ asset('default/js/app.js') }}"></script>
</body>

</html>