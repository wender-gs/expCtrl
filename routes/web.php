<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use App\Models\Transactions;
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

// rota padrão do site, index
Route::get('/', function () {
    return view('site.index');
});

// rota para gerenciamento do usuario
Route::resource('usuarios', UserController::class)->names('user')->parameters(['usuarios' => 'user']);

// rotas de gerenciamento da dashboard
Route::get('admin', [AuthController::class, 'dashboard'])->name('admin');
Route::get('admin/login', [AuthController::class, 'showLoginForm'])->name('admin.login');
Route::get('admin/logout', [AuthController::class, 'logout'])->name('admin.logout');
Route::post('admin/login/do', [AuthController::class, 'login'])->name('admin.login.do');


// rotas para o cadastro de despesas e receitas
Route::post('admin/expense/store/{id}/{type}', [TransactionController::class, 'cadExpense'])->name('admin.store.expense');
Route::post('admin/recipe/store/{id}/{type}', [TransactionController::class, 'cadRecipe'])->name('admin.store.recipe');

// rotas para gerenciamento da pagina de transações
Route::get('admin/transacoes', [TransactionController::class, 'transactionsShow'])->name('admin.transaction');

// rota para apagar registros de transacoes
Route::get('admin/transacoes/delete/{id}/{type}', [TransactionController::class, 'deleteTransactions'])->name('admin.transaction.delete');

// rota para atualizar o status do registro
Route::get('admin/transacoes/updateStatus/{id}/{type}', [TransactionController::class, 'updateStatusTransaction'])->name('admin.transaction.updateStatus');

// rota para retornar os dados para o AJAX da aplicação
Route::get('admin/transacoes/{id}/getUpdade', [TransactionController::class, 'getUpdade'])->name('admin.transaction.getUpdade');