<?php

use App\Http\Controllers\{ClientesController,
    CodigoGradesController,
    CoresController,
    EstoquesController,
    FornecedoresController,
    HomeController,
    ProdutosController,
    RecebimentosController,
    TamanhosController,
    UserController,
    VendasController,
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

    Route::prefix('funcionarios')->group(function () {
        Route::get('index', [UserController::class, 'index'])->name('user.index');
        Route::get('cadastro', [UserController::class, 'create'])->name('user.create');
        Route::post('store', [UserController::class, 'store'])->name('user.store');
    });

    Route::prefix('clientes')->group(function () {
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

    Route::prefix('codigo_grades')->group(function () {
        Route::get('index', [CodigoGradesController::class, 'index'])->name('codigo_grade.index');
        Route::get('cadastro', [CodigoGradesController::class, 'create'])->name('codigo_grade.create');
        Route::post('store', [CodigoGradesController::class, 'store'])->name('codigo_grade.store');
    });

    Route::prefix('vendas')->group(function () {
        Route::get('index', [VendasController::class, 'index'])->name('vendas.index');
        Route::get('cadastro', [VendasController::class, 'create'])->name('vendas.create');
        Route::post('store', [VendasController::class, 'store'])->name('vendas.store');
        Route::get('detalhes/{id}', [VendasController::class, 'show'])->name('vendas.show');
    });

    Route::prefix('estoque')->group(function () {
        Route::get('index', [EstoquesController::class, 'index'])->name('estoque.index');
        Route::get('cadastro', [EstoquesController::class, 'create'])->name('estoque.create');
        Route::post('store', [EstoquesController::class, 'store'])->name('estoque.store');
    });

    Route::prefix('recebimentos')->group(function () {
        Route::get('index', [RecebimentosController::class, 'index'])->name('recebimentos.index');
        Route::get('cadastro', [RecebimentosController::class, 'create'])->name('recebimentos.create');
        Route::post('store', [RecebimentosController::class, 'store'])->name('recebimentos.store');
        Route::get('detalhes/{id}', [RecebimentosController::class, 'show'])->name('recebimentos.show');
    });

    Route::prefix('fornecedores')->group(function () {
        Route::get('index', [FornecedoresController::class, 'index'])->name('fornecedores.index');
        Route::get('cadastro', [FornecedoresController::class, 'create'])->name('fornecedores.create');
        Route::post('store', [FornecedoresController::class, 'store'])->name('fornecedores.store');
    });
});

Route::prefix('get')->group(function () {
    Route::post('cores', [CoresController::class, 'get'])->name('get.cores');
    Route::post('tamanhos', [TamanhosController::class, 'get'])->name('get.tamanhos');
    Route::post('produtos', [ProdutosController::class, 'get'])->name('get.produtos');
    Route::post('detalhes/produto', [ProdutosController::class, 'getDetalhes'])->name('get.detalhes.produtos');
    Route::post('funcionarios', [UserController::class, 'get'])->name('get.funcionarios');
    Route::post('clientes', [ClientesController::class, 'get'])->name('get.clientes');
    Route::post('fornecedores', [FornecedoresController::class, 'get'])->name('get.fornecedores');
    Route::post('codigo_grade', [CodigoGradesController::class, 'get'])->name('get.codigo_grade');
});

Route::get('logout', [UserController::class, 'logout'])->name('logout');
