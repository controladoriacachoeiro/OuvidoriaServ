<h2>{{$dados->tipoFormulario}}</h2>

<p><b>Tipo de Cadastro:</b> {{$dados->tipoCadastro}}</p>
<p><b>Tipo de Manifestante:</b> {{$dados->tipoManifestante}}</p>
<?php 
    if($dados->tipoCadastro != "Anônimo"){
        echo "<p><b>Nome do Denunciante:</b> " . $dados->nomeDenunciante . "</p>";
    }
?>
<p><b>E-mail:</b> {{$dados->email}}</p>
<p><b>Telefone Residencial:</b> {{$dados->telefoneResidencial}}</p>
<p><b>Telefone Celular:</b> {{$dados->telefoneCelular}}</p>
<p><b>Nome do Denunciado:</b> {{$dados->nomeDenunciado}}</p>
<p><b>Logradouro:</b> {{$dados->logradouro}}</p>
<p><b>Número:</b> {{$dados->numero}}</p>
<p><b>Complemento:</b> {{$dados->complemento}}</p>
<p><b>Bairro:</b> {{$dados->bairro}}</p>
<p><b>Ponto de Referência:</b> {{$dados->pontoDeReferencia}}</p>
<p><b>Município:</b> {{$dados->municipio}}</p>
<p><b>Estado:</b> {{$dados->estado}}</p>
<p><b>Assunto:</b> {{$dados->assunto}}</p>
<p><b>Descrição:</b> {{$dados->descricao}}</p>