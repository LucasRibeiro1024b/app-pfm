<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::all();

        return view('client.show', ['clients' => $clients]);
    }

    public function create()
    {
        return view('client.create');
    }

    public function store(Request $request)
    {
        $client = new Client;

        $client->name = $request->name;
        $client->email = $request->email;
        $client->address = $request->address;
        $client->phone = $request->phone;
        $client->type = $request->type;
        $client->cpfCnpj = $request->cpfCnpj;

        $client->save();

        return redirect(route('clients.index'))->with('msg', 'Cliente adicionado com sucesso');
    }
}
