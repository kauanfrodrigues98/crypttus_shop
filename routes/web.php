<?php

use App\Http\Controllers\{ClientesController,
    CoresController,
    HomeController,
    ProdutosController,
    TamanhosController,
    UserController,
};
use Illuminate\Support\Facades\Route;

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
    return view('login');
})->name('login');

Route::post('logar', [UserController::class, 'logar'])->name('logar');

Route::middleware('auth')->group(function() {
    Route::get('home', [HomeController::class, 'index'])->name('home');

    Route::prefix('cadastro')->group(function() {
        Route::prefix('funcionarios')->group(function() {
            Route::get('index', [UserController::class, 'index'])->name('user.index');
            Route::get('cadastro', [UserController::class, 'create'])->name('user.create');
            Route::post('store', [UserController::class, 'store'])->name('user.store');
        });

        Route::prefix('clientes')->group(function() {
            Route::get('index', [ClientesController::class, 'index'])->name('clientes.index');
            Route::get('cadastro', [ClientesController::class, 'create'])->name('clientes.create');
            Route::post('store', [ClientesController::class, 'store'])->name('clientes.store');
        });

        Route::prefix('produtos')->group(function () {
            Route::get('index', [ProdutosController::class, 'index'])->name('produtos.index');
            Route::get('cadastro', [ProdutosController::class, 'create'])->name('produtos.create');
            Route::post('store', [ProdutosController::class, 'store'])->name('produtos.store');
        });

        Route::prefix('tamanhos')->group(function () {
            Route::get('index', [TamanhosController::class, 'index'])->name('tamanhos.index');
            Route::get('cadastro', [TamanhosController::class, 'create'])->name('tamanhos.create');
            Route::post('store', [TamanhosController::class, 'store'])->name('tamanhos.store');
        });

        Route::prefix('cores')->group(function () {
            Route::get('index', [CoresController::class, 'index'])->name('cores.index');
            Route::get('cadastro', [CoresController::class, 'create'])->name('cores.create');
            Route::post('store', [CoresController::class, 'store'])->name('cores.store');
        });
    });
});

Route::get('logout', [UserController::class, 'logout'])->name('logout');
