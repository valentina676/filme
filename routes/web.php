<?php

use App\Http\Controllers\FilmeController;
use App\Http\Controllers\UsuariosController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('inicial');
})->name('index');


Route::get('/filmes', [FilmeController::class, 'index'])->name('filmes');

Route::get('/filmes/cadastrar', [FilmeController::class, 'cadastrar'])->name('filmes.cadastrar');

Route::post('/filmes/cadastrar',[FilmeController::class, 'gravar'])->name('filmes.gravar');

Route::get('/filmes/apagar{filme}',[FilmeController::class, 'apagar'])->name('filmes.apagar');

Route::delete('/filmes/apagar{filme}',[FilmeController::class, 'deletar']);

Route::get('/filmes/editar/{filme}', [FilmeController::class, 'editar'])->name('filmes.editar');

Route::put('/filmes/editar/{filme}', [FilmeController::class, 'editarGravar']);

Route::prefix('usuarios')->middleware('auth')->group(function(){
    Route::get('/', [UsuariosController::class, 'index'])->name('usuarios');

    Route::get('/cadastrar', [UsuariosController::class, 'cadastrar'])->name('usuarios.cadastrar');

    Route::post('/cadastrar',[UsuariosController::class, 'gravar'])->name('usuarios.gravar');

    Route::get('/apagar/{usuario}',[UsuariosController::class, 'apagar'])->name('usuarios.apagar');

    Route::delete('/apagar/{usuario}',[UsuariosController::class, 'deletar']);

    Route::get('/editar/{usuario}', [UsuariosController::class, 'editar'])->name('usuarios.editar');

    Route::put('/editar/{usuario}', [UsuariosController::class, 'editarGravar']);

});

Route::get('login', [UsuariosController::class, 'login'])->name('login');

Route::post('login', [UsuariosController::class, 'login']);

Route::get('logout', [UsuariosController::class, 'logout'])->name('logout');
