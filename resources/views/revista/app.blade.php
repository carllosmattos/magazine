<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="ScreenOrientation" name="viewport" content="width=device-width, initial-scale=1, autoRotate:disabled">

    <title>@yield('title') - Revista Viver São José</title>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Styles -->
</head>

<body>
    <nav class="navbar navbar-default">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div style="margin-bottom: 20px;" class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/revista/home"><img style="width: 30%;" src="{{URL::asset('favicon.ico')}}" alt=""></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="@yield('home')"><a href="/revista/home">Home</a></li>
                    <li class="@yield('institucional')"><a href="/revista/institucional">Institucional</a></li>
                    <li class="@yield('todos')"><a href="/revista/listar-artigos/todos">Artigos</a></li>
                    <!-- <li class="@yield('galeria')"><a href="/revista/galeria/#galeria-fotos">Galeria</a></li> -->
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Galerias <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="/revista/galeria-arte">Galeria de arte</a></li>
                            <li class="divider"></li>
                            <li><a href="/revista/galeria-fotos">Galeria de fotos</a></li>
                        </ul>
                    </li>
                    <li class="@yield('regras-da-revista')"><a href="/revista/regras">Submissão de trabalhos</a></li>
                </ul>
            </div>
            </ul>
        </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>

    @yield('content')

    <p class="pull-right back-top"><a href="#">&#9757; Topo</a></p>
    <footer>
        <div class="col-xs-12 col-sm-12 foot spotlight-content">
            <div class="col-xs-12 col-lg-4">
                <div class="footer-brand">
                    <a class="footer-brand" href="#">
                        <img style="width: 50%;" src="http://10.14.1.21:8177/uploads/posts/foto_2021-01-28_12-44-02.png" alt="">
                    </a>
                </div>
            </div>
            <div class="col-xs-12 col-lg-3 col-md-6 footer-menu">
                <ul class="footer-menu-item">
                    <h4 style="color: #000; font-weight: 900;">MENU</h4>
                    <li><a href="/revista/home">HOME</a></li>
                    <li><a href="/revista/institucional">INSTITUCIONAL</a></li>
                    <li><a href="/revista/listar-artigos/todos">ARTIGOS</a></li>
                    <li><a href="#">GALERIA DE ARTE</a></li>
                    <li><a href="#">GALERIA DE FOTOS</a></li>
                    <li><a href="#">SUBMISSÃO DE TRABALHOS</a></li>
                </ul>
            </div>
            <div class="col-xs-12 col-lg-5 col-md-6">
                <ul class="footer-menu-item footer-contact">
                    <h4 style="color: #000; font-weight: 900;">CONTATO</h4>
                    <li><a><span style="color: #fff; font-weight: bold;">EMAIL: </span>hsjimprensa@gmail.com</a></li>
                    <li><a><span style="color: #fff; font-weight: bold;">TELEFONE: </span>3101.2371</a></li>
                    <li><a><span style="color: #fff; font-weight: bold;">ENDEREÇO: </span>Rua Nestor Barbosa, 315 - Parquelândia, CEP: 60.455-610 - Fortaleza/Ce</a></li>
                </ul>
            </div>
            <div class="col-xs-12 col-lg-12">
                <hr style="color:#f00; background-color: #fff; height: 1px; border: 0;">
                <div class="row">
                    <div class="col-xs-12 col-lg-4">
                        <a class="footer-brand" href="#">
                            <img style="width: 50%;" src="http://10.14.1.21:8177/uploads/posts/foto_2021-01-28_13-04-39.png" alt="">
                        </a>
                    </div>
                    <div class="col-xs-12 col-lg-8">
                        <p align="center" class="copy">© 2021 Company, Inc. | GOVERNO DO ESTADO DO CEARÁ
                            TODOS OS DIREITOS RESERVADOS
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>