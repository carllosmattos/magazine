<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Viver São José</title>

    <script src = "{{asset ('/vendors/ckeditor/ckeditor.js')}}"></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <style media="screen">
        .avatar {
            border-radius: 50%;
            position: relative;
            top: -7px;
            float: left;
            left: -8px;
        }
    </style>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/revista/home') }}">
                        <img style="width: 30%;" src="{{URL::asset('favicon.ico')}}">
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                        <li><a href="{{ route('login') }}">Login</a></li>
                        <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                <img src="{{Auth::user()->avatar}}" class="avatar" width="36px" height="36px"> {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container">
            <div class="col-md-3">
                <ul class="list-group">
                    <li class="list-group-item">
                        <h4 class="text-center">Menu</h4>
                    </li>
                    @if(Auth::user()->level>=0)
                    <!-- <li class="list-group-item text-center">Usuário: Leitor</li> -->
                    <li class="list-group-item text-center"><a href="{{url('/painel/configuracoes')}}">Configurações</a></li>
                    @endif
                    @if(Auth::user()->level>=1)
                    <!-- <li class="list-group-item text-center">Usuário: Revisor</li> -->
                    <li class="list-group-item text-center">
                        <h4>Posts</h4>
                    </li>
                    <li class="list-group-item text-center"><a href="{{url('/painel/tags')}}">Tags</a></li>
                    <li class="list-group-item text-center"><a href="{{url('/painel/categorias')}}">Categorias</a></li>
                    <li class="list-group-item text-center"><a href="{{url('/painel/criar-artigo')}}">Criar Artigos</a></li>
                    <li class="list-group-item text-center"><a href="{{url('/painel/listar-artigos')}}">Listar Artigos</a></li>
                    <li class="list-group-item text-center"><a href="{{url('/painel/fotos')}}">Galeria</a></li>
                    @endif
                    @if(Auth::user()->level>=2)
                    <!-- <li class="list-group-item text-center">Usuário: Admin</li> -->
                    <li class="list-group-item text-center">
                        <h4>Usuários</h4>
                    </li>
                    <li class="list-group-item text-center"><a href="{{url('/painel/criar-usuario')}}">Criar Usuário</a></li>
                    <li class="list-group-item text-center"><a href="{{url('/painel/listar-usuarios')}}">Listar Usuários</a></li>
                    @endif
                </ul>
            </div>
            <div class="col-md-9">
                @yield('content')
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>