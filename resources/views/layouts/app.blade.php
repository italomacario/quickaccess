<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">

    <!-- Styles -->
    <link href="{{ asset('default/css/fonts/icomoon/style.css') }}" rel="stylesheet">
    <link href="{{ asset('default/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('default/css/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('default/css/fontawesome-free/css/all.css') }}" rel="stylesheet">
    <link href="{{ asset('site/css/style.css') }}" rel="stylesheet">


</head>

<body>
    <div class="app">
        <div class="site-wrap" id="home-section">

            <div class="site-mobile-menu site-navbar-target">
                <div class="site-mobile-menu-header">
                    <div class="site-mobile-menu-close mt-3">
                        <span class="icon-close2 js-menu-toggle"></span>
                    </div>
                </div>
                <div class="site-mobile-menu-body"></div>
            </div>


            <div class="top-bar">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <a href="#" class=""><span class="mr-2  icon-envelope-open-o"></span> <span class="d-none d-md-inline-block">quickaccess@gmail.com</span></a>
                            <span class="mx-md-2 d-inline-block"></span>
                            <a href="#" class=""><span class="mr-2  icon-phone"></span> <span class="d-none d-md-inline-block">(81) 9 8672-4039</span></a>


                            <div class="float-right">

                                <a href="#" class=""><span class="d-none d-md-inline-block">Teste Seu
                                        Certificado</span><i class="fas fa-school pl-2"></i></a>

                            </div>

                        </div>

                    </div>

                </div>
            </div>

            <header class="site-navbar js-sticky-header site-navbar-target" role="banner">

                <div class="container">
                    <div class="row align-items-center position-relative">


                        <div class="site-logo">
                            <img src="{{ asset('storage/image/QA.png') }}" alt="" class="img-logo">
                            <a href="{{ route('home') }}"><span class="text-color">QuickAccess</a>
                        </div>

                        <div class="col-12">
                            <nav class="site-navigation text-right ml-auto" role="navigation">

                                <ul class="site-menu main-menu js-clone-nav ml-auto d-none d-lg-block">
                                    <li>
                                        <form id="frm-logout" action="{{ route('courses') }}" method="POST">
                                            @csrf
                                            <div class="input-group md-form form-sm form-2 pl-0" style="width: 200px;">

                                                <input class="form-control my-0 py-1 red-border" type="text" name="search" placeholder="Pesquisar...">
                                                <div class="input-group-append">
                                                    <span class="input-group-text red lighten-3" id="basic-text1"><i class="fas fa-search text-grey" aria-hidden="true"></i></span>

                                        </form>


                        </div>

                        </li>
                        <li><a href="{{ route('home') }}" class="nav-link">Home</a></li>
                        <li><a href="{{ route('courses') }}" class="nav-link">Cursos</a></li>
                        @if(Auth::check())
                        <li><a href="{{ route('my-courses') }}" class="nav-link">Meus Cursos</a></li>
                        <li>
                            <div class="btn-group nav-link">
                                <button type="button" class="dropdown-toggle button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{Auth::user()->name}}
                                </button>
                                <div class="dropdown-menu text-dark">
                                    <a class="dropdown-item" href="{{ route('profile') }}">Meu Perfil</a>
                                    <a class="dropdown-item" href="#">Minhas Duvidas</a>
                                    <a class="dropdown-item" href="#">Meus Cursos</a>
                                    <a class="dropdown-item" href="#">Assinatura</a>
                                    <hr>
                                    <form id="frm-logout" action="{{ route('logout') }}" method="POST">
                                        {{ csrf_field() }}
                                        <button type="submit" class="dropdown-item">Sair</button>
                                    </form>
                                </div>

                            </div>
                        </li>
                        @else
                        <li><a href="#" class="nav-link">Planos</a></li>
                        <li><a href="{{ route('login')}}" class="nav-link">Entrar</a></li>
                        <li><a href="{{ route('register')}}" class="nav-link">Cadastrar-se</a></li>
                        @endif
                        </ul>
                        </nav>
                    </div>

                    <div class="toggle-button d-inline-block d-lg-none mr-3">
                    <a href="#" class="site-menu-toggle js-menu-toggle text-black">
                        <span class="icon-menu h3"></span>
                    </a>
                </div>
                </div>

        </div>
    </div>

    </header>

    <main class="py-4">
        @yield('content')
    </main>

    <footer class="page-footer font-small footer1">
        <div class="footer-copyright text-center py-3 footer2">© 2020 Copyright: QuickAccess</a>
        </div>

    </footer>

    <script type="text/javascript" src="{{ asset('default/js/app.js') }}"></script>
    <script type="text/javascript" src="{{ asset('default/js/aos.js') }}"></script>
    <script type="text/javascript" src="{{ asset('default/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('default/js/jquery-3.3.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('default/js/jquery.animateNumber.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('default/js/jquery.easing.1.3.js') }}"></script>
    <script type="text/javascript" src="{{ asset('default/js/jquery.fancybox.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('default/js/jquery.sticky.js') }}"></script>
    <script type="text/javascript" src="{{ asset('default/js/jquery.waypoints.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('default/js/owl.carousel.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('default/js/popper.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('site/js/script.js') }}"></script>

</body>

</html>