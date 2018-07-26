<?php

namespace App\Http\Controllers\Arquivo;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArquivoController extends Controller
{
    public function abrirImagem($nomeImagem){
        if (file_exists(public_path('../storage/app/imagens_app/'.$nomeImagem)) == false) {
            $file_path = public_path('../storage/app/imagens_app/imagem_padrao.png');
        }else{
            $file_path = public_path('../storage/app/imagens_app/'.$nomeImagem);
        }
                                
        return response()->file($file_path);
    }
}
