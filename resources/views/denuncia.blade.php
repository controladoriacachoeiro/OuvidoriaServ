@extends('layouts.app')

@section('content')

    <div class="album py-5 bg-light">
        <h2 class="titulo-formulario">Denúncia</h2>
        <br>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card border border-info">
                        <div class="card-header alert alert-info border border-top-0 border-left-0 border-right-0 border-info"><b>Quando registrar uma denúncia?</b></div>
            
                        <div class="card-body"> 
                        <p class="texto-explicacao">
                            <span>- Sempre que presenciar algum tipo de atitude imprópria de servidores públicos ou uso indevido de recursos públicos;</span>   
                            <br>
                            <span>- Exemplo: solicitação de limpeza da rua foi realizada parcialmente.</span>
                            <br>
                            <span>- Caso deseje denunciar uma obra que está sendo realizada irregularmente;</span>
                            <br>
                            <span>- Quando verificar irregularidades em um estabelecimento comercial, como por exemplo, ausência de alvará de funcionamento, venda sem nota fiscal, som alto, entre outros;</span>         
                            <br>    
                            <span>- Caso presencie algum cidadão descartando lixos e entulhos irregularmente na rua ou em outro local público.</span>
                        </p>
                            
                            <p class="texto-explicacao">Em caso de dúvidas, entrar em contato com a Ouvidoria Geral Municipal, através do 156.</p>    
                        </div>
                    </div>
                    <br>

                    <form method="POST" id="idForm" action="/formularioDenuncia" enctype="multipart/form-data" data-toggle="validator" role="form">
                        @csrf

                        <input id="tipoFormulario" type="hidden" class="form-control" name="tipoFormulario" value="Denúncia">
                        <span style="color: #FF1F1F">* Campo de preenchimento obrigatório</span>
                        <div class="card border border-info">
                            <div class="card-header alert alert-info border border-top-0 border-left-0 border-right-0 border-info"><b>Dados do Denunciante</b></div>
            
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="tipoCadastroLabel" class="col-md-4 col-form-label text-md-right labelDescricao"><b>Tipo de Cadastro</b></label>

                                    <div class="col-md-6">
                                        <select id="tipoCadastro" class="form-control" name="tipoCadastro">
                                            <option value="Anônimo">Anônimo</option>
                                            <option value="Sigiloso">Sigiloso</option>
                                            <option value="Normal">Normal</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row" id="divTipoManifestante">
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

                                <div class="form-group row" id="divNomeDenunciante">
                                    <label for="nomeDenuncianteLabel" class="col-md-4 col-form-label text-md-right labelDescricao"><b>Nome<span style="color: #FF1F1F">*</span></b></label>

                                    <div class="col-md-6">
                                        <input id="nomeDenunciante" type="text" class="form-control" name="nomeDenunciante" placeholder="Digite seu nome completo." required>
                                        <div class="help-block with-errors alert-danger" style="font-size: 16px; text-align: center; margin-top: 5px; border-radius: 5px"></div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="emailLabel" class="col-md-4 col-form-label text-md-right labelDescricao"><b>E-mail<span style="color: #FF1F1F">*</span></b></label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control" name="email" value="" placeholder="Digite o seu e-mail." required>
                                        <div class="help-block with-errors alert-danger" style="font-size: 16px; text-align: center; margin-top: 5px; border-radius: 5px"></div>
                                        <p class="texto-explicacao-email">Precisamos do seu e-mail para informar o nº de protocolo deste registro. Ressaltamos que o seu endereço de e-mail será mantido em sigilo.</p>
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
                            <div class="card-header alert alert-info border border-top-0 border-left-0 border-right-0 border-info"><b>Dados do Denunciado</b></div>
            
                            <div class="card-body"> 
                                <div class="form-group row" id="divNomeDenunciado">
                                    <label for="nomeDenunciadoLabel" class="col-md-4 col-form-label text-md-right labelDescricao"><b>Nome<span style="color: #FF1F1F">*</span></b></label>

                                    <div class="col-md-6">
                                        <input id="nomeDenunciado" type="text" class="form-control" name="nomeDenunciado" placeholder="Digite o nome completo do denunciado." required>
                                        <div class="help-block with-errors alert-danger" style="font-size: 16px; text-align: center; margin-top: 5px; border-radius: 5px"></div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="logradouroLabel" class="col-md-4 col-form-label text-md-right labelDescricao"><b>Logradouro<span style="color: #FF1F1F">*</span></b></label>

                                    <div class="col-md-4">
                                        <input id="logradouro" type="text" class="form-control" name="logradouro" placeholder="Digite o endereço completo do denunciado." required>
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
                                        <input id="pontoDeReferencia" type="text" class="form-control" name="pontoDeReferencia" placeholder="Digite o ponto de referência." required>
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
                            </div>
                        </div>
                    
                        <br>
                        
                        <div class="card border border-info">
                            <div class="card-header alert alert-info border border-top-0 border-left-0 border-right-0 border-info"><b>Denúncia</b></div>
            
                            <div class="card-body"> 

                                <div class="form-group row">
                                    <label for="assuntoLabel" class="col-md-4 col-form-label text-md-right labelDescricao"><b>Assunto</b></label>

                                    <div class="col-md-6">
                                        <select id="assunto" class="form-control" name="assunto">
                                            <option value="Fiscalização">Fiscalização</option>
                                            <option value="Irregularidades em contratos/licitações">Irregularidades em contratos/licitações</option>
                                            <option value="Processo Seletivo">Processo Seletivo</option>
                                            <option value="Conduta Irregular de Servidor">Conduta Irregular de Servidor</option>
                                            <option value="Uso irregular de Bens Públicos">Uso irregular de Bens Públicos</option>
                                            <option value="Abuso de Autoridade">Abuso de Autoridade</option>
                                            <option value="Acúmulo Ilegal de Cargos">Acúmulo Ilegal de Cargos</option>
                                            <option value="Assédio Moral">Assédio Moral</option>
                                            <option value="Cadastro irregular do Projeto Minha Casa Minha Vida">Cadastro irregular do Projeto Minha Casa Minha Vida</option>
                                            <option value="Outro">Outro</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="descricaoLabel" class="col-md-4 col-form-label text-md-right labelDescricao"><b>Descrição<span style="color: #FF1F1F">*</span></b></label>

                                    <div class="col-md-6">
                                        <textarea class="form-control" id="descricao" name="descricao" rows="3" placeholder="Digite a descrição." required></textarea>
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

                            <small>É importante que todas as informações sejam digitadas corretamente, para não comprometer o andamento da denúncia.</small>
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

        $(document).ready(function () { 
            if($('#tipoCadastro').val() == "Anônimo"){
                $("#divNomeDenunciante").attr("hidden", "true");
                $("#nomeDenunciante").removeAttr("required");
            } else {
                $("#divNomeDenunciante").removeAttr("hidden");
                $("#nomeDenunciante").attr("required", "true");
            }
        });

        $("#tipoCadastro").change(function() {
            if($('#tipoCadastro').val() == "Anônimo"){
                $("#divNomeDenunciante").attr("hidden", "true");
                $("#nomeDenunciante").removeAttr("required");
            } else {
                $("#divNomeDenunciante").removeAttr("hidden");
                $("#nomeDenunciante").attr("required", "true");
            }
        });

        var $seuCampoNomeDenunciante = $("#nomeDenunciado");
        $seuCampoNomeDenunciante.mask('Z',{translation: {'Z': {pattern: /[a-zA-ZáàâãéèêíìïóòôõöúçñÁÀÂÃÉÈÊÍÌÏÓÒÔÕÖÚÇÑ ]/, recursive: true}}});

        var $seuCampoNomeDenunciado = $("#nomeDenunciado");
        $seuCampoNomeDenunciado.mask('Z',{translation: {'Z': {pattern: /[a-zA-ZáàâãéèêíìïóòôõöúçñÁÀÂÃÉÈÊÍÌÏÓÒÔÕÖÚÇÑ ]/, recursive: true}}});

        //Populando o select de bairro
        var option = "";
        for(var i = 0; i < arrayBairros.length; i++){
            option = option + "<option value='" + arrayBairros[i] + "'>"+arrayBairros[i]+"</option>";                
        }
        
        $('#bairro').html(option).show();

    </script>
@endsection
