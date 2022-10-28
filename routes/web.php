<?php

use App\Http\Controllers\{ClientesController,
    CodigoGradesController,
    ColecoesController,
    CoresController,
    DespesasAvulsasController,
    EstoquesController,
    FornecedoresController,
    HomeController,
    ProdutosController,
    RecebimentosController,
    SangriasController,
    SuprimentoCaixasController,
    TamanhosController,
    UserController,
    VendasController,
    ConfiguracoesController,
};
use App\Models\{Clientes,
    CodigoGrades,
    Colecoes,
    Cores,
    DespesasAvulsas,
    Estoques,
    Fornecedores,
    Produtos,
    Recebimentos,
    Sangrias,
    SuprimentoCaixas,
    Tamanhos,
    User,
    Vendas,
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
        Route::get('index', [UserController::class, 'index'])->name('user.index')->can('view', User::class);
        Route::get('cadastro', [UserController::class, 'create'])->name('user.create')->can('create', User::class);
        Route::post('store', [UserController::class, 'store'])->name('user.store')->can('create', User::class);
        Route::get('detalhes/{id}', [UserController::class, 'show'])->name('user.show')->can('update', User::class);
        Route::post('update', [UserController::class, 'update'])->name('user.update')->can('update', User::class);
    });

    Route::prefix('clientes')->group(function () {
        Route::get('index', [ClientesController::class, 'index'])->name('clientes.index')->can('view', Clientes::class);
        Route::get('cadastro', [ClientesController::class, 'create'])->name('clientes.create')->can('create', Clientes::class);
        Route::post('store', [ClientesController::class, 'store'])->name('clientes.store')->can('create', Clientes::class);
        Route::get('detalhes/{id}', [ClientesController::class, 'show'])->name('clientes.show')->can('update', Clientes::class);
        Route::post('update', [ClientesController::class, 'update'])->name('clientes.update')->can('update', Clientes::class);
        Route::get('pdf', [ClientesController::class, 'pdf'])->name('clientes.pdf')->can('view', Clientes::class);
    });

    Route::prefix('produtos')->group(function () {
        Route::get('index', [ProdutosController::class, 'index'])->name('produtos.index')->can('view', Produtos::class);
        Route::get('cadastro', [ProdutosController::class, 'create'])->name('produtos.create')->can('create', Produtos::class);
        Route::post('store', [ProdutosController::class, 'store'])->name('produtos.store')->can('create', Produtos::class);
        Route::get('detalhes/{id}', [ProdutosController::class, 'show'])->name('produtos.show')->can('update', Produtos::class);
        Route::post('update', [ProdutosController::class, 'update'])->name('produtos.update')->can('update', Produtos::class);
    });

    Route::prefix('tamanhos')->group(function () {
        Route::get('index', [TamanhosController::class, 'index'])->name('tamanhos.index')->can('view', Tamanhos::class);
        Route::get('cadastro', [TamanhosController::class, 'create'])->name('tamanhos.create')->can('create', Tamanhos::class);
        Route::post('store', [TamanhosController::class, 'store'])->name('tamanhos.store')->can('create', Tamanhos::class);
    });

    Route::prefix('cores')->group(function () {
        Route::get('index', [CoresController::class, 'index'])->name('cores.index')->can('view', Cores::class);
        Route::get('cadastro', [CoresController::class, 'create'])->name('cores.create')->can('create', Cores::class);
        Route::post('store', [CoresController::class, 'store'])->name('cores.store')->can('create', Cores::class);
    });

    Route::prefix('codigo_grades')->group(function () {
        Route::get('index', [CodigoGradesController::class, 'index'])->name('codigo_grade.index')->can('view', CodigoGrades::class);
        Route::get('cadastro', [CodigoGradesController::class, 'create'])->name('codigo_grade.create')->can('create', CodigoGrades::class);
        Route::post('store', [CodigoGradesController::class, 'store'])->name('codigo_grade.store')->can('create', CodigoGrades::class);
    });

    Route::prefix('vendas')->group(function () {
        Route::get('index', [VendasController::class, 'index'])->name('vendas.index')->can('view', Vendas::class);
        Route::get('cadastro', [VendasController::class, 'create'])->name('vendas.create')->can('create', Vendas::class);
        Route::post('store', [VendasController::class, 'store'])->name('vendas.store')->can('create', Vendas::class);
        Route::get('detalhes/{id}', [VendasController::class, 'show'])->name('vendas.show')->can('update', Vendas::class);
        Route::get('cupom_venda/{id}', [VendasController::class, 'cupomVenda'])->name('vendas.cupomVenda')->can('update', Vendas::class);
    });

    Route::prefix('estoque')->group(function () {
        Route::get('index', [EstoquesController::class, 'index'])->name('estoque.index')->can('view', Estoques::class);
        Route::get('cadastro', [EstoquesController::class, 'create'])->name('estoque.create')->can('create', Estoques::class);
        Route::post('store', [EstoquesController::class, 'store'])->name('estoque.store')->can('create', Estoques::class);
    });

    Route::prefix('recebimentos')->group(function () {
        Route::get('index', [RecebimentosController::class, 'index'])->name('recebimentos.index')->can('view', Recebimentos::class);
        Route::get('cadastro', [RecebimentosController::class, 'create'])->name('recebimentos.create')->can('create', Recebimentos::class);
        Route::post('store', [RecebimentosController::class, 'store'])->name('recebimentos.store')->can('create', Recebimentos::class);
        Route::get('detalhes/{id}', [RecebimentosController::class, 'show'])->name('recebimentos.show')->can('update', Recebimentos::class);
    });

    Route::prefix('fornecedores')->group(function () {
        Route::get('index', [FornecedoresController::class, 'index'])->name('fornecedores.index')->can('view', Fornecedores::class);
        Route::get('cadastro', [FornecedoresController::class, 'create'])->name('fornecedores.create')->can('create', Fornecedores::class);
        Route::post('store', [FornecedoresController::class, 'store'])->name('fornecedores.store')->can('create', Fornecedores::class);
        Route::get('detalhes/{id}', [FornecedoresController::class, 'show'])->name('fornecedores.show')->can('update', Fornecedores::class);
        Route::post('update', [FornecedoresController::class, 'update'])->name('fornecedores.update')->can('update', Fornecedores::class);
        Route::get('destroy/{id}', [FornecedoresController::class, 'destroy'])->name('fornecedores.destroy')->can('delete', Fornecedores::class);
    });

    Route::prefix('colecoes')->group(function () {
        Route::get('index', [ColecoesController::class, 'index'])->name('colecoes.index')->can('view', Colecoes::class);
        Route::get('cadastro', [ColecoesController::class, 'create'])->name('colecoes.create')->can('create', Colecoes::class);
        Route::post('store', [ColecoesController::class, 'store'])->name('colecoes.store')->can('create', Colecoes::class);
    });

    Route::prefix('sangrias')->group(function () {
        Route::get('index', [SangriasController::class, 'index'])->name('sangrias.index')->can('view', Sangrias::class);
        Route::get('cadastro', [SangriasController::class, 'create'])->name('sangrias.create')->can('create', Sangrias::class);
        Route::post('store', [SangriasController::class, 'store'])->name('sangrias.store')->can('create', Sangrias::class);
    });

    Route::prefix('despesas_avulsas')->group(function () {
        Route::get('index', [DespesasAvulsasController::class, 'index'])->name('despesas_avulsas.index')->can('view', DespesasAvulsas::class);
        Route::get('cadastro', [DespesasAvulsasController::class, 'create'])->name('despesas_avulsas.create')->can('create', DespesasAvulsas::class);
        Route::post('store', [DespesasAvulsasController::class, 'store'])->name('despesas_avulsas.store')->can('create', DespesasAvulsas::class);
    });

    Route::prefix('suprimento_caixa')->group(function () {
        Route::get('index', [SuprimentoCaixasController::class, 'index'])->name('suprimento_caixa.index')->can('view', SuprimentoCaixas::class);
        Route::get('cadastro', [SuprimentoCaixasController::class, 'create'])->name('suprimento_caixa.create')->can('create', SuprimentoCaixas::class);
        Route::post('store', [SuprimentoCaixasController::class, 'store'])->name('suprimento_caixa.store')->can('create', SuprimentoCaixas::class);
    });

    Route::get('configuracoes', [ConfiguracoesController::class, 'index'])->name('configuracoes');

    Route::prefix('get')->group(function () {
        Route::post('cores', [CoresController::class, 'get'])->name('get.cores');
        Route::post('tamanhos', [TamanhosController::class, 'get'])->name('get.tamanhos');
        Route::post('produtos', [ProdutosController::class, 'get'])->name('get.produtos');
        Route::post('detalhes/produto', [ProdutosController::class, 'getDetalhes'])->name('get.detalhes.produtos');
        Route::post('funcionarios', [UserController::class, 'get'])->name('get.funcionarios');
        Route::post('clientes', [ClientesController::class, 'get'])->name('get.clientes');
        Route::post('fornecedores', [FornecedoresController::class, 'get'])->name('get.fornecedores');
        Route::post('codigo_grade', [CodigoGradesController::class, 'get'])->name('get.codigo_grade');
        Route::post('colecao', [ColecoesController::class, 'get'])->name('get.colecao');
        Route::post('venda/codigo_grade', [CodigoGradesController::class, 'getForVenda'])->name('get.codigo_grade');
    });
});

Route::post('tem_estoque', [EstoquesController::class, 'temEstoque'])->name('tem_estoque');
Route::post('localizar_produto', [ProdutosController::class, 'localizarProduto'])->name('localizar_produto');

Route::get('logout', [UserController::class, 'logout'])->name('logout');
