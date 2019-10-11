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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware' => 'auth'], function () {
    // Rotas de usuário
    Route::get('/usuario/inativos', 'UsuarioController@inativos');
    Route::get('/usuario/{id}/restore', 'UsuarioController@restore');
    Route::resource('/usuario', 'UsuarioController');
    //Rotas de cliente
    route::get('/cliente/inativos', 'ClienteController@inativos');
    route::get('/cliente/{id}/restore', 'ClienteController@restore');
    Route::resource('/cliente', 'ClienteController');
    //Rotas de Produto

    route::get('/produto/inativos', 'ProdutoController@inativos');
    route::get('/produto/{id}/restore', 'ProdutoController@restore');
    Route::resource('/produto', 'ProdutoController');
    //Rotas Categoria
    Route::get('/categoria/inativos', 'CategoriaController@inativos');
    Route::get('/categoria/{id}/restore', 'CategoriaController@restore');
    Route::resource('/categoria', 'CategoriaController');

    /// Rotas de Venda
    Route::get('/venda/{id}/show', 'VendaController@visualizar');
    Route::get('venda/inativos', 'VendaController@inativos');
    Route::resource('/venda', 'VendaController');
    
});
Route::post('/buscaEmail', 'UsuarioController@buscaEmail');
Route::post('verificaNomeCategoria', 'CategoriaController@verificaNome');
Route::post('buscaPreco', 'ProdutoController@buscaPreco');
