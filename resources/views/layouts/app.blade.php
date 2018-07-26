<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Ouvidoria Municipal de Cachoeiro de Itapemirim</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/ouvidoria.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</head>
<body>

    <div id="app" class="content-ouvidoria">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="http://leis.cachoeiro.es.gov.br:8081/portalcidadao/">
                    <img src="brasao_cachoeiro.jpg" alt="Brasão da Prefeitura Municipal de Cachoeiro de Itapemirim" class="img-responsive img-center" width="20%" height="20%">
                    <div class="btn-group-vertical">
                        <span style="font-size: 16px">Ouvidoria Municipal de</span>
                        <span style="font-size: 16px">Cachoeiro de Itapemirim</span>
                    </div>
                </a>
                
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown">
                            <a id="pesquisarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Manifestações <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="/solicitacao">Solicitação</a>
                                <a class="dropdown-item" href="/reclamacao">Reclamação</a>
                                <a class="dropdown-item" href="/elogio-sugestao">Elogio/Sugestão</a>
                                <a class="dropdown-item" href="/denuncia">Denúncia</a>
                                <a class="dropdown-item" href="/lai">LAI</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4" id="rodape">
            @yield('content')
        </main>
    </div>

    <!-- <footer class="border-top">
        <div class="container">
            <div class="row justify-content-center">
                <p>Desenvolvido pela equipe do Portal da Transparência - {{date('Y')}} - v-1.0</p>
            </div>
        </div>
    </footer> -->

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <script
        src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous">
    </script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js"></script>

    <script src="{{ asset('js/validator.min.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
        
    <script>

        $("#buttonVoltar").click(function() {
            window.location.href = "http://leis.cachoeiro.es.gov.br:8081/portalcidadao/";
        }); 

        var $seuCampoNome = $("#nome");
        $seuCampoNome.mask('Z',{translation: {'Z': {pattern: /[a-zA-ZáàâãéèêíìïóòôõöúçñÁÀÂÃÉÈÊÍÌÏÓÒÔÕÖÚÇÑ ]/, recursive: true}}});

        var $seuCampoTelefoneResidencial = $("#telefoneResidencial");
        $seuCampoTelefoneResidencial.mask('(00) 0000-0000');

        var $seuCampoTelefoneCelular = $("#telefoneCelular");
        $seuCampoTelefoneCelular.mask('(00) 00000-0000');

        var $seuCampoNumero = $("#numero");
        $seuCampoNumero.mask('0000000');


    </script>
    
    @yield('scriptAdd')
    
</body>
</html>
