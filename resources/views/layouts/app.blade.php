<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{asset('css/style-self.css')}}">
    <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">

</head>
<body>
    <div id="app">
        <header class="navbar navbar-expand navbar-light bg-prueba">
            <div class="container">
    
                <input type="checkbox" id="check">
                <label for="check" class="main-nav_checkbtn">
                    <i class="icon ion-md-menu"></i>
                </label>
                
                <a class="mr-auto" href="{{ url('/') }}"><img src="{{ asset('images/logo_alluston.png') }}" height="80" alt="Logo de Alluston"></a>
                
                <ul class="navbar-nav">
                    {{-- <li class="nav-item">
                        <a class="btn btn-outline-primary m-1" href="{{ url('/') }}">Home</a>
                    </li> --}}
                    @guest
                    <li class="nav-item">
                        @if (Route::has('login'))
    
                            <a class="btn btn-outline-light m-1" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    
                        @endif
                    
                    </li>
                    <li class="nav-item">
                        @if (Route::has('register'))
                        
                            <a class="btn btn-outline-light m-1" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    
                        @endif
                    </li>
                    @else
                        <li class="nav-item ">
                            <a class="btn btn-outline-light m-1" href="{{route('user.show', Auth::user())}}">
                                {{ Auth::user()->name }}
                            </a>
                            
                        </li>

                        <li class="nav-item">    
                            <a class="btn btn-outline-light m-1" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                    
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                            </form> 
                        </li>
                    @endguest
                </ul>                               
            </div>
        </header>

        <nav class="navbar navbar-dark bg-dark float-left sidebar sticky-top" id="nav-sidebar">

            <ul class="navbar-nav min-vh-100 mt-3">
                <li class="nav-item arrow-back mx-auto">
                    <i class="mx-2 icon ion-md-arrow-back"></i>
                </li>
                <li class="nav-item">
                    <a class="nav-link m-2" href="{{route('user.index')}}"><i class = "icon ion-md-people"></i> Panel de administrador</a>
                </li>
                <li>
                    <a class="nav-link m-2" href="{{route('post.create')}}"><i class="icon ion-md-add"></i> Crear publicacion</a>
                </li>
                <li>
                    <a class="nav-link m-2" href="{{route('post.list')}}"><i class="icon ion-md-list"></i> Publicaciones</a>
                </li>
            </ul>
            <div class="arrow-back">
                
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <script src="{{asset('js/jquery-3.5.1.slim.min.js')}}"></script>
    <script src="{{asset('js/popper.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/sidebar.js')}}"></script>
</body>
</html>
