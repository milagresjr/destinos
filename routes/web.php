<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\AgenciaController;
use App\Http\Controllers\AutoCompleteController;
use App\Http\Controllers\BilheteController;
use App\Http\Controllers\ClientController;
use Illuminate\Support\Facades\Route;
/*use App\http\Controllers\{
    ClientController,
    HomeController,
    PassageController
}; */
use App\http\Controllers\PassageController;
use App\Http\Controllers\RotaController;
use GuzzleHttp\Middleware;

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

Route::get('/agencias', [AgenciaController::class, 'index'])->name('agencias');
Route::get('/agencia/{id}', [AgenciaController::class, 'show'])->name('agencia.param');

Route::get('/rotas', [RotaController::class, 'index'])->name('rotas');

Route::get('/atendimento', function () {
    return view('atendimento');
})->name('atendimento');

Route::get('/about-us', function () {
    return view('sobre');
})->name('sobre');

Route::get('/termos-de-uso', function () {
    return view('termos');
})->name('termos');

Route::get('gerar/bilhete', [BilheteController::class, 'gerarBilhete'])->name('gerar_bilhete');
Route::get('designBilhete', function() {
    return view('bilhete');
});

Route::middleware(['auth'])->group(function(){

    Route::any('travel/{idViagem}', 'App\Http\Controllers\PassageController@escolher_poltrona')->name("rota_especifica");
    Route::get('/checkout/{idViagem}/{preco}/{arrayPoltronas}', 'App\Http\Controllers\PassageController@checkout')->name("checkout");

});

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

Route::post('/autocomplete', 'App\Http\Controllers\AutoCompleteController@autocomplete')->name("autocomplete");

Route::post('/autocomplete/fetch', 'App\Http\Controllers\AutoCompleteController@fetch')->name("auto_fetch");

Route::match(['post'], '/autocomplete/partindo/', 'App\Http\Controllers\AutoCompleteController@fetch')->name("fetch_partindo");
Route::match(['post'], '/autocomplete/indo', 'App\Http\Controllers\AutoCompleteController@fetch')->name("auto_fetch_indo");

Route::post('/seat_selections', 'App\Http\Controllers\PassageController@armazenar_poltrona')->name("armazenar-poltronas");

Route::post('/verifica_poltrona', 'App\Http\Controllers\PassageController@verificar_poltrona')->name("verificar-poltronas");

Route::delete('/deletar_poltrona/{idViagem}/{np}', 'App\Http\Controllers\PassageController@eliminar_poltrona')->name("eliminar-poltronas");

Route::match(['get', 'post'], '/checkout/store', 'App\Http\Controllers\CheckoutController@store')->name("checkout_store");

Route::get('/filter',[PassageController::class, 'filter'])->name('filtrar');

Route::get('/rota/auto-complete',[AutoCompleteController::class, 'autocomplete']);
// Route::get('/exemplo/auto-complete',[AutoCompleteController::class, 'autocompletar']);


#Admin

Route::post('/admin/logar', 'App\Http\Controllers\Admin\AdminController@logar')->name("logar.admin");
Route::get('/admin/logout', 'App\Http\Controllers\Admin\AdminController@logout')->name("logout.admin");

Route::middleware(['auth'])->group(function(){

    Route::get('/admin/home', [AdminController::class, 'index'])->name('admin.home');

    Route::get('/admin/reservas', 'App\Http\Controllers\Admin\ReservaAdminController@index')->name('admin.reserva');
    // Route::get('/admin/travels', 'App\Http\Controllers\Admin\ViagemAdminController@index')->name('admin.viagem');
    // Route::get('/admin/destinys','App\Http\Controllers\Admin\DestinoAdminController@index')->name('admin.destino');
    // Route::get('/admin/routes', 'App\Http\Controllers\Admin\RotaAdminController@index')->name('admin.rota');

    Route::resource('admin/agencys','App\Http\Controllers\Admin\AgenciaAdminController')->names([
        'index' => 'admin.agencia.index',
        'create' => 'admin.agencia.create',
        'store' => 'admin.agencia.store',
        'show' => 'admin.agencia.show',
        'edit' => 'admin.agencia.edit',
        'update' => 'admin.agencia.update',
        'destroy' => 'admin.agencia.destroy'
    ]);
    Route::resource('admin/destinys','App\Http\Controllers\Admin\DestinoAdminController')->names([
        'index' => 'admin.destino.index',
        'create' => 'admin.destino.create',
        'store' => 'admin.destino.store',
        'show' => 'admin.destino.show',
        'edit' => 'admin.destino.edit',
        'update' => 'admin.destino.update',
        'destroy' => 'admin.destino.destroy'
    ]);
    Route::resource('admin/routes','App\Http\Controllers\Admin\RotaAdminController')->names([
        'index' => 'admin.rota.index',
        'create' => 'admin.rota.create',
        'store' => 'admin.rota.store',
        'show' => 'admin.rota.show',
        'edit' => 'admin.rota.edit',
        'update' => 'admin.rota.update',
        'destroy' => 'admin.rota.destroy'
    ]);
    Route::resource('admin/terminals','App\Http\Controllers\Admin\TerminalAdminController')->names([
        'index' => 'admin.terminal.index',
        'create' => 'admin.terminal.create',
        'store' => 'admin.terminal.store',
        'show' => 'admin.terminal.show',
        'edit' => 'admin.terminal.edit',
        'update' => 'admin.terminal.update',
        'destroy' => 'admin.terminal.destroy'
    ]);
    Route::resource('admin/travels','App\Http\Controllers\Admin\ViagemAdminController')->names([
        'index' => 'admin.viagem.index',
        'create' => 'admin.viagem.create',
        'store' => 'admin.viagem.store',
        'show' => 'admin.viagem.show',
        'edit' => 'admin.viagem.edit',
        'update' => 'admin.viagem.update',
        'destroy' => 'admin.viagem.destroy'
    ]);

});