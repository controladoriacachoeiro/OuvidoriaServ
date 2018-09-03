<?php

namespace App\Http\Controllers\Usuario;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\UsuarioModel;

class UsuarioController extends Controller
{
    // POST
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
        
        
        if(!empty($dadosDb)){
            if($request->tokenDispositivo != null || $request->tokenDispositivo != ''){
                $dadosDb2 = UsuarioModel::orderBy('codUsuario');
                $dadosDb2->where('login', '=', $request->login);
                $dadosDb2->update(['tokenDispositivo' => $request->tokenDispositivo, 'updated_at' => date('Y-m-d H:i:s')]);
            }
        }

        $dadosDb3 = UsuarioModel::orderBy('codUsuario');
        $dadosDb3->where('login', '=', $request->login);
        $dadosDb3->where('senha', '=', $request->senha);
        $dadosDb3 = $dadosDb3->get();       
        
        $arrayDataFiltro3 = [];
        
        foreach ($dadosDb3 as $valor3) {
            array_push($arrayDataFiltro3, $valor3);
        }

        return $dadosDb3;
    }

    // POST
    public function Deslogar(Request $request){
        $dadosDb = UsuarioModel::orderBy('codUsuario');
        $dadosDb->where('login', '=', $request->login);
        $dadosDb->where('senha', '=', $request->senha);
        $dadosDb->update(['tokenDispositivo' => null, 'updated_at' => date('Y-m-d H:i:s')]);

        return json_encode("OK");
    }

    // POST
    public function InserirUsuario(Request $request){

        $dadosDb2 = UsuarioModel::orderBy('codUsuario');
        $dadosDb2->where('login', '=', $request->login);
        $dadosDb2 = $dadosDb2->get();

        if($dadosDb2->isEmpty()){

            $dadosDb = UsuarioModel::orderBy('codUsuario');
            $dadosDb->insert(['nome' => $request->nome, 'login' => $request->login, 'senha' => $request->senha, 'cpfCnpj' => $request->cpfCnpj, 'created_at' => date('Y-m-d H:i:s'), 'tokenDispositivo' => $request->tokenDispositivo]);

            return json_encode("OK");
        } else {
            return json_encode("Login existente");
        }

    }
}
