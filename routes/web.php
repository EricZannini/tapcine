<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\FilmeController;
use App\Http\Controllers\SessaoController;
use App\Http\Controllers\IngressoController;
use App\Http\Controllers\FichaController;
use App\Http\Controllers\AtorController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\GraficoController;
use App\Http\Controllers\LoginController;

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'autenticar'])->name('login.autenticar');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware('autenticado')->group(function () {

    Route::get('/', [InicioController::class, 'index'])->name('inicio');

    Route::get('/quiz', function () {
        return view('quiz');
    })->name('quiz');

    Route::get('/filme', [FilmeController::class, 'index']);
    Route::get('/filme/create', [FilmeController::class, 'create']);
    Route::post('/filme/store', [FilmeController::class, 'store'])->name('filme.store');
    Route::get('/filme/edit/{id}', [FilmeController::class, 'edit'])->name('filme.edit');
    Route::put('/filme/update/{id}', [FilmeController::class, 'update'])->name('filme.update');
    Route::delete('/filme/{id}', [FilmeController::class, 'destroy'])->name('filme.destroy');
    Route::post('/filme/search', [FilmeController::class, 'search'])->name('filme.search');

    Route::get('/sessao', [SessaoController::class, 'index']);
    Route::get('/sessao/create', [SessaoController::class, 'create']);
    Route::post('/sessao/store', [SessaoController::class, 'store'])->name('sessao.store');
    Route::get('/sessao/edit/{id}', [SessaoController::class, 'edit'])->name('sessao.edit');
    Route::put('/sessao/update/{id}', [SessaoController::class, 'update'])->name('sessao.update');
    Route::delete('/sessao/{id}', [SessaoController::class, 'destroy'])->name('sessao.destroy');
    Route::post('/sessao/search', [SessaoController::class, 'search'])->name('sessao.search');

    Route::get('/ingresso', [IngressoController::class, 'index']);
    Route::get('/ingresso/create', [IngressoController::class, 'create']);
    Route::post('/ingresso/store', [IngressoController::class, 'store'])->name('ingresso.store');
    Route::get('/ingresso/edit/{id}', [IngressoController::class, 'edit'])->name('ingresso.edit');
    Route::put('/ingresso/update/{id}', [IngressoController::class, 'update'])->name('ingresso.update');
    Route::delete('/ingresso/{id}', [IngressoController::class, 'destroy'])->name('ingresso.destroy');
    Route::post('/ingresso/search', [IngressoController::class, 'search'])->name('ingresso.search');

    Route::get('/ficha', [FichaController::class, 'index']);
    Route::get('/ficha/create', [FichaController::class, 'create']);
    Route::post('/ficha/store', [FichaController::class, 'store'])->name('ficha.store');
    Route::get('/ficha/edit/{id}', [FichaController::class, 'edit'])->name('ficha.edit');
    Route::put('/ficha/update/{id}', [FichaController::class, 'update'])->name('ficha.update');
    Route::delete('/ficha/{id}', [FichaController::class, 'destroy'])->name('ficha.destroy');
    Route::post('/ficha/search', [FichaController::class, 'search'])->name('ficha.search');

    Route::get('/ator', [AtorController::class, 'index']);
    Route::get('/ator/create', [AtorController::class, 'create']);
    Route::post('/ator/store', [AtorController::class, 'store'])->name('ator.store');
    Route::get('/ator/edit/{id}', [AtorController::class, 'edit'])->name('ator.edit');
    Route::put('/ator/update/{id}', [AtorController::class, 'update'])->name('ator.update');
    Route::delete('/ator/{id}', [AtorController::class, 'destroy'])->name('ator.destroy');
    Route::post('/ator/search', [AtorController::class, 'search'])->name('ator.search');

    Route::get('/produto', [ProdutoController::class, 'index']);
    Route::get('/produto/create', [ProdutoController::class, 'create']);
    Route::post('/produto/store', [ProdutoController::class, 'store'])->name('produto.store');
    Route::get('/produto/edit/{id}', [ProdutoController::class, 'edit'])->name('produto.edit');
    Route::put('/produto/update/{id}', [ProdutoController::class, 'update'])->name('produto.update');
    Route::delete('/produto/{id}', [ProdutoController::class, 'destroy'])->name('produto.destroy');
    Route::post('/produto/search', [ProdutoController::class, 'search'])->name('produto.search');

    Route::get('/graficos', [GraficoController::class, 'index'])->name('graficos');

});
