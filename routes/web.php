<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/',[\App\Http\Controllers\PrincipalController::class,'principal'])->name('site.index');
Route::get('/contato',[\App\Http\Controllers\ContatoController::class,'contato'])->name('site.contato');
Route::get('/sobreNos',[\App\Http\Controllers\SobreNosController::class,'sobreNos'])->name('site.sobreNos');
    Route::get('/login/{erro?}',[\App\Http\Controllers\LoginController::class,'index'])->name('site.login');

Route::post('/login',[\App\Http\Controllers\LoginController::class,'autenticar'])->name('site.login');


Route::middleware('autenticacao:padrao,visitante,p3,p4')->prefix('/app')->group(function(){
    Route::get('/home',[\App\Http\Controllers\HomeController::class,'index'])->name('app.home');
    Route::get('/sair',[\App\Http\Controllers\LoginController::class,'sair'])->name('app.sair');
    Route::get('/equipamentos',[\App\Http\Controllers\EquipamentoController::class,'index'])->name('app.equipamento');
    Route::get('/funcionarios',[\App\Http\Controllers\FuncionariosController::class,'index'])->name('app.funcionario');
    Route::get('/reservas',[\App\Http\Controllers\ReservaController::class,'index'])->name('app.reserva');


  
    Route::post('/funcionario/listar', [\App\Http\Controllers\FuncionariosController::class,'listar'])->name('app.funcionario.listar');
    Route::get('/funcionario/listar', [\App\Http\Controllers\FuncionariosController::class,'listar'])->name('app.funcionario.listar');
    Route::get('/funcionario/adicionar', [\App\Http\Controllers\FuncionariosController::class,'adicionar'])->name('app.funcionario.adicionar');
    Route::post('/funcionario/adicionar', [\App\Http\Controllers\FuncionariosController::class,'adicionar'])->name('app.funcionario.adicionar');
    Route::get('/funcionario/editar/{id}/{msg?}', [\App\Http\Controllers\FuncionariosController::class,'editar'])->name('app.funcionario.editar');
    Route::get('/funcionario/excluir/{id}', [\App\Http\Controllers\FuncionariosController::class,'excluir'])->name('app.funcionario.excluir');







});

Route::post('/contato',[\App\Http\Controllers\ContatoController::class,'contato'])->name('site.contato');
Route::get('/contato/{nome}', function(string $xyz){

    echo 'estamos aqui: '.$xyz;
});

Route::get('/rota1', function(){

})->name('site.rota1');

Route::get('/rota2', function(){



})->name('site.rota2');

Route::fallback(function(){

    echo 'A rota acessada não existe.<a href="'.route('site.index').'">Clique aqui</a> para retornar à pagina inicial;';
});

//Route::get('/sobre-nos', function () {
 //   return 'Sobre-nós';
//});

//Route::get('/contato', function () {
    //return 'Contato';
//});
