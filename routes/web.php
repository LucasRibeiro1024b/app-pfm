<?php

use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
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
}); //renomeei o name da rota pro padrão


// módulo "usuário"

Route::get('/users', [UserController::class, 'index'])->name('users.index');

// module "projects"
Route::get('/project/create', [ProjectController::class, 'create'])->name('project.create');
Route::post('/project/create', [ProjectController::class, 'store'])->name('project.store');
Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
Route::get('/project/show/{id}', [ProjectController::class, 'show'])->name('project.show');
Route::get('/project/edit/{id}', [ProjectController::class, 'edit'])->name('project.edit');
Route::put('/project/update/{id}', [ProjectController::class, 'update'])->name('project.update');
Route::delete('/project/destroy/{id}', [ProjectController::class, 'destroy'])->name('project.destroy');

// módulo "client"

Route::get('/clients', [ClientController::class, 'index'])->name('clients.index');

Route::get('/client/create', [ClientController::class, 'create'])->name('client.create');

Route::post('/client/create', [ClientController::class, 'store'])->name('client.store');

Route::delete('/client/destroy/{id}', [ClientController::class, 'destroy'])->name('client.destroy');

Route::get('/client/edit/{id}', [ClientController::class, 'edit'])->name('client.edit');

Route::put('/client/update/{id}', [ClientController::class, 'update'])->name('client.update');

Route::get('/client/show/{id}', [ClientController::class, 'show'])->name('client.show');

// módulo "task" (atividade)

Route::post('/task/create', [TaskController::class, 'create'])->name('task.create');