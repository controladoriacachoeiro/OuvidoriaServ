<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/home');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/solicitacao', function () {
    return view('solicitacao');
});

Route::get('/reclamacao', function () {
    return view('reclamacao');
});

Route::get('/elogio-sugestao', function () {
    return view('elogio-sugestao');
});

Route::get('/denuncia', function () {
    return view('denuncia');
});

Route::get('/lai', function () {
    return view('lai');
});

Route::get('/recurso', function () {
    return view('recurso');
});

//Formulários

Route::post('/formularioSolicitacao', 'FormularioController@formularioSolicitacao');

Route::post('/formularioReclamacao', 'FormularioController@formularioReclamacao');

Route::post('/formularioElogioSugestao', 'FormularioController@formularioElogioSugestao');

Route::post('/formularioDenuncia', 'FormularioController@formularioDenuncia');

Route::post('/formularioLAI', 'FormularioController@formularioLAI');

Route::post('/formularioRecurso', 'FormularioController@formularioRecurso');

// Aplicativo

Route::get('imagem/{nome}', ['as' => 'abrirImagem','uses' => 'Arquivo\ArquivoController@abrirImagem']);

Route::get('/listarStatus', 'Status\StatusController@ListarStatus');

Route::get('/listarDemandas', 'Demanda\DemandaController@ListarDemandas');

Route::get('/listarCategoria', 'Categoria\CategoriaController@ListarCategoria');

Route::post('/listarDemandasFeed', 'Demanda\DemandaController@ListarDemandasFeed');

Route::post('/listarMinhasDemandas', 'Demanda\DemandaController@ListarMinhasDemandas');

Route::post('/listarUsuarioDemanda', 'UsuarioDemanda\UsuarioDemandaController@ListarUsuarioDemanda');

Route::post('/loginApp', 'Usuario\UsuarioController@Login');

Route::post('/deslogarApp', 'Usuario\UsuarioController@Deslogar');

Route::post('/inserirUsuario', 'Usuario\UsuarioController@InserirUsuario');

Route::post('/inserirDemanda', 'Demanda\DemandaController@InserirDemanda');

Route::post('/inserirDenunciaAnonima', 'Demanda\DemandaController@InserirDenunciaAnonima');

Route::post('/colaborarPositivamente', 'Demanda\DemandaController@ColaborarPositivamente');

Route::post('/colaborarNegativamente', 'Demanda\DemandaController@ColaborarNegativamente');

Route::post('/listarDemanda', 'Demanda\DemandaController@ListarDemanda');

Route::post('/consultarDenunciaAnonima', 'Demanda\DemandaController@ConsultarDenunciaAnonima');

Route::get('/enviarNotificacao/{codUsuario}/{codDemanda}', ['as'=> 'EnviarNotificacao', 'uses'=>'Demanda\DemandaController@EnviarNotificacao']);