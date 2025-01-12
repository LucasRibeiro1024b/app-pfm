<?php

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