<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientRequest;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::all();

        return view('client.index', ['clients' => $clients]);
    }

    public function create()
    {
        return view('client.create');
    }

    public function store(ClientRequest $request)
    {
        $client = new Client;

        $client->name = $request->name;
        $client->email = $request->email;
        $client->address = $request->address;
        $client->phone = $request->phone;
        $client->type = $request->type;
        $client->cpfCnpj = $request->cpfCnpj;

        $client->save();

        return redirect(route('clients.index'))->with('msg', 'Cliente "' . $client->name . '" adicionado com sucesso');
    }

    public function destroy($id) {

        $client = Client::findOrFail($id);

        $client->delete();

        return redirect(route('clients.index'))->with('msg', 'Cliente "' . $client->name . '" excluído com sucesso');
    }

    public function edit($id) 
    {
        // $this->authorize('update');

        $client = Client::findOrFail($id);

        return view('client.edit', ['client' => $client]);
    }

    public function update(ClientRequest $request) 
    {
        $data = $request->all();

        $client = Client::findOrFail($request->id);

        $client->update($data);

        return redirect(route('clients.index'))->with('msg', 'Cliente "' . $client->name . '" atualizado com sucesso');
    }

    public function show($id) 
    {
        $client = Client::findOrFail($id);

        return view('client.show', ['client' => $client]);
    }
}
