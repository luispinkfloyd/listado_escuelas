<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Listado de Escuelas</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('style')
    <style>
		.col-sm-auto {
			 width: auto;
			 padding-right: 50px;     
		}
		
		.bordeado{
			border: 1px #FF0004 dotted;	
		}
		
		.div-boton-filtros{
		  width: 100%;
		  display: flex;
		  justify-content: center;
		  margin:auto;
		}
	</style> 
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel" style="background-color:#5c7893">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                	<img src="{{ asset('img/untref.png')}}" height="50" class="d-inline-block align-top" style="padding-right:10px">
                </a>
                <a class="navbar-brand" href="{{ url('/') }}" style="color:#FFFFFF">
                	<h3><b>Listado de Escuelas<br>CABA Conurbano</b></h3>
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
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                            	<a class="btn btn-outline-success btn-sm d-inline-block align-top" href="{{ route('login') }}" style="margin:5px 10px 0px 5px">{{ __('Iniciar Sesión') }}</a>
                            @if (Route::has('register'))
                            	<a class="btn btn-outline-info btn-sm d-inline-block align-top" href="{{ route('register') }}" style="margin:5px 0px 0px 10px">{{ __('Registrarse') }}</a>
                            @endif
                            </li>
                        @else
                            <li class="nav-item dropdown" style="padding-top:10px">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre style="color:#FFFFFF">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Cerrar Sesión') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    @yield('script')
</body>
</html>
