<?php

namespace App\Http\Controllers;

use App\Actions\Fortify\CreateNewUser;
use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Fortify\Http\Controllers\RegisteredUserController;
use Laravel\Fortify\Contracts\CreatesNewUsers;

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
        $newUser = new CreateNewUser;
        $newUser = $newUser->create($request->all());
        
        $newUser->save();

        return redirect(route('clients.index'))->with('msg', 'Usuário "' . $newUser->name . '" criado com sucesso');
    }

}
