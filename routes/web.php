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
    return view('welcome');
});


Route::get('admin', function () {
    return view('admin_site.index');
});

Route::get('igrejas', 'TbligrejaController@index')->name('igrejas');
Route::get('igrejas/tbl_igrejas', 'TbligrejaController@tbl_igrejas')->name('igrejas.tbl_igrejas');
Route::get('igrejas/switchStatus/{id}', 'TbligrejaController@switchStatus')->name('igrejas.switchStatus');
Route::get('igrejas/editarIgreja/{id}', 'TbligrejaController@edit')->name('igrejas.editarIgreja');
Route::post('igrejas/incluir', 'TbligrejaController@store');
Route::post('igrejas/atualizar', 'TbligrejaController@update');

Route::get('perfis', 'TblperfilController@index')->name('perfis');
Route::get('perfis/tbl_perfis', 'TblperfilController@tbl_perfis')->name('perfis.tbl_perfis');

Route::get('permissoes/json_permissoes', 'TblpermissaoController@json_permissoes')->name('permissoes.json_permissoes');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/logout', function () {
    Session::flush();
    return redirect('login');
});
