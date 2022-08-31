<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    UserController,
    HomeController,
};

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
            Route::get('index', [UserController::class, 'index'])->name('clientes.index');
        });

        Route::prefix('produtos')->group(function() {
            Route::get('index', [UserController::class, 'index'])->name('produtos.index');
        });
    });
});

Route::get('logout', [UserController::class, 'logout'])->name('logout');
