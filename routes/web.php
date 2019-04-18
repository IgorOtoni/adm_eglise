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

/*Route::get('/', function () {
    return view('welcome');
});*/

/*
Route::get('admin', function () {
    return view('admin_site.index');
});*/

//Auth::routes();

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\HomeController@logout')->name('logout');

// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

Route::get('/', 'PlataformaController@index')->name('plataforma.home');
//Route::get('/eglise', 'PlataformaController@eglise')->name('eglise');

Route::get('/autenticar', function () {
    if (Auth::user()->id_perfil == 1)
        return redirect()->route('admin.home');
    else if (Auth::user()->id_perfil != 1)
        return redirect()->route('usuario.home');
});
Route::get('error', function () {
    return "Um erro ocorreu que não pode ser tratado pelo sistema. Contate o suporte do sistema e relate essa mensagem.";
});

Route::get('/logout', function () {
    //Session::flush();
    auth()->logout();
    return redirect('login');
});

Route::get('/congregacoes', 'PlataformaController@eglise')->name('plataforma.congregacoes');

Route::group(['middleware' => 'auth'], function () {
    /*Route::get('/autenticar', function () {
        if (Auth::user()->id_perfil == 1)
            return redirect()->route('home');
        else if (Auth::user()->id_perfil != 1)
            return redirect()->route('home');
    });*/
    /*Route::get('error', function () {
        return "Sorry, you are unauthorized to access this page.";
    });*/
    //     ROTAS DE ADMINISTRAÇÃO DO SISTEMA
    Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
        Route::get('igrejas', 'TblIgrejaController@index')->name('igrejas');
        Route::get('igrejas/tbl_igrejas', 'TblIgrejaController@tbl_igrejas')->name('igrejas.tbl_igrejas');
        Route::get('igrejas/switchStatus/{id}', 'TblIgrejaController@switchStatus')->name('igrejas.switchStatus');
        Route::get('igrejas/editarIgreja/{id}', 'TblIgrejaController@edit')->name('igrejas.editar');
        Route::post('igrejas/incluir', 'TblIgrejaController@store')->name('igrejas.incluir');
        Route::post('igrejas/atualizar', 'TblIgrejaController@update')->name('igrejas.atualizar');
        Route::post('igrejas/excluirLogo', 'TblIgrejaController@excluirLogo')->name('igrejas.excluirLogo');
        Route::post('igrejas/salvarConfiguracoes', 'TblIgrejaController@salvarConfiguracoes')->name('igrejas.salvarConfiguracoes');
        Route::get('igrejas/carregarModulos/{id}', 'TblIgrejaController@modulos_igreja')->name('igrejas.carregarModulos');
        Route::get('igrejas/configuracoes/{id}', 'TblIgrejaController@configuracoes')->name('igrejas.configuracoes');
        Route::post('igrejas/adicionarMenu', 'TblIgrejaController@adicionarMenu')->name('igrejas.adicionarMenu');
        Route::post('igrejas/editarMenu', 'TblIgrejaController@editarMenu')->name('igrejas.editarMenu');
        Route::get('igrejas/excluirMenu/{id}', 'TblIgrejaController@excluirMenu')->name('igrejas.excluirMenu');
        Route::post('igrejas/adicionarSubMenu', 'TblIgrejaController@adicionarSubMenu')->name('igrejas.adicionarSubMenu');
        Route::post('igrejas/editarSubMenu', 'TblIgrejaController@editarSubMenu')->name('igrejas.editarSubMenu');
        Route::get('igrejas/excluirSubMenu/{id}', 'TblIgrejaController@excluirSubMenu')->name('igrejas.excluirSubMenu');
        Route::post('igrejas/adicionarSubSubMenu', 'TblIgrejaController@adicionarSubSubMenu')->name('igrejas.adicionarSubSubMenu');
        Route::post('igrejas/editarSubSubMenu', 'TblIgrejaController@editarSubSubMenu')->name('igrejas.editarSubSubMenu');
        Route::get('igrejas/excluirSubSubMenu/{id}', 'TblIgrejaController@excluirSubSubMenu')->name('igrejas.excluirSubSubMenu');

        Route::get('perfis', 'TblPerfilController@index')->name('perfis');
        Route::post('perfis/incluir', 'TblPerfilController@store')->name('perfis.incluir');
        Route::get('perfis/tbl_perfis', 'TblPerfilController@tbl_perfis')->name('perfis.tbl_perfis');
		Route::get('perfis/switchStatus/{id}', 'TblPerfilController@switchStatus')->name('perfis.switchStatus');
        Route::get('perfis/carregarPermissoes/{id}', 'TblPerfilController@carregarPermissoes')->name('perfis.carregarPermissoes');
        Route::post('perfis/carregarPermissoes', 'TblPerfilController@carregarPermissoes')->name('perfis.carregarPermissoes');
        Route::post('perfis/atualizarPermissoes/', 'TblPerfilController@atualizarPermissoes')->name('perfis.atualizarPermissoes');

        Route::get('publicacoes', 'TblPublicacoesController@index')->name('publicacoes');
        Route::post('publicacoes/incluir', 'TblPublicacoesController@store')->name('publicacoes.incluir');

        Route::get('permissoes/json_permissoes', 'TblPermissaoController@json_permissoes')->name('permissoes.json_permissoes');       

        //Route::get('/', 'HomeController@index')->name('admin.index');
        Route::get('/home', 'HomeController@index')->name('admin.home');
    });
    Route::group(['prefix' => 'usuario', 'middleware' => 'usuario'], function () {
        //Route::get('/', 'HomeController@index')->name('usuario.index');
        Route::get('/home', 'HomeController@index')->name('usuario.home');

        Route::get('/usuarios', 'HomeController@index')->name('usuario.usuarios');
        Route::get('/perfis', 'HomeController@index')->name('usuario.perfis');
        Route::get('/doacoes', 'HomeController@index')->name('usuario.doacoes');
        Route::get('/eventos', 'HomeController@index')->name('usuario.eventos');
        Route::get('/eventosfixos', 'HomeController@index')->name('usuario.eventosfixos');
        Route::get('/publicacoes', 'HomeController@index')->name('usuario.publicacoes');

        // CRUD BANNERS ==========================================================================
        Route::get('/banners', 'HomeController@banners')->name('usuario.banners');
        Route::get('/tbl_banners', 'HomeController@tbl_banners')->name('usuario.tbl_banners');
        Route::post('/incluirBanner', 'HomeController@incluirBanner')->name('usuario.incluirBanner');
        Route::get('/editarBanner/{id}', 'HomeController@editarBanner')->name('usuario.editarBanner');
        Route::post('/atualizarBanner', 'HomeController@atualizarBanner')->name('usuario.atualizarBanner');
        Route::post('/excluirFotoBanner', 'HomeController@excluirFotoBanner')->name('usuario.excluirFotoBanner');
        Route::get('/excluirBanner/{id}', 'HomeController@excluirBanner')->name('usuario.excluirBanner');
        //////////////////////////////////////////////////////////////////////////////////////////

        // CRUD GALERIAS ==========================================================================
        Route::get('/galerias', 'HomeController@galerias')->name('usuario.galerias');
        Route::get('/tbl_galerias', 'HomeController@tbl_galerias')->name('usuario.tbl_galerias');
        Route::post('/incluirGaleria', 'HomeController@incluirGaleria')->name('usuario.incluirGaleria');
        Route::get('/editarGaleria/{id}', 'HomeController@editarGaleria')->name('usuario.editarGaleria');
        Route::post('/atualizarGaleria', 'HomeController@atualizarGaleria')->name('usuario.atualizarGaleria');
        Route::post('/excluirFotoGaleria', 'HomeController@excluirFotoGaleria')->name('usuario.excluirFotoGaleria');
        Route::get('/excluirGaleria/{id}', 'HomeController@excluirGaleria')->name('usuario.excluirGaleria');
        //////////////////////////////////////////////////////////////////////////////////////////

        // CRUD EVENTOS FIXOS ==========================================================================
        Route::get('/eventosfixos', 'HomeController@eventosfixos')->name('usuario.eventosfixos');
        Route::get('/tbl_eventosfixos', 'HomeController@tbl_eventosfixos')->name('usuario.tbl_eventosfixos');
        Route::post('/incluirEventoFixo', 'HomeController@incluirEventoFixo')->name('usuario.incluirEventoFixo');
        Route::get('/editarEventoFixo/{id}', 'HomeController@editarEventoFixo')->name('usuario.editarEventoFixo');
        Route::post('/atualizarEventoFixo', 'HomeController@atualizarEventoFixo')->name('usuario.atualizarEventoFixo');
        Route::post('/excluirFotoEventoFixo', 'HomeController@excluirFotoEventoFixo')->name('usuario.excluirFotoEventoFixo');
        Route::get('/excluirEventoFixo/{id}', 'HomeController@excluirEventoFixo')->name('usuario.excluirEventoFixo');
        //////////////////////////////////////////////////////////////////////////////////////////

        // CRUD NOTICIAS ==========================================================================
        Route::get('/noticias', 'HomeController@noticias')->name('usuario.noticias');
        Route::get('/tbl_noticias', 'HomeController@tbl_noticias')->name('usuario.tbl_noticias');
        Route::post('/incluirNoticia', 'HomeController@incluirNoticia')->name('usuario.incluirNoticia');
        Route::get('/editarNoticia/{id}', 'HomeController@editarNoticia')->name('usuario.editarNoticia');
        Route::post('/atualizarNoticia', 'HomeController@atualizarNoticia')->name('usuario.atualizarNoticia');
        Route::post('/excluirFotoNoticia', 'HomeController@excluirFotoNoticia')->name('usuario.excluirFotoNoticia');
        Route::get('/excluirNoticia/{id}', 'HomeController@excluirNoticia')->name('usuario.excluirNoticia');
        //////////////////////////////////////////////////////////////////////////////////////////

        // CONFIGURACOES SITE ==========================================================================
        Route::get('/configuracoes', 'HomeController@configuracoes')->name('usuario.configuracoes');
        Route::post('/salvarConfiguracoes', 'HomeController@salvarConfiguracoes')->name('usuario.salvarConfiguracoes');        
        Route::post('/adicionarMenu', 'HomeController@adicionarMenu')->name('usuario.adicionarMenu');
        Route::post('/editarMenu', 'HomeController@editarMenu')->name('usuario.editarMenu');
        Route::get('/excluirMenu/{id}', 'HomeController@excluirMenu')->name('usuario.excluirMenu');
        Route::post('/adicionarSubMenu', 'HomeController@adicionarSubMenu')->name('usuario.adicionarSubMenu');
        Route::post('/editarSubMenu', 'HomeController@editarSubMenu')->name('usuario.editarSubMenu');
        Route::get('/excluirSubMenu/{id}', 'HomeController@excluirSubMenu')->name('usuario.excluirSubMenu');
        Route::post('/adicionarSubSubMenu', 'HomeController@adicionarSubSubMenu')->name('usuario.adicionarSubSubMenu');
        Route::post('/editarSubSubMenu', 'HomeController@editarSubSubMenu')->name('usuario.editarSubSubMenu');
        Route::get('/excluirSubSubMenu/{id}', 'HomeController@excluirSubSubMenu')->name('usuario.excluirSubSubMenu');
        //////////////////////////////////////////////////////////////////////////////////////////

        // CRUD SERMOES ==========================================================================
        Route::get('/sermoes', 'HomeController@sermoes')->name('usuario.sermoes');
        Route::get('/tbl_sermoes', 'HomeController@tbl_sermoes')->name('usuario.tbl_sermoes');
        Route::post('/incluirSermao', 'HomeController@incluirSermao')->name('usuario.incluirSermao');
        Route::get('/editarSermao/{id}', 'HomeController@editarSermao')->name('usuario.editarSermao');
        Route::post('/atualizarSermao', 'HomeController@atualizarSermao')->name('usuario.atualizarSermao');
        Route::get('/excluirSermao/{id}', 'HomeController@excluirSermao')->name('usuario.excluirSermao');
        //////////////////////////////////////////////////////////////////////////////////////////

    });
});

Route::get('/{url}', 'IgrejaController@index')->name('igreja.index');
Route::get('/{url}/contato', 'IgrejaController@contato')->name('igreja.contato');
Route::get('/{url}/enviaContato', 'IgrejaController@enviaContato')->name('igreja.enviaContato');
Route::get('/{url}/eventos', 'IgrejaController@eventos')->name('igreja.eventos');
Route::get('/{url}/evento/{id}', 'IgrejaController@evento')->name('igreja.evento');
Route::get('/{url}/inscreveEnvento', 'IgrejaController@inscreveEnvento')->name('igreja.inscreveEnvento');
Route::get('/{url}/eventosfixos', 'IgrejaController@eventosfixos')->name('igreja.eventosfixos');
Route::get('/{url}/eventofixo/{id}', 'IgrejaController@eventofixo')->name('igreja.eventofixo');
Route::get('/{url}/noticias', 'IgrejaController@noticias')->name('igreja.noticias');
Route::get('/{url}/noticia/{id}', 'IgrejaController@noticia')->name('igreja.noticia');
Route::get('/{url}/apresentacao', 'IgrejaController@apresentacao')->name('igreja.apresentacao');
Route::get('/{url}/sermoes', 'IgrejaController@sermoes')->name('igreja.sermoes');
Route::get('/{url}/sermao/{id}', 'IgrejaController@sermao')->name('igreja.sermao');
Route::get('/{url}/galeria','IgrejaController@galeria')->name('igreja.galeria');
Route::get('/{url}/publicacao/{id}','IgrejaController@publicacao')->name('igreja.publicacao');
Route::get('/{url}/login','IgrejaController@login')->name('igreja.login');
Route::get('/carrega_imagem/{largura},{altura},{pasta},{arquivo}','IgrejaController@carrega_imagem')->name('igreja.carrega_imagem');