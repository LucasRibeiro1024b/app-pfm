<?php

namespace App\Http\Controllers;

use App\Actions\Fortify\ResetUserPassword;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    public function auth(Request $request)
    {
        $credentials = $request->validate([
            'email'     => ['required', 'email'],
            'password'  => ['required'],
        ], [
            'email.required'    => "O Campo E-mail é obrigatório.",
            'email.email'       => "O E-mail não é válido.",
            'password.required' => "A Senha é obrigatória."
        ]);
    

        // Vai verificar se as credenciais existem no banco de dados
        if (Auth::attempt($credentials, $request->remember)) {
            // Adiciona um log ou dd para verificar as credenciais
            Log::info('Credenciais corretas', ['credentials' => $credentials]);
    
            $request->session()->regenerate();
    
            return redirect()->intended('/dashboard');
        } else {
            Log::warning('Credenciais inválidas', ['credentials' => $credentials]);
            return redirect()->back()->with("erro", "Usuário ou senha inválida!");
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function resetPassword(Request $request)
    {
        $user = User::findOrFail($request->id);
        $reset = new ResetUserPassword;
        $reset->reset($user, $request->all());

        return redirect(route('users.index'))->with("msg", "Senha alterada com sucesso!");
    }

}
