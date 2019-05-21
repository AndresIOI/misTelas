<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Tienda Online - Mis Telas</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
    <link href={{asset("vendor/fontawesome-free/css/all.min.css")}} rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark navbar-laravel" style="background-color: #4fb783;">
            <div class="container-fluid">
                    <a class="navbar-brand" href="{{ url('/shop') }}">
                      Tienda Online - Mis Telas
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>
    
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav mr-auto">

                        </ul>
    
                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <a class="navbar-brand" href="{{ route('welcome') }}">
                                <i class="fas fa-home"></i>
                            </a> 
                                <a class="navbar-brand" href="{{ route('cart-show') }}">
                                    <i class="fas fa-shopping-cart" title="Carrito"></i>
                                </a>    
                                @if (Auth::user()->rol_id == 1 || Auth::user()->rol_id == 2 || Auth::user()->rol_id == 3 || Auth::user()->rol_id == 4 || Auth::user()->rol_id == 5 || Auth::user()->rol_id == 6)
                                <a class="navbar-brand" href="{{ route('principal') }}">
                                    <i class="fas fa-tachometer-alt" title="Panel de Administracion"></i>
                                </a>      
                                @endif
                                @if (Route::has('login'))
                                @auth

                                     <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                        <ul class="navbar-nav ml-auto">
                                          <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:white">
                                              <i class="fas fa-user-circle fa-fw" style="color:white"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right"  aria-labelledby="navbarDropdown" >
                                              <a class="dropdown-item" href="{{ route('user-profile') }}">{{Auth::user()->name}}</a>
                                              <a class="dropdown-item" href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                                {{ __('Salir') }}
                                              </a>
                                              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                              </form>
                                            </div>
                                          </li>
                                        </ul>
                                      </div>
                                @else
                                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                            <ul class="navbar-nav ml-auto">
                                              <li class="nav-item dropdown">
                                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:white">
                                                  <i class="fas fa-user-circle fa-fw" style="color:white"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right"  aria-labelledby="navbarDropdown" >
                                                  <a class="dropdown-item" href="{{ route('login') }}">
                                                    Iniciar Sesion
                                                  </a>
                                                  <a class="dropdown-item" href="{{ route('register') }}">
                                                        Registrarse
                                                      </a>
                                                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                    @csrf
                                                  </form>
                                                </div>
                                              </li>
                                            </ul>
                                          </div>
                                @endauth                                    
                                @endif
                        </ul>
                    </div>
            </div>    
            
        </nav>

        @yield('nav')


        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
