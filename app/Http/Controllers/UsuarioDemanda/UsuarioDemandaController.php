<?php

namespace App\Http\Controllers\UsuarioDemanda;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\UsuarioDemandaModel;

class UsuarioDemandaController extends Controller
{
    // POST
    public function ListarUsuarioDemanda(Request $request){
        $dadosDb = UsuarioDemandaModel::orderBy('codUsuarioDemanda');

        $dadosDb->where('codUsuario', '=', $request->codUsuario);
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
}
