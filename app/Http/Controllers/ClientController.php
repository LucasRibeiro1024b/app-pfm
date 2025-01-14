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
}
