@extends('layouts.app')

@section('content')
    
    <div class="album py-5 bg-light">
        @if (session('message'))
            <div class="container">
                <div class="row justify-content-md-center">
                    <div class="alert alert-danger" style="text-align: center">
                        {{ session('message') }}
                    </div>
                </div>
            </div>
            <br>
        @endif  
        <h2 style="text-align: center">Qual tipo de manifestação você deseja fazer?</h2>
        <br>
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-md-2">
                    <a href="/solicitacao" class="link" style="text-decoration: none">
                        <div class="card mb-2 box-shadow align-items-center bg-light border border-primary div-hover">
                            <i class="material-icons icone" style="font-size: 80px">mic</i>
                            <div class="card-body tamanho-div">
                                <p class="card-text texto-icone">Solicitação</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-2">
                    <a href="/reclamacao" class="link" style="text-decoration: none">
                        <div class="card mb-2 box-shadow align-items-center bg-light border border-primary div-hover">
                            <i class="material-icons icone" style="font-size: 80px">thumb_down</i>
                            <div class="card-body tamanho-div">
                                <p class="card-text texto-icone">Reclamação</p>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-2">
                    <a href="/elogio-sugestao" class="link" style="text-decoration: none">
                        <div class="card mb-2 box-shadow align-items-center bg-light border border-primary div-hover">
                            <i class="material-icons icone" style="font-size: 80px">thumb_up</i>
                            <div class="card-body tamanho-div">
                                <p class="card-text texto-icone">Elogio/Sugestão</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="row justify-content-md-center">    
                <div class="col-md-2">
                    <a href="/denuncia" class="link" style="text-decoration: none">
                        <div class="card mb-2 box-shadow align-items-center bg-light border border-primary div-hover">
                            <i class="material-icons icone" style="font-size: 80px">account_circle</i>
                            <div class="card-body tamanho-div">
                                <p class="card-text texto-icone">Denúncia</p>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-2">
                    <a href="/lai" class="link" style="text-decoration: none">
                        <div class="card mb-2 box-shadow align-items-center bg-light border border-primary div-hover">
                            <i class="material-icons icone" style="font-size: 80px">info_outline</i>
                            <!-- <img src="../storage/app/acesso_informacao.png" alt="" width="90px" height="90px"> -->
                            <div class="card-body tamanho-div" style="max-height: 110px">
                                <p class="card-text texto-icone">Lei de Acesso à Informação</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <!--  -->
            
        </div>
    </div>
  
@endsection

@section('scriptAdd')
    <script>
        $(".div-hover").hover(function(){
            $(this).removeClass("bg-light");
            $(this).removeClass("border-primary");
            $(this).addClass("alert-dark");
            $(this).addClass("border-dark");
            $(this).addClass("shadow rounded");

            if($(this).find(".icone").text() == "mic"){
                $(this).find(".icone").css("color", "#000080");
            } else if($(this).find(".icone").text() == "thumb_down"){
                $(this).find(".icone").css("color", "#5B5A5C");
            } else if($(this).find(".icone").text() == "thumb_up"){
                $(this).find(".icone").css("color", "#118202");
            } else if($(this).find(".icone").text() == "account_circle"){
                $(this).find(".icone").css("color", "#C11520");
            } else if($(this).find(".icone").text() == "info_outline"){
                $(this).find(".icone").css("color", "#DE8D0B");
            }

        }, function(){
            $(this).removeClass("alert-dark");
            $(this).removeClass("border-dark");
            $(this).removeClass("shadow rounded");
            $(this).addClass("bg-light");
            $(this).addClass("border-primary");
            $(this).find(".icone").css({"font-size": "80px", "color": "black"});
        }); 
        
    </script>
@endsection
