<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContatoEmail;
use Storage;

class FormularioController extends Controller
{
    public function formularioSolicitacao(Request $request){
        // dd($request);
        $files = $request->file('file');
        
        if (!empty($files)){
            foreach ($files as $file){
                if($file->getClientSize() > 15728640){
                    // limitando em 15 MB os arquivos
                    return redirect('/home')->with('message', 'Arquivo grande demais para ser enviado!');
                }
            }
        }

        $regras = [
            'nome' => 'required',
            'email' => 'required',
            'logradouro' => 'required',
            'pontoDeReferencia' => 'required',
            'descricao' => 'required',
        ];

        $mensagens = [
            'nome.required' => 'Nome é obrigatório',
            'email.required' => 'E-mail é obrigatório',
            'logradouro.required' => 'Logradouro é obrigatório',
            'pontoDeReferencia.required' => 'Ponto de Referência é obrigatório',
            'descricao.required' => 'Descrição é obrigatória',
        ];

        $request->validate($regras, $mensagens);

        Mail::to('ouvidoria@cachoeiro.es.gov.br')->send(new ContatoEmail($request));

        return redirect('/home')->with('message', 'Em até 48h você receberá um e-mail com o número de protocolo deste Registro.');
    }

    public function formularioReclamacao(Request $request){
        $files = $request->file('file');
        
        if (!empty($files)){
            foreach ($files as $file){
                if($file->getClientSize() > 15728640){
                    // limitando em 15 MB os arquivos
                    return redirect('/home')->with('message', 'Arquivo grande demais para ser enviado!');
                }
            }
        }

        if($request->dataIda != null){
            $request->dataIda = $this->ajeitaData($request->dataIda);
        }

        $regras = [
            'email' => 'required',
            'numeroProtocolo' => 'required',
            'descricao' => 'required',
        ];

        $mensagens = [
            'email.required' => 'E-mail é obrigatório',
            'numeroProtocolo.required' => 'O número do protocolo é obrigatório',
            'descricao.required' => 'Descrição é obrigatória',
        ];

        $request->validate($regras, $mensagens);

        Mail::to('ouvidoria@cachoeiro.es.gov.br')->send(new ContatoEmail($request));

        return redirect('/home')->with('message', 'Em até 48h você receberá um e-mail com o número de protocolo deste Registro.');
    }

    public function formularioDenuncia(Request $request){
        $files = $request->file('file');
        
        if (!empty($files)){
            foreach ($files as $file){
                if($file->getClientSize() > 15728640){
                    // limitando em 15 MB os arquivos
                    return redirect('/home')->with('message', 'Arquivo grande demais para ser enviado!');
                }
            }
        }

        $regras = [
            'email' => 'required',
            'nomeDenunciado' => 'required',
            'logradouro' => 'required',
            'pontoDeReferencia' => 'required',
            'descricao' => 'required',
        ];

        $mensagens = [
            'email.required' => 'E-mail é obrigatório',
            'nomeDenunciado' => 'O Nome do denunciado é obrigatório',
            'logradouro.required' => 'Logradouro é obrigatório',
            'pontoDeReferencia.required' => 'Ponto de Referência é obrigatório',
            'descricao.required' => 'Descrição é obrigatória',
        ];

        $request->validate($regras, $mensagens);

        Mail::to('ouvidoria@cachoeiro.es.gov.br')->send(new ContatoEmail($request));

        return redirect('/home')->with('message', 'Em até 48h você receberá um e-mail com o número de protocolo deste Registro.');
    }

    public function formularioElogioSugestao(Request $request){

        $regras = [
            'nome' => 'required',
            'email' => 'required',
            'descricao' => 'required',
        ];

        $mensagens = [
            'nome.required' => 'Nome é obrigatório',
            'email.required' => 'E-mail é obrigatório',
            'descricao.required' => 'Descrição é obrigatória',
        ];

        $request->validate($regras, $mensagens);

        Mail::to('ouvidoria@cachoeiro.es.gov.br')->send(new ContatoEmail($request));

        return redirect('/home')->with('message', 'Em até 48h você receberá um e-mail com o número de protocolo deste Registro.');
    }

    public function formularioLAI(Request $request){

        $regras = [
            'nome' => 'required',
            'email' => 'required',
            'descricao' => 'required',
        ];

        $mensagens = [
            'nome.required' => 'Nome é obrigatório',
            'email.required' => 'E-mail é obrigatório',
            'descricao.required' => 'Descrição é obrigatória',
        ];

        $request->validate($regras, $mensagens);
       
        Mail::to('ouvidoria@cachoeiro.es.gov.br')->send(new ContatoEmail($request));

        return redirect('/home')->with('message', 'Em até 48h você receberá um e-mail com o número de protocolo deste Registro.');
    }

    public function formularioRecurso(Request $request){

        $regras = [
            'nome' => 'required',
            'email' => 'required',
            'numProtocolo' => 'required',
            'descricao' => 'required',
        ];

        $mensagens = [
            'nome.required' => 'Nome é obrigatório',
            'email.required' => 'E-mail é obrigatório',
            'numProtocolo.required' => 'O número de Protocolo é obrigatório',
            'descricao.required' => 'Descrição é obrigatória',
        ];

        $request->validate($regras, $mensagens);
       
        Mail::to('ouvidoria@cachoeiro.es.gov.br')->send(new ContatoEmail($request));

        return redirect('/home')->with('message', 'Seu recurso será analisado e respondido em até 30 dias.');
    }

    public function ajeitaData($data){

        $elemento = explode("-", $data);
        $ano = $elemento[0];
        $mes = $elemento[1];
        $dia = $elemento[2];
        $resultado = $dia . '/' . $mes . '/' . $ano;
        
        return $resultado;
    }

}
