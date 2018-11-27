<?php

namespace App\Http\Controllers\Demanda;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DemandaModel;
use App\Models\UsuarioDemandaModel;
use App\Models\UsuarioModel;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

use Storage;

class DemandaController extends Controller
{
     //GET
     public function ListarDemandas(){
        $dadosDb = DemandaModel::orderBy('codDemanda');
        $dadosDb->select('codDemanda', 'descricao', 'latitude', 'longitude', 'anonimato', 'complementoStatus', 'demanda.codCategoria', 'demanda.codUsuario', 'demanda.codAdministrador', 'demanda.codStatus', 'usuario.nome as nomeUsuario', 'administrador.nome as nomeAdministrador', 'categoria.nome as nomeCategoria', 'status.nome as nomeStatus', 'midia1', 'existe', 'naoExiste', 'data', 'hora');
        $dadosDb->join('usuario', 'demanda.codUsuario', '=', 'usuario.codUsuario');
        $dadosDb->join('administrador', 'demanda.codAdministrador', '=', 'administrador.codAdministrador');
        $dadosDb->join('categoria', 'demanda.codCategoria', '=', 'categoria.codCategoria');
        $dadosDb->join('status', 'demanda.codStatus', '=', 'status.codStatus');
        $dadosDb->where('demanda.codStatus', '<>', '6');
        $dadosDb->where('demanda.codStatus', '<>', '7');
        $dadosDb->where('demanda.codCategoria', '<>', '7');
        $dadosDb = $dadosDb->get();

        $arrayDataFiltro = [];        
        
        foreach ($dadosDb as $valor) {
            array_push($arrayDataFiltro, $valor);
        }

        $arrayDataFiltro = json_encode($arrayDataFiltro);
        $dadosDb = $arrayDataFiltro;

        return $dadosDb;
    }

    // POST
    public function ListarDemandasFeed(Request $request){
        $dadosDb = DemandaModel::orderBy('data', 'desc');
        $dadosDb->orderBy('hora', 'desc');
        $dadosDb->select('codDemanda', 'descricao', 'latitude', 'longitude', 'anonimato', 'complementoStatus', 'midia1', 'existe', 'naoExiste', 'data', 'hora', 'bairro', 'endereco', 'demanda.codAdministrador', 'demanda.codStatus', 'demanda.codUsuario', 'usuario.nome as nomeUsuario', 'administrador.nome as nomeAdministrador', 'categoria.nome as nomeCategoria', 'status.nome as nomeStatus');
        $dadosDb->join('usuario', 'demanda.codUsuario', '=', 'usuario.codUsuario');
        $dadosDb->join('administrador', 'demanda.codAdministrador', '=', 'administrador.codAdministrador');
        $dadosDb->join('categoria', 'demanda.codCategoria', '=', 'categoria.codCategoria');
        $dadosDb->join('status', 'demanda.codStatus', '=', 'status.codStatus');
        $dadosDb->where('demanda.codStatus', '<>', '6');
        $dadosDb->where('demanda.codStatus', '<>', '7');
        $dadosDb->where('demanda.codCategoria', '<>', '7');
        $dadosDb->limit($request->itensPorPagina);
        $dadosDb->offset($request->numPagina);

        $dadosDb = $dadosDb->get();       

        $arrayDataFiltro = [];        
        
        foreach ($dadosDb as $valor) {
            array_push($arrayDataFiltro, $valor);
        }

        $arrayDataFiltro = json_encode($arrayDataFiltro);
        $dadosDb = $arrayDataFiltro;

        return $dadosDb;
    }

    // POST
    public function ListarMinhasDemandas(Request $request){
        $dadosDb = DemandaModel::orderBy('data', 'desc');
        $dadosDb->orderBy('hora', 'desc');
        $dadosDb->select('codDemanda', 'descricao', 'latitude', 'longitude', 'anonimato', 'complementoStatus', 'midia1', 'existe', 'naoExiste', 'data', 'hora', 'bairro', 'endereco', 'demanda.codAdministrador', 'demanda.codStatus', 'demanda.codUsuario', 'usuario.nome as nomeUsuario', 'administrador.nome as nomeAdministrador', 'categoria.nome as nomeCategoria', 'status.nome as nomeStatus');
        $dadosDb->join('usuario', 'demanda.codUsuario', '=', 'usuario.codUsuario');
        $dadosDb->join('administrador', 'demanda.codAdministrador', '=', 'administrador.codAdministrador');
        $dadosDb->join('categoria', 'demanda.codCategoria', '=', 'categoria.codCategoria');
        $dadosDb->join('status', 'demanda.codStatus', '=', 'status.codStatus');
        $dadosDb->where('usuario.codUsuario', '=', $request->codUsuario);
        $dadosDb->limit($request->itensPorPagina);
        $dadosDb->offset($request->numPagina);

        $dadosDb = $dadosDb->get();       

        $arrayDataFiltro = [];        
        
        foreach ($dadosDb as $valor) {
            array_push($arrayDataFiltro, $valor);
        }

        $arrayDataFiltro = json_encode($arrayDataFiltro);
        $dadosDb = $arrayDataFiltro;

        return $dadosDb;
    }

    // POST
    public function InserirDemanda(Request $request){
        
        $codAdministrador = 2; // Administrador Padrão
        $urlImagem = $request->midia1;
        $existe = 0;
        $naoExiste = 0;
        
        if(!empty($request->img)){
            $urlImagem = 'img-' . date('dmY-His') . '.' . $request->img_mime;
            Storage::put('imagens_app/' . $urlImagem, base64_decode($request->img_image));
        } else {
            $urlImagem = "imagem_padrao.png";
        }
        
        $dadosDb = DemandaModel::orderBy('codDemanda');
        
        $dadosDb->insert(['bairro' => $request->bairro, 'endereco' => $request->endereco, 'codCategoria' => $request->codCategoria, 'codAdministrador' => $codAdministrador, 'codUsuario' => $request->codUsuario, 'descricao' => $request->descricao, 'latitude' => $request->latitude, 'longitude' => $request->longitude, 'anonimato' => $request->anonimato, 'complementoStatus' => $request->complementoStatus, 'midia1' => $urlImagem, 'codStatus' => $request->codStatus, 'data' => date('Y-m-d'), 'hora' => date('H:i:s'), 'existe' => $existe, 'naoExiste' => $naoExiste, 'created_at' => date('Y-m-d H:i:s')]);

        return json_encode("OK");
    }

    // POST
    public function InserirDenunciaAnonima(Request $request){
        
        $codAdministrador = 2; // Administrador Padrão
        $urlImagem = $request->midia1;
        $existe = 0;
        $naoExiste = 0;
        
        if(!empty($request->img)){
            $urlImagem = 'img-' . date('dmY-His') . '.' . $request->img_mime;
            Storage::put('imagens_app/' . $urlImagem, base64_decode($request->img_image));
        } else {
            $urlImagem = "imagem_padrao.png";
        }
        
        $dadosDb = DemandaModel::orderBy('codDemanda');
        
        $dadosDb->insert(['bairro' => $request->bairro, 'endereco' => $request->endereco, 'codCategoria' => $request->codCategoria, 'codAdministrador' => $codAdministrador, 'codUsuario' => $request->codUsuario, 'descricao' => $request->descricao, 'latitude' => $request->latitude, 'longitude' => $request->longitude, 'anonimato' => $request->anonimato, 'complementoStatus' => $request->complementoStatus, 'midia1' => $urlImagem, 'codStatus' => $request->codStatus, 'data' => date('Y-m-d'), 'hora' => date('H:i:s'), 'existe' => $existe, 'naoExiste' => $naoExiste, 'created_at' => date('Y-m-d H:i:s')]);

        return json_encode("OK");
    }

    // POST
    public function ListarDemanda(Request $request){
        $dadosDb = DemandaModel::orderBy('codDemanda');
        $dadosDb->select('codDemanda', 'descricao', 'latitude', 'longitude', 'anonimato', 'complementoStatus', 'demanda.codCategoria', 'demanda.codUsuario', 'demanda.codAdministrador', 'demanda.codStatus', 'usuario.nome as nomeUsuario', 'administrador.nome as nomeAdministrador', 'categoria.nome as nomeCategoria', 'status.nome as nomeStatus', 'midia1', 'existe', 'naoExiste', 'data', 'hora');
        $dadosDb->join('usuario', 'demanda.codUsuario', '=', 'usuario.codUsuario');
        $dadosDb->join('administrador', 'demanda.codAdministrador', '=', 'administrador.codAdministrador');
        $dadosDb->join('categoria', 'demanda.codCategoria', '=', 'categoria.codCategoria');
        $dadosDb->join('status', 'demanda.codStatus', '=', 'status.codStatus');
        $dadosDb->where('codDemanda', '=', $request->codDemanda);
        $dadosDb = $dadosDb->get();

        $arrayDataFiltro = [];        
        
        foreach ($dadosDb as $valor) {
            array_push($arrayDataFiltro, $valor);
        }

        $arrayDataFiltro = json_encode($arrayDataFiltro);
        $dadosDb = $arrayDataFiltro;

        return $dadosDb;
    }

    // POST
    public function ConsultarDenunciaAnonima(Request $request){
        $dadosDb = DemandaModel::orderBy('codDemanda');
        $dadosDb->select('codDemanda', 'descricao', 'latitude', 'longitude', 'anonimato', 'complementoStatus', 'demanda.codCategoria', 'demanda.codAdministrador', 'demanda.codStatus', 'administrador.nome as nomeAdministrador', 'categoria.nome as nomeCategoria', 'status.nome as nomeStatus', 'midia1', 'existe', 'naoExiste', 'data', 'hora');
        $dadosDb->join('administrador', 'demanda.codAdministrador', '=', 'administrador.codAdministrador');
        $dadosDb->join('categoria', 'demanda.codCategoria', '=', 'categoria.codCategoria');
        $dadosDb->join('status', 'demanda.codStatus', '=', 'status.codStatus');
        // $dadosDb->where('codDemanda', '=', $request->numeroProtocolo);
        // $dadosDb->where('categoria.codCategoria', '=', '6');
        // $dadosDb->orWhere('categoria.codCategoria', '=', '7');
        $dadosDb->whereRaw('codDemanda = ? AND (categoria.codCategoria = 6 || categoria.codCategoria = 7)', [$request->numeroProtocolo]);
        $dadosDb = $dadosDb->get();

        $arrayDataFiltro = [];        
        
        foreach ($dadosDb as $valor) {
            array_push($arrayDataFiltro, $valor);
        }

        $arrayDataFiltro = json_encode($arrayDataFiltro);
        $dadosDb = $arrayDataFiltro;

        return $dadosDb;
    }


    // POST
    public function ColaborarPositivamente(Request $request){
        $colaboracao = "Existe";

        $dadosDb = DemandaModel::orderBy('codDemanda');
        $dadosDb->select('existe');
        $dadosDb->where('codDemanda', '=', $request->codDemanda);
        $dadosDb = $dadosDb->get();

        $existe = $dadosDb[0]->existe;
        $existe++;
    

        $dadosDb2 = DemandaModel::orderBy('codDemanda');
        $dadosDb2->where('codDemanda', '=', $request->codDemanda);
        $dadosDb2->update(['existe' => $existe, 'updated_at' => date('Y-m-d H:i:s')]);


        $dadosDb3 = UsuarioDemandaModel::orderBy('codUsuarioDemanda');
        $dadosDb3->insert(['codUsuario' => $request->codUsuario, 'codDemanda' => $request->codDemanda, 'colaboracao' => $colaboracao, 'created_at' => date('Y-m-d H:i:s')]);

        return json_encode("OK");
    }

    // POST
    public function ColaborarNegativamente(Request $request){
        $colaboracao = "Não Existe";

        $dadosDb = DemandaModel::orderBy('codDemanda');
        $dadosDb->select('naoExiste');
        $dadosDb->where('codDemanda', '=', $request->codDemanda);
        $dadosDb = $dadosDb->get();

        $naoExiste = $dadosDb[0]->naoExiste;
        $naoExiste++;
    

        $dadosDb2 = DemandaModel::orderBy('codDemanda');
        $dadosDb2->where('codDemanda', '=', $request->codDemanda);
        $dadosDb2->update(['naoExiste' => $naoExiste, 'updated_at' => date('Y-m-d H:i:s')]);


        $dadosDb3 = UsuarioDemandaModel::orderBy('codUsuarioDemanda');
        $dadosDb3->insert(['codUsuario' => $request->codUsuario, 'codDemanda' => $request->codDemanda, 'colaboracao' => $colaboracao, 'created_at' => date('Y-m-d H:i:s')]);

        return json_encode("OK");
    }

    // Função para enviar Push Notification para um smartphone Android através de uma url
    // GET
    public function EnviarNotificacao($codUsuario, $codDemanda){
        
        $dadosDb = DemandaModel::orderBy('codDemanda');
        $dadosDb->select('codDemanda');
        $dadosDb->where('codDemanda', '=', $codDemanda);
        $dadosDb = $dadosDb->first();

        $dadosDb2 = UsuarioModel::orderBy('codUsuario');
        $dadosDb2->select('nome', 'tokenDispositivo');
        $dadosDb2->where('codUsuario', '=', $codUsuario);
        $dadosDb2 = $dadosDb2->first();
        
        $numeroProtocolo = $dadosDb->codDemanda;
        $nomeUsuario = $dadosDb2->nome;

        $titulo = "Alteração no status de sua demanda!";
        $corpoMsg = $nomeUsuario . " houve uma alteração no status de uma demanda que você criou, cujo número de protocolo é: " . $numeroProtocolo;
        $tokenDispositivo = $dadosDb2->tokenDispositivo;
 
        
        $fcmUrl = 'https://fcm.googleapis.com/fcm/send';
        $token = $tokenDispositivo;

        $notification3 = [
            'title' => $titulo,
            'body' => $corpoMsg,
            'sound' => true,
        ];
        
        $extraNotificationData = ["message" => $notification3,"moredata" =>'dd'];

        $fcmNotification = [
            //'registration_ids' => $tokenList, //multple token array
            'to'        => $token, //single token
            'notification' => $notification3,
            'data' => $extraNotificationData
        ];

        $headers = [
            'Authorization: key=AAAApnhqUJE:APA91bFkKSfPW5idrHAKg2G2egDnZoPUbZsG889rxc1brIirsaKf9rTNyFN5Hx0uGLbvqNEQQvS0btqVITkU3yS3cljJn3leroEC1VFnZXpeshm73KrfjszKgGyzRaMEb10TCtTg0pfCJqYTAtXmUEczSZgvR9N1AQ',
            'Content-Type: application/json'
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$fcmUrl);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fcmNotification));
        $result = curl_exec($ch);
        curl_close($ch);
        
    }

}
