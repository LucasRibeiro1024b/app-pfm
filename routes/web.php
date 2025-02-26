<?php

use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\FinanceController;
use App\Http\Controllers\FinancesController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ReceiptController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('site.dashboard');
    })->name('site.dashboard');
}); 


///////////////////////*** módulo "login" ***///////////////////////


Route::get('/', function () 
{
        if (Auth::check()) {
            return view('site.dashboard');
        }

    return view('auth.login');
});

Route::post('/auth', [LoginController::class, 'auth'])->name('login.auth');

Route::get('/logout', [LoginController::class, 'logout'])->name('login.logout');

Route::put('/reset-password', [LoginController::class, 'resetPassword'])->name('login.resetPassword');



///////////////////////*** módulo "user" ***///////////////////////


Route::get('/users', [UserController::class, 'index'])->name('users.index')->middleware('auth');
//aceita todos os usuários logados

Route::prefix('user')->group(function()
{
    Route::get('/show/{id}', [UserController::class, 'show'])->name('user.show')->middleware('auth', 'accept:0');
    //sócio

    Route::get('/create', [UserController::class, 'create'])->name('user.create')->middleware('auth', 'accept:0');
    //sócio

    Route::post('/create', [UserController::class, 'store'])->name('user.store')->middleware('auth', 'accept:0');
    //sócio

    Route::get('/edit/{id}', [UserController::class, 'edit'])->name('user.edit')->middleware('auth', 'accept:0');
    //sócio

    Route::put('/update/{id}', [UserController::class, 'update'])->name('user.update')->middleware('auth', 'accept:0');
    //sócio

    Route::delete('/destroy/{id}', [UserController::class, 'destroy'])->name('user.destroy')->middleware('auth', 'accept:0');
    //sócio
});


///////////////////////*** módulo "client" ***///////////////////////


Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index')->middleware('auth');
//aceita todos os usuários logados

Route::prefix('project')->group(function()
{
    Route::get('/show/{id}', [ProjectController::class, 'show'])->name('project.show')->middleware('auth');
    //aceita todos os usuários logados

    Route::get('/create', [ProjectController::class, 'create'])->name('project.create')->middleware('auth', 'accept:0,1');
    //sócio e consultor

    Route::post('/create', [ProjectController::class, 'store'])->name('project.store')->middleware('auth', 'accept:0,1');
    //sócio e consultor

    Route::get('/edit/{id}', [ProjectController::class, 'edit'])->name('project.edit')->middleware('auth', 'accept:0,1');
    //sócio e consultor

    Route::put('/update/{id}', [ProjectController::class, 'update'])->name('project.update')->middleware('auth', 'accept:0,1');
    //sócio e consultor

    Route::delete('/destroy/{id}', [ProjectController::class, 'destroy'])->name('project.destroy')->middleware('auth', 'accept:0,1');
    //sócio e consultor
});


///////////////////////*** módulo "client" ***///////////////////////


Route::get('/clients', [ClientController::class, 'index'])->name('clients.index')->middleware('auth'); 
//aceita todos os usuários logados

Route::prefix('client')->group(function()
{
    Route::get('/show/{id}', [ClientController::class, 'show'])->name('client.show')->middleware('auth');
    //aceita todos os usuários logados

    Route::get('/create', [ClientController::class, 'create'])->name('client.create')->middleware('auth', 'accept:0,1');
    //sócio e consultor

    Route::post('/create', [ClientController::class, 'store'])->name('client.store')->middleware('auth', 'accept:0,1');
    //sócio e consultor

    Route::get('/edit/{id}', [ClientController::class, 'edit'])->name('client.edit')->middleware('auth', 'accept:0,1');
    //sócio e consultor

    Route::put('/update/{id}', [ClientController::class, 'update'])->name('client.update')->middleware('auth', 'accept:0,1');
    //sócio e consultor

    Route::delete('/destroy/{id}', [ClientController::class, 'destroy'])->name('client.destroy')->middleware('auth', 'accept:0,1');
    //sócio e consultor
});


///////////////////////*** módulo "task" (atividade) ***///////////////////////


Route::prefix('task')->group(function()
{
    Route::get('/show/{id}', [TaskController::class, 'show'])->name('task.show')->middleware('auth', 'accept:0,1,3');
    //sócio, consultor e estagiário
    
    Route::get('/create/{id}', [TaskController::class, 'create'])->name('task.create')->middleware('auth', 'accept:0,1');
    //sócio e consultor
    
    Route::post('/store', [TaskController::class, 'store'])->name('task.store')->middleware('auth', 'accept:0,1');
    //sócio e consultor
    
    Route::get('/edit/{id}', [TaskController::class, 'edit'])->name('task.edit')->middleware('auth', 'accept:0,1,3');
    //sócio, consultor e estagiário
    
    Route::put('/update/{id}', [TaskController::class, 'update'])->name('task.update')->middleware('auth', 'accept:0,1,3');
    //sócio, consultor e estagiário
    
    Route::delete('/destroy/{id}', [TaskController::class, 'destroy'])->name('task.destroy')->middleware('auth', 'accept:0,1');
    //sócio e consultor
});



/////////////////*** módulo financeiro ***///////////////

Route::get("/finances", [FinanceController::class, 'index'])->name('finance.index');


////////////////*** módulo Receita (receipt) ***/////////////////////////

Route::prefix('receipt')->group(function()
{
    Route::get('/create', [ReceiptController::class, 'create'])->name('receipt.create');
    Route::post('/store', [ReceiptController::class, 'store'])->name('receipt.store');
    Route::get('/edit/{id}', [ReceiptController::class, 'edit'])->name('receipt.edit');
    Route::put('/update/{id}', [ReceiptController::class, 'update'])->name('receipt.update');
    Route::delete('/destroy/{id}', [ReceiptController::class, 'destroy'])->name('receipt.destroy');
});

////////////////*** módulo Despesa (expense) ***/////////////////////////

Route::prefix('expense')->group(function()
{
    Route::get('/create', [ExpenseController::class, 'create'])->name('expense.create');
    Route::post('/store', [ExpenseController::class, 'store'])->name('expense.store');
    Route::get('/edit/{id}', [ExpenseController::class, 'edit'])->name('expense.edit');
    Route::put('/update/{id}', [ExpenseController::class, 'update'])->name('expense.update');
    Route::delete('/destroy/{id}', [ExpenseController::class, 'destroy'])->name('expense.destroy');
});