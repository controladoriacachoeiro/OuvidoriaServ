<?php

namespace App\Http\Controllers\Demanda;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DemandaModel;
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
        $dadosDb = $dadosDb->get();       

        $arrayDataFiltro =[];        
        
        foreach ($dadosDb as $valor) {
            array_push($arrayDataFiltro, $valor);
        }

        $arrayDataFiltro = json_encode($arrayDataFiltro);
        $dadosDb = $arrayDataFiltro;

        // dd($dadosDb);

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
        $dadosDb->limit($request->itensPorPagina);
        $dadosDb->offset($request->numPagina);

        $dadosDb = $dadosDb->get();       

        $arrayDataFiltro =[];        
        
        foreach ($dadosDb as $valor) {
            array_push($arrayDataFiltro, $valor);
        }

        $arrayDataFiltro = json_encode($arrayDataFiltro);
        $dadosDb = $arrayDataFiltro;

        // dd($dadosDb);

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

        $arrayDataFiltro =[];        
        
        foreach ($dadosDb as $valor) {
            array_push($arrayDataFiltro, $valor);
        }

        $arrayDataFiltro = json_encode($arrayDataFiltro);
        $dadosDb = $arrayDataFiltro;

        // dd($dadosDb);

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
        
        $dadosDb->insert(['bairro' => $request->bairro, 'endereco' => $request->endereco, 'codCategoria' => $request->codCategoria, 'codAdministrador' => $codAdministrador, 'codUsuario' => $request->codUsuario, 'descricao' => $request->descricao, 'latitude' => $request->latitude, 'longitude' => $request->longitude, 'anonimato' => $request->anonimato, 'complementoStatus' => $request->complementoStatus, 'midia1' => $urlImagem, 'codStatus' => $request->codStatus, 'data' => date('Y-m-d'), 'hora' => date('H:i:s'), 'existe' => $existe, 'naoExiste' => $naoExiste]);

        return json_encode("OK");
    }

}
