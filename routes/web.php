<?php

use App\Http\Controllers\ClientController;
use Illuminate\Support\Facades\Route;
/*use App\http\Controllers\{
    ClientController,
    HomeController,
    PassageController
}; */
use App\http\Controllers\PassageController;
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
/*
Route::get('/', function(){
   return view('home');
 //return "oiii";
})->name('home');
*/
Route::get('/api/users', [ClientController::class, 'getApi']);
//Route::get('/', [HomeController::class , 'index'])->name("home");
Route::get('/', 'App\Http\Controllers\HomeController@index')->name("home");

Route::match(['post', 'get'], 'teste/tst', [ClientController::class, 'teste'])->name("teste-cliente");

Route::get('/auth/login', function () {
    return view('login');
})->name('login');

Route::get('/auth/register', function () {
    return view('cadastro-cliente');
})->name('cadastrar');

Route::get('/tst', function () {
    return view('teste');
})->name('viagens');

Route::get('/atendimento', function () {
    return view('atendimento');
})->name('atendimento');

//Route::get('/passagem/{p_inicial}/{destino}',[PassageController::class, 'index'])->name('passagem');
Route::get('/passagem/{p_inicial}/{destino}', 'App\Http\Controllers\PassageController@index')->name("passagem");

Route::any('/search/passagem/', 'App\Http\Controllers\PassageController@search')->name("search_passagem");

Route::get('/search/passagem/param/{partindo_de}/{indo_para}/{data_passagem}', 'App\Http\Controllers\PassageController@searchComParametro')->name("search_passagem_com_param");

//Route::post('/store/client', [ClientController::class, 'cadastrar'])->name("cadastro-cliente");
Route::post('/store/client', 'App\Http\Controllers\ClientController@cadastrar')->name("cadastro-cliente");

//Route::post('/logar/client', [ClientController::class, 'logar'])->name("logar-cliente");
//Route::get('/logout', [ClientController::class, 'logout'])->name("logout");
Route::post('/logar/client', 'App\Http\Controllers\ClientController@logar')->name("logar-cliente");
Route::get('/logout', 'App\Http\Controllers\ClientController@logout')->name("logout");

Route::any('rota/{idViagem}', 'App\Http\Controllers\PassageController@escolher_poltrona')->name("rota_especifica");

Route::post('/autocomplete', 'App\Http\Controllers\AutoCompleteController@autocomplete')->name("autocomplete");

Route::post('/autocomplete/fetch', 'App\Http\Controllers\AutoCompleteController@fetch')->name("auto_fetch");

Route::match(['post'], '/autocomplete/partindo/', 'App\Http\Controllers\AutoCompleteController@fetch')->name("fetch_partindo");
Route::match(['post'], '/autocomplete/indo', 'App\Http\Controllers\AutoCompleteController@fetch')->name("auto_fetch_indo");

Route::post('/seat_selections', 'App\Http\Controllers\PassageController@armazenar_poltrona')->name("armazenar-poltronas");

Route::post('/verifica_poltrona', 'App\Http\Controllers\PassageController@verificar_poltrona')->name("verificar-poltronas");

Route::delete('/deletar_poltrona/{idViagem}/{np}', 'App\Http\Controllers\PassageController@eliminar_poltrona')->name("eliminar-poltronas");

Route::get('/checkout/{idViagem}/{preco}/{arrayPoltronas}', 'App\Http\Controllers\PassageController@checkout')->name("checkout");

Route::match(['get', 'post'], '/checkout/store', 'App\Http\Controllers\CheckoutController@store')->name("checkout_store");

Route::get('/admin/home', function () {
    return view('admin.home-admin');
})->name('admin.home');

#Admin

Route::get('/admin/reservas', 'App\Http\Controllers\Admin\ReservaAdminController@index')->name('admin.reserva');
