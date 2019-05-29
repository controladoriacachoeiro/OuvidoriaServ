@extends('layouts.app')

@section('content')

    <div class="album py-5 bg-light">
        <h2 class="titulo-formulario">Recurso</h2>
        <br>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                   
                    <div class="card border border-info">
                        <div class="card-header alert alert-info border border-top-0 border-left-0 border-right-0 border-info"><b>Quando entrar com um recurso?</b></div>
            
                        <div class="card-body"> 
                            <p class="texto-explicacao">Registre um recurso quando discordar da resposta recebida no seu protocolo.</p>
                        </div>
                    </div>
                    <br>
                    <form method="POST" id="idForm" action="/formularioRecurso" enctype="multipart/form-data" data-toggle="validator" role="form">
                        @csrf

                        <input id="tipoFormulario" type="hidden" class="form-control" name="tipoFormulario" value="Recurso">
                        <span style="color: #FF1F1F">* Campo de preenchimento obrigatório</span>
                        <div class="card border border-info">
                            <div class="card-header alert alert-info border border-top-0 border-left-0 border-right-0 border-info"><b>Dados</b></div>
            
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="tipoManifestanteLabel" class="col-md-4 col-form-label text-md-right labelDescricao"><b>Tipo de Manifestante</b></label>

                                    <div class="col-md-6">
                                        <select id="tipoManifestante" class="form-control" name="tipoManifestante">
                                            <option value="Pessoa Jurídica">Pessoa Jurídica</option>
                                            <option value="Pessoa Física">Pessoa Física</option>
                                            <option value="Líder Comunitário">Líder Comunitário</option>
                                            <option value="Agente Político">Agente Político</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="nomeLabel" class="col-md-4 col-form-label text-md-right labelDescricao"><b>Nome<span style="color: #FF1F1F">*</span></b></label>

                                    <div class="col-md-6">
                                        <input id="nome" type="text" class="form-control {{ $errors->has('nome') ? 'is-invalid' : '' }}" name="nome" placeholder="Digite seu nome completo." required>
                                        <small class="text-danger">{{ $errors->first('nome') }}</small>
                                        <div class="help-block with-errors alert-danger" style="font-size: 16px; text-align: center; margin-top: 5px; border-radius: 5px"></div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="emailLabel" class="col-md-4 col-form-label text-md-right labelDescricao"><b>E-mail<span style="color: #FF1F1F">*</span></b></label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" name="email" value="" placeholder="Digite o seu e-mail." required>
                                        <small class="text-danger">{{ $errors->first('email') }}</small>
                                        <div class="help-block with-errors alert-danger" style="font-size: 16px; text-align: center; margin-top: 5px; border-radius: 5px"></div>
                                        <p class="texto-explicacao-email">Atenção: Precisamos do seu e-mail para informar o nº do protocolo deste registro.</p>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="telefoneResidencialLabel" class="col-md-4 col-form-label text-md-right labelDescricao"><b>Telefone Residencial</b></label>

                                    <div class="col-md-6">
                                        <input id="telefoneResidencial" type="text" class="form-control" name="telefoneResidencial" placeholder="(XX) XXXX-XXXX">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="telefoneCelularLabel" class="col-md-4 col-form-label text-md-right labelDescricao"><b>Telefone Celular</b></label>

                                    <div class="col-md-6">
                                        <input id="telefoneCelular" type="text" class="form-control" name="telefoneCelular" placeholder="(XX) XXXXX-XXXX">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="numProtocoloLabel" class="col-md-4 col-form-label text-md-right labelDescricao"><b>Nº de Protocolo<span style="color: #FF1F1F">*</span></b></label>

                                    <div class="col-md-6">
                                        <input id="numProtocolo" type="text" class="form-control {{ $errors->has('protocolo') ? 'is-invalid' : '' }}" name="numProtocolo" placeholder="Digite o nº de protocolo da sua manifestação." required>
                                        <small class="text-danger">{{ $errors->first('numProtocolo') }}</small>
                                        <div class="help-block with-errors alert-danger" style="font-size: 16px; text-align: center; margin-top: 5px; border-radius: 5px"></div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="descricaoLabel" class="col-md-4 col-form-label text-md-right labelDescricao"><b>Descrição<span style="color: #FF1F1F">*</span></b></label>

                                    <div class="col-md-6">
                                        <textarea class="form-control {{ $errors->has('descricao') ? 'is-invalid' : '' }}" id="descricao" name="descricao" rows="3" placeholder="Digite a descrição." required></textarea>
                                        <small class="text-danger">{{ $errors->first('descricao') }}</small>
                                        <div class="help-block with-errors alert-danger" style="font-size: 16px; text-align: center; margin-top: 5px; border-radius: 5px"></div>
                                    </div>
                                </div>    
                            </div>
                        </div>

                        <br>
                        <div class="form-group row">
                            <label for="lembreteLabel" class="col-md-4 col-form-label text-md-right"></label>

                            <small style="text-align: justify">É importante que todas as informações sejam digitadas corretamente, para não comprometer o andamento do recurso.
                            </small>
                        </div>  

                        <div class="form-group row mb-0 justify-content-center">
                            <div>
                                <button type="button" class="btn btn-outline-info" id="buttonVoltar" hidden>Voltar</button>
                                <button type="submit" class="btn btn-outline-info">Enviar</button>
                            </div>
                        </div>      
                    </form>
                </div>
            </div>
        </div> 
    </div>

@endsection

@section('scriptAdd')

    <script src="{{ asset('dist/js/bairros.js') }}"></script>

    <script>

        // $("#addArquivo").click(function(){
        //     addField();
        // });

        // function addField(){
        //     $('form input:file').last().after($('<input type="file" name="file[]" class="file" style="padding-bottom: 10px">'));
        // }

        // //Populando o select de bairro
        // var option = "";
        // for(var i = 0; i < arrayBairros.length; i++){
        //     option = option + "<option value='" + arrayBairros[i] + "'>"+arrayBairros[i]+"</option>";                
        // }
        
        // $('#bairro').html(option).show();
    </script>
@endsection