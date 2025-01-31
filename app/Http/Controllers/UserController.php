<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() 
    {
        $users = User::all();

        return view('user.index', ['users' => $users]);
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        $user = new User;

        $user->name = $request->name;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->phone = $request->phone;
        $user->type = $request->type;
        $user->cpfCnpj = $request->cpfCnpj;

        $user->save();

        return redirect(route('clients.index'))->with('msg', 'Usuário "' . $user->name . '" criado com sucesso');
    }

}
