<?php

use App\Http\Controllers\ClientController;
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

// módulo "client"

Route::get('/clients', [ClientController::class, 'index'])->name('clients.index');

Route::get('/client/create', [ClientController::class, 'create'])->name('client.create');

Route::post('/client/create', [ClientController::class, 'store'])->name('client.store');

Route::delete('/client/destroy/{id}', [ClientController::class, 'destroy'])->name('client.destroy');

Route::get('/client/edit/{id}', [ClientController::class, 'edit'])->name('client.edit');

Route::put('/client/update/{id}', [ClientController::class, 'update'])->name('client.update');

Route::get('/client/show/{id}', [ClientController::class, 'show'])->name('client.show');