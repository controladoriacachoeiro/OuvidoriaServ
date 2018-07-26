@extends('layouts.app')

@section('content')

    <div class="album py-5 bg-light">
        <h2 class="titulo-formulario">Reclamação</h2>
        <br>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card border border-info">
                        <div class="card-header alert alert-info border border-top-0 border-left-0 border-right-0 border-info"><b>Quando registrar uma reclamação?</b></div>
            
                        <div class="card-body"> 
                            <p class="texto-explicacao">Caso você tenha registrado uma solicitação, denúncia ou pedido de informação na Ouvidoria, e considere que o atendimento não foi adequado.
                                <br>
                                <span>Exemplo: solicitação de limpeza da rua foi realizada parcialmente.</span>
                            </p>   

                            <p class="texto-explicacao">Em caso de dúvidas, entrar em contato com a Ouvidoria Geral Municipal, através do 156.</p>                         
                            
                        </div>
                    </div>
                    <br>

                    <form method="POST" id="idForm" action="/formularioReclamacao" enctype="multipart/form-data" data-toggle="validator" role="form">
                        @csrf

                        <input id="tipoFormulario" type="hidden" class="form-control" name="tipoFormulario" value="Reclamação">
                        <span style="color: #FF1F1F">* Campo de preenchimento obrigatório</span>
                        <div class="card border border-info">
                            <div class="card-header alert alert-info border border-top-0 border-left-0 border-right-0 border-info"><b>Reclamação</b></div>
            
                            <div class="card-body">

                                <div class="form-group row">
                                    <label for="emailLabel" class="col-md-4 col-form-label text-md-right labelDescricao"><b>E-mail<span style="color: #FF1F1F">*</span></b></label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control" name="email" placeholder="Digite o seu e-mail." required>
                                        <div class="help-block with-errors alert-danger" style="font-size: 16px; text-align: center; margin-top: 5px; border-radius: 5px"></div>
                                        <p class="texto-explicacao-email">Atenção: Precisamos do seu e-mail para informar o nº do protocolo desta reclamação.</p>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="numeroProtocoloLabel" class="col-md-4 col-form-label text-md-right labelDescricao"><b>Nº do Protocolo<span style="color: #FF1F1F">*</span></b></label>

                                    <div class="col-md-6">
                                        <input id="numeroProtocolo" type="text" class="form-control" name="numeroProtocolo" placeholder="Digite o seu número de protocolo." required>
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

                            <small style="text-align: justify">É importante que todas as informações sejam digitadas corretamente, para não comprometer o andamento da reclamação.</small>
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

    </script>
@endsection