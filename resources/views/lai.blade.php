@extends('layouts.app')

@section('content')

    <div class="album py-5 bg-light">
        <h2 class="titulo-formulario">LAI - Lei de Acesso à Informação</h2>
        <br>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    
                    <div class="card border border-info">
                        <div class="card-header alert alert-info border border-top-0 border-left-0 border-right-0 border-info"><b>Pedido de Informação</b></div>
            
                        <div class="card-body"> 
                            <p class="texto-explicacao">Lei de Acesso à Informação nº 12.527/2011, garante a todo cidadão o direito de fazer pedidos de informações públicas. 
                                <br>
                                <span>Exemplo: você pode fazer um pedido de informação para saber sobre as atividades e projetos realizados por um órgão em determinado mês ou ano.</span>
                            </p>   

                            <p class="texto-explicacao">Em caso de dúvidas, entrar em contato com a Ouvidoria Geral Municipal, através do 156.</p>                         
                            
                        </div>
                    </div>
                    <br>

                    <form method="POST" id="idForm" action="/formularioLAI" data-toggle="validator" role="form">
                        @csrf

                        <input id="tipoFormulario" type="hidden" class="form-control" name="tipoFormulario" value="LAI">
                        <span style="color: #FF1F1F">* Campo de preenchimento obrigatório</span>
                        <div class="card border border-info">
                            <div class="card-header alert alert-info border border-top-0 border-left-0 border-right-0 border-info"><b>Dados Pessoais</b></div>
            
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="tipoManifestanteLabel" class="col-md-4 col-form-label text-md-right labelDescricao"><b>Tipo de Manifestante</b></label>

                                    <div class="col-md-6">
                                        <select id="tipoManifestante" class="form-control" name="tipoManifestante">
                                            <option value="Pessoa Física">Pessoa Física</option>
                                            <option value="Pessoa Jurídica">Pessoa Jurídica</option>
                                            <option value="Líder Comunitário">Líder Comunitário</option>
                                            <option value="Agente Político">Agente Político</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="nomeLabel" class="col-md-4 col-form-label text-md-right labelDescricao"><b>Nome Completo<span style="color: #FF1F1F">*</span></b></label>

                                    <div class="col-md-6">
                                        <input id="nome" type="text" class="form-control" name="nome" placeholder="Digite seu nome completo." required>
                                        <div class="help-block with-errors alert-danger" style="font-size: 16px; text-align: center; margin-top: 5px; border-radius: 5px"></div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="sexoLabel" class="col-md-4 col-form-label text-md-right labelDescricao"><b>Sexo</b></label>
        
                                    <div class="col-md-6">
                                        <select id="sexo" class="form-control" name="sexo">
                                            <option value="Masculino">Masculino</option>
                                            <option value="Feminino">Feminino</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="telefoneResidencialLabel" class="col-md-4 col-form-label text-md-right labelDescricao"><b>Telefone Residencial</b></label>

                                    <div class="col-md-6">
                                        <input id="telefoneResidencial" type="text" class="form-control" name="telefoneResidencial" placeholder="(XX) XXXX-XXXX">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="telefoneCelularLabel" class="col-md-4 col-form-label text-md-right labelDescricao" id="telefoneCelularLabel"><b>Telefone Celular</b></label>

                                    <div class="col-md-6">
                                        <input id="telefoneCelular" type="text" class="form-control" name="telefoneCelular" placeholder="(XX) XXXXX-XXXX">
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
                                    <label for="enderecoLabel" class="col-md-4 col-form-label text-md-right labelDescricao"><b>Endereço Completo</b></label>

                                    <div class="col-md-6">
                                        <input id="endereco" type="text" class="form-control" name="endereco" placeholder="Digite o seu endereço completo.">
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
                            </div>
                        </div>
                        
                        <br>
                        
                        <div class="card border border-info">
                            <div class="card-header alert alert-info border border-top-0 border-left-0 border-right-0 border-info"><b>Pedido de Informação</b></div>
            
                            <div class="card-body"> 
                                <div class="form-group row">
                                    <label for="descricaoLabel" class="col-md-4 col-form-label text-md-right labelDescricao"><b>Digite aqui o seu pedido de informação<span style="color: #FF1F1F">*</span></b></label>

                                    <div class="col-md-6">
                                        <textarea class="form-control" id="descricao" name="descricao" rows="3" placeholder="Digite o seu pedido." required></textarea>
                                        <div class="help-block with-errors alert-danger" style="font-size: 16px; text-align: center; margin-top: 5px; border-radius: 5px"></div>
                                    </div>
                                </div>      

                                <div class="form-group row">
                                    <label for="meioDesejadoLabel" class="col-md-4 col-form-label text-md-right labelDescricao"><b>Como você gostaria de receber as respostas?</b></label>

                                    <div class="col-md-6">
                                        <select id="meioDesejado" class="form-control" name="meioDesejado">
                                            <option value="E-mail">E-mail</option>
                                            <option value="Telefone Celular">Telefone Celular</option>
                                            <option value="Pessoalmente">Pessoalmente</option>
                                            <option value="Correspondência">Correspondência</option>
                                        </select>
                                    </div>
                                </div>                           
                                 
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label for="lembreteLabel" class="col-md-4 col-form-label text-md-right"></label>

                            <small style="text-align: justify">É importante que todas as informações sejam digitadas corretamente, para não comprometer o andamento da LAI.</small> 
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
        //Populando o select de bairro
        var option = "";
        for(var i = 0; i < arrayBairros.length; i++){
            option = option + "<option value='" + arrayBairros[i] + "'>"+arrayBairros[i]+"</option>";                
        }
        
        $('#bairro').html(option).show();

        $(document).ready(function () { 
            if($('#meioDesejado').val() == "Telefone Celular"){
                $("#telefoneCelular").attr("required", "true");
                $("#telefoneCelularLabel").append("<span style='color: #FF1F1F'>*</span>");
                
            } else {
                $("#telefoneCelular").removeAttr("required");
                $("#telefoneCelularLabel").html("<b>Telefone Celular</b>");
                
            }
        });

        $("#meioDesejado").change(function() {
            if($('#meioDesejado').val() == "Telefone Celular"){
                $("#telefoneCelular").attr("required", "true");
                $("#telefoneCelularLabel").append("<span style='color: #FF1F1F'>*</span>");
               
            } else {
                $("#telefoneCelular").removeAttr("required");
                $("#telefoneCelularLabel").html("<b>Telefone Celular</b>");
                
            }
        });
    </script>
@endsection