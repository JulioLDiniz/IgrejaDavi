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
    return view('layouts/admin');
});
Route::get('/admin', function () {
    return view('index');
});
Route::get('/membros-novo', function () {
    return view('membros.novo');
});
Route::get('/membros', 'MembrosController@index')->name('membros');
Route::post('membros.store', 'MembrosController@store')->name('membros.store');

Route::post('/membros-excluir', 'MembrosController@excluir')->name('excluir');

Route::post('/membros-alterar', 'MembrosController@alterar')->name('alterar');

Route::post('/financas-cadastro', 'FinancasController@cadastrar')->name('financas.cadastro');

Route::get('/financas', function(){
    return view('financas.index');
});

Route::get('/financas-entrada', 'FinancasController@index')->name('financas');

Route::get('/financas-saida', function(){
    return view('financas.saida');
});

Route::post('/financas-entrada', 'FinancasController@entrada')->name('financas.entrada');

Route::post('/financas-saida', 'FinancasController@saida')->name('financas.saida');



Route::get('financas-gestao', function(){

    return view('financas.gestao');


});

Route::post('financas-mes-entrada', function() {
    $entrada = \App\financas::select(\DB::raw('date, sum(valor) as soma'))->where('movimentacao', 'entrada')->whereMonth('date', request()->mes)->groupBy('date')->get();



    return response()->json([
        'entrada' => $entrada
    ]);

})->name('financas-mes-entrada');

Route::post('financas-mes-saida', function() {
    $movimentacao = \App\financas::select(\DB::raw('date, sum(valor) as soma'))->where('movimentacao', 'saida')->whereMonth('date', request()->mes)->groupBy('date')->get();


    return response()->json([
        'movimentacao' => $movimentacao
    ]);

})->name('financas-mes-saida');

Route::get('/eventos-novo',function(){
    return view('eventos.novo');
});

Route::post('/eventos-cadastrar', 'EventosController@cadastrar')->name('eventos.cadastrar');

Route::get('/eventos', 'EventosController@index')->name('eventos.index');

Route::post('eventos-excluir', 'EventosController@excluir')->name('eventos.excluir');

Route::get('/alterar-status-andamento','EventosController@alterarStatusAndamento');

Route::get('/encerrar-evento','EventosController@encerrarEvento');

Route::get('/enviar-email', function(){
   return view('email.envio-email');
});

Route::post('/mail-store', 'EmailController@enviar')->name('mail.store');


