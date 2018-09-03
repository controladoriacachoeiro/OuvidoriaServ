<?php

namespace App\Http\Controllers\Status;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\StatusModel;

class StatusController extends Controller
{
    //GET
    public function ListarStatus(){
        $dadosDb = StatusModel::orderBy('codStatus');
        
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
