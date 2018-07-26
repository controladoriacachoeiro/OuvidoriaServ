<?php

namespace App\Http\Controllers\Usuario;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\UsuarioModel;

class UsuarioController extends Controller
{
    //POST
    public function Login(Request $request){
        
        $dadosDb = UsuarioModel::orderBy('codUsuario');
        $dadosDb->where('login', '=', $request->login);
        $dadosDb->where('senha', '=', $request->senha);
        $dadosDb = $dadosDb->get();       

        $arrayDataFiltro = [];
        
        foreach ($dadosDb as $valor) {
            array_push($arrayDataFiltro, $valor);
        }

        $arrayDataFiltro = json_encode($arrayDataFiltro);
        $dadosDb = $arrayDataFiltro;

        // dd($dadosDb);

        return $dadosDb;
    }

    //POST
    public function InserirUsuario(Request $request){

        $dadosDb2 = UsuarioModel::orderBy('codUsuario');
        $dadosDb2->where('login', '=', $request->login);
        $dadosDb2 = $dadosDb2->get();

        if($dadosDb2->isEmpty()){

            $dadosDb = UsuarioModel::orderBy('codUsuario');
            $dadosDb->insert(['nome' => $request->nome, 'login' => $request->login, 'senha' => $request->senha, 'cpfCnpj' => $request->cpfCnpj]);

            return json_encode("OK");
        } else {
            return json_encode("Login existente");
        }

    }
}
