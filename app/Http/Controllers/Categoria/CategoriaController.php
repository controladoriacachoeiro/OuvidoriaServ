<?php

namespace App\Http\Controllers\Categoria;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CategoriaModel;

class CategoriaController extends Controller
{
    // GET
    public function ListarCategoria(){

        $dadosDb = CategoriaModel::orderBy('codCategoria');
        $dadosDb->select('codCategoria', 'nome as nomeCategoria');

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
