<?php

use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () 
{
        if (Auth::check()) {
            return view('site.dashboard');
        }

    return view('auth.login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('site.dashboard');
    })->name('site.dashboard');
}); 


///////////////////////*** módulo "user" ***///////////////////////


Route::get('/users', [UserController::class, 'index'])->name('users.index')->middleware('auth');
//aceita todos os usuários logados


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
    Route::get('/show/{id}', [ClientController::class, 'show'])->name('client.show')->middleware('auth', 'accept:0,1,2');
    //sócio, consultor e financeiro

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