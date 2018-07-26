@extends('layouts.app')

@section('content')

    <div class="album py-5 bg-light">
        <h2 class="titulo-formulario">Solicitação</h2>
        <br>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                   
                    <div class="card border border-info">
                        <div class="card-header alert alert-info border border-top-0 border-left-0 border-right-0 border-info"><b>Quando registrar uma solicitação?</b></div>
            
                        <div class="card-body"> 
                            <p class="texto-explicacao">Sempre que for necessário solicitar algum serviço público relacionado a melhorias para o bem estar da população. 
                                <br>
                                <span>Exemplo: solicitar uma limpeza de via, capina, poda de árvore em via pública.</span>
                            </p>   

                            <p class="texto-explicacao">Em caso de dúvidas, entrar em contato com a Ouvidoria Geral Municipal, através do 156.</p>                         
                            
                        </div>
                    </div>
                    <br>
                    <form method="POST" id="idForm" action="/formularioSolicitacao" enctype="multipart/form-data" data-toggle="validator" role="form">
                        @csrf

                        <input id="tipoFormulario" type="hidden" class="form-control" name="tipoFormulario" value="Solicitação">
                        <span style="color: #FF1F1F">* Campo de preenchimento obrigatório</span>
                        <div class="card border border-info">
                            <div class="card-header alert alert-info border border-top-0 border-left-0 border-right-0 border-info"><b>Dados Pessoais</b></div>
            
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
                            </div>
                        </div>

                        <br>
<!-- 
                        <fieldset style="border: 1px solid #3333FF; margin: 1em 0; padding: 0.3em 1em 1em 1em; line-height: 1.5em; width: auto; background-color: #fff; border-radius: 3px; ">asdasdas

                            <legend style="background-color: #fff;
                            padding: 0 0.5em;
                            font-size: 85%;
                            font-weight: bold;
                            color: #555;
                            border-radius: 3px;
                            white-space: normal;">aaaa</legend>
                        </fieldset> -->

                        <div class="card border border-info">
                            <div class="card-header alert alert-info border border-top-0 border-left-0 border-right-0 border-info"><b>Solicitação</b></div>
            
                            <div class="card-body"> 
                                <div class="form-group row">
                                    <label for="logradouroLabel" class="col-md-4 col-form-label text-md-right labelDescricao"><b>Logradouro<span style="color: #FF1F1F">*</span></b></label>

                                    <div class="col-md-4">
                                        <input id="logradouro" type="text" class="form-control {{ $errors->has('logradouro') ? 'is-invalid' : '' }}" name="logradouro" placeholder="Digite o seu endereço completo." required>
                                        <small class="text-danger">{{ $errors->first('logradouro') }}</small>
                                        <div class="help-block with-errors alert-danger" style="font-size: 16px; text-align: center; margin-top: 5px; border-radius: 5px"></div>
                                    </div>

                                    <label for="numeroLabel" class="col-md-2 col-form-label text-md-right labelDescricao"><b>Número</b></label>

                                    <div class="col-md-2">
                                        <input id="numero" type="text" class="form-control" name="numero" placeholder="nº">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="complementoLabel" class="col-md-4 col-form-label text-md-right labelDescricao"><b>Complemento</b></label>

                                    <div class="col-md-6">
                                        <input id="complemento" type="text" class="form-control" name="complemento" placeholder="Digite o complemento.">      
                                    </div>
                                </div>    

                                <div class="form-group row">
                                    <label for="bairroLabel" class="col-md-4 col-form-label text-md-right labelDescricao"><b>Bairro</b></label>

                                    <div class="col-md-6">
                                        <select id="bairro" class="form-control" name="bairro">
                                        
                                        </select>
                                    </div>
                                </div>    
                                
                                <div class="form-group row">
                                    <label for="pontoDeReferenciaLabel" class="col-md-4 col-form-label text-md-right labelDescricao"><b>Ponto de Referência<span style="color: #FF1F1F">*</span></b></label>

                                    <div class="col-md-6">
                                        <input id="pontoDeReferencia" type="text" class="form-control {{ $errors->has('pontoDeReferencia') ? 'is-invalid' : '' }}" name="pontoDeReferencia" placeholder="Digite o ponto de referência." required>
                                        <small class="text-danger">{{ $errors->first('pontoDeReferencia') }}</small>
                                        <div class="help-block with-errors alert-danger" style="font-size: 16px; text-align: center; margin-top: 5px; border-radius: 5px"></div>
                                    </div>
                                </div>    

                                <div class="form-group row">
                                    <label for="municipioLabel" class="col-md-4 col-form-label text-md-right labelDescricao"><b>Município</b></label>

                                    <div class="col-md-6">
                                        <select id="municipio" class="form-control" name="municipio">
                                            <option value="Cachoeiro de Itapemirim">Cachoeiro de Itapemirim</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="estadoLabel" class="col-md-4 col-form-label text-md-right labelDescricao"><b>Estado</b></label>

                                    <div class="col-md-6">
                                        <select id="estado" class="form-control" name="estado">
                                            <option value="Espírito Santo">Espírito Santo</option>
                                        </select>
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

                                <div class="form-group row">
                                    <label for="fileLabel" class="col-md-4 col-form-label text-md-right labelDescricao"><b>Anexo</b></label>

                                    <div class="col-md-6">
                                        <input type="file" name="file[]" class="{{ $errors->has('file') ? 'is-invalid' : '' }}" style="padding-bottom: 10px">
                                        <small class="text-danger">{{ $errors->first('file') }}</small>
                                        <div class="help-block with-errors alert-danger" style="font-size: 16px; text-align: center; margin-top: 5px; border-radius: 5px"></div>
                                    </div>
                                </div>         

                                <div class="form-group row">
                                    <label for="fileLabel" class="col-md-4 col-form-label text-md-right labelDescricao"></label>

                                    <div class="col-md-6">
                                        <button type="button" class="btn btn-outline-info" id="addArquivo">Adicionar mais arquivos</button>
                                    </div>
                                </div>             

                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label for="lembreteLabel" class="col-md-4 col-form-label text-md-right"></label>

                            <small style="text-align: justify">É importante que todas as informações sejam digitadas corretamente, para não comprometer o andamento da solicitação.
                            </small>
                        </div>  

                        <div class="form-group row mb-0 justify-content-center">
                            <div>
                                <button type="button" class="btn btn-outline-info" id="buttonVoltar">Voltar</button>
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

        $("#addArquivo").click(function(){
            addField();
        });

        function addField(){
            $('form input:file').last().after($('<input type="file" name="file[]" class="file" style="padding-bottom: 10px">'));
        }

        //Populando o select de bairro
        var option = "";
        for(var i = 0; i < arrayBairros.length; i++){
            option = option + "<option value='" + arrayBairros[i] + "'>"+arrayBairros[i]+"</option>";                
        }
        
        $('#bairro').html(option).show();
    </script>
@endsection