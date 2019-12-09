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

//Public Routes
Route::get('/', "PagesController@inicio")->name('home');
Route::get('/painel', function () {
    return view('auth.login');
});

Route::get('/dash', 'HomeController@dash')->name('dash');

Auth::routes();


Route::resource('/usuarios', "UsuariosController");

Route::resource('/produtos', "ProdutosController");

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
