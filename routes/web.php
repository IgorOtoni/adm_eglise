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
 Route::post('logout', 'Auth\LoginController@logout')->name('logout');

 // Registration Routes...
 Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
 Route::post('register', 'Auth\RegisterController@register');

 // Password Reset Routes...
 Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
 Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
 Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
 Route::post('password/reset', 'Auth\ResetPasswordController@reset');

Route::get('/', 'PlataformaController@eglise');
//Route::get('/eglise', 'PlataformaController@eglise')->name('eglise');

Route::get('/logout', function () {
    //Session::flush();
    auth()->logout();
    return redirect('login');
});

Route::get('/{url}', 'IgrejaController@index')->name('igreja.index');
Route::get('/{url}/contato', 'IgrejaController@contato')->name('igreja.contato');
Route::get('/{url}/eventos', 'IgrejaController@eventos')->name('igreja.eventos');
Route::get('/{url}/eventosfixos', 'IgrejaController@eventosfixos')->name('igreja.eventosfixos');
Route::get('/{url}/noticias', 'IgrejaController@noticias')->name('igreja.noticias');
Route::get('/{url}/apresentacao', 'IgrejaController@apresentacao')->name('igreja.apresentacao');
Route::get('/{url}/sermoes', 'IgrejaController@sermoes')->name('igreja.sermoes');
Route::get('/{url}/login','IgrejaController@login')->name('igreja.login');

Route::group(['middleware' => 'auth'], function () {
    /*Route::get('/', function () {
        if (Auth::user()->id_perfil == 1)
            return redirect('admin/home');
        else
            return redirect('eglise');
    });*/
    Route::get('error', function () {
        return "Sorry, you are unauthorized to access this page.";
    });
    //     ROTAS DE ADMINISTRAÇÃO DO SISTEMA
    Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
        Route::get('igrejas', 'TbligrejaController@index')->name('igrejas');
        Route::get('igrejas/tbl_igrejas', 'TbligrejaController@tbl_igrejas')->name('igrejas.tbl_igrejas');
        Route::get('igrejas/switchStatus/{id}', 'TbligrejaController@switchStatus')->name('igrejas.switchStatus');
        Route::get('igrejas/editarIgreja/{id}', 'TbligrejaController@edit')->name('igrejas.editar');
        Route::post('igrejas/incluir', 'TbligrejaController@store')->name('igrejas.incluir');
        Route::post('igrejas/atualizar', 'TbligrejaController@update')->name('igrejas.atualizar');
        Route::post('igrejas/excluirLogo', 'TbligrejaController@excluirLogo')->name('igrejas.excluirLogo');
        Route::post('igrejas/salvarConfiguracoes', 'TbligrejaController@salvarConfiguracoes')->name('igrejas.salvarConfiguracoes');

        Route::get('perfis', 'TblperfilController@index')->name('perfis');
        Route::get('perfis/tbl_perfis', 'TblperfilController@tbl_perfis')->name('perfis.tbl_perfis');
		Route::get('perfis/switchStatus/{id}', 'TblperfilController@switchStatus')->name('perfis.switchStatus');

        Route::get('permissoes/json_permissoes', 'TblpermissaoController@json_permissoes')->name('permissoes.json_permissoes');       

        Route::get('/home', 'HomeController@index')->name('home');
    });
    /*Route::group(['prefix' => 'user', 'middleware' => 'user'], function () {

    });*/
});