@extends('layouts.app')

@section('content')

    <div class="album py-5 bg-light">
        <h2 class="titulo-formulario">Elogio/Sugestão</h2>
        <br>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    
                    <div class="card border border-info">
                        <div class="card-header alert alert-info border border-top-0 border-left-0 border-right-0 border-info"><b>Elogios e Sugestões</b></div>
            
                        <div class="card-body"> 
                            <p class="texto-explicacao">
                                <span>Caso tenha ficado satisfeito com o  atendimento ou prestação de um serviço público, você poderá registrar um elogio para que possamos encaminhar ao servidor ou a equipe responsável.</span>   
                            </p>

                            <p class="texto-explicacao">
                                <span>Registrando uma sugestão, você compartilha ideias para melhorar a gestão pública municipal. Cada sugestão registrada é encaminhada para o setor relacionado ao assunto sugerido.</span>   
                            </p>

                            <p class="texto-explicacao">Em caso de dúvidas, entrar em contato com a Ouvidoria Geral Municipal, através do 156.</p>    
                        </div>
                    </div>
                    <br>

                    <form method="POST" id="idForm" action="/formularioElogioSugestao" data-toggle="validator" role="form">
                        @csrf

                        <input id="tipoFormulario" type="hidden" class="form-control" name="tipoFormulario" value="Elogio/Sugestão">
                        <span style="color: #FF1F1F">* Campo de preenchimento obrigatório</span>
                        <div class="card border border-info">
                            <div class="card-header alert alert-info border border-top-0 border-left-0 border-right-0 border-info"><b>Dados do Manifesto</b></div>
            
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="tipoEventoLabel" class="col-md-4 col-form-label text-md-right labelDescricao"><b>Tipo de Evento</b></label>

                                    <div class="col-md-6">
                                        <select id="tipoEvento" class="form-control" name="tipoEvento">
                                            <option value="Elogio">Elogio</option>
                                            <option value="Sugestão">Sugestão</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <br>

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
                                        <input id="nome" type="text" class="form-control" name="nome" placeholder="Digite seu nome completo." required>
                                        <div class="help-block with-errors alert-danger" style="font-size: 16px; text-align: center; margin-top: 5px; border-radius: 5px"></div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="emailLabel" class="col-md-4 col-form-label text-md-right labelDescricao"><b>E-mail<span style="color: #FF1F1F">*</span></b></label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control" name="email" value="" placeholder="Digite o seu e-mail." required>
                                        <div class="help-block with-errors alert-danger" style="font-size: 16px; text-align: center; margin-top: 5px; border-radius: 5px"></div>
                                        <p class="texto-explicacao-email">Precisamos do seu e-mail para informar o nº do protocolo deste registro.</p>
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
                        
                        <div class="card border border-info">
                            <div class="card-header alert alert-info border border-top-0 border-left-0 border-right-0 border-info"><b>Elogio/Sugestão</b></div>
            
                            <div class="card-body"> 
                                <div class="form-group row">
                                    <label for="descricaoLabel" class="col-md-4 col-form-label text-md-right labelDescricao"><b>Descrição<span style="color: #FF1F1F">*</span></b></label>

                                    <div class="col-md-6">
                                        <textarea class="form-control" id="descricao" name="descricao" rows="3" placeholder="Digite a descrição." required></textarea>
                                        <div class="help-block with-errors alert-danger" style="font-size: 16px; text-align: center; margin-top: 5px; border-radius: 5px"></div>
                                    </div>
                                </div>                           

                            </div>
                        </div>
                        <br>
                        <div class="form-group row justify-content-center">
                            <label for="lembreteLabel" class="col-md-4 col-form-label text-md-right"></label>

                            <small>É importante que todas as informações sejam digitadas corretamente, para não comprometer o andamento do elogio/sugestão.</small>
                            
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
