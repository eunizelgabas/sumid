<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index() {
        $clients = Client::orderBy('last_name')->orderBy('first_name')->get();

        return inertia('Clients/Index',[
            'clients' => $clients
        ]);
    }

    public function show(Client $client) {
        return inertia('Clients/Show', compact('client'));
    }

    public function edit(Client $client) {
        return inertia('Clients/Edit', compact('client'));
    }

    public function update(Client $client, Request $request) {
        $request->validate([
            'last_name' => 'string|required',
            'first_name' => 'string|required',
            'address' => 'string|required',
            'phone' => 'string|required',
            'bdate' => 'date|required',
        ]);

        $client->update($request->all());

        return redirect('/clients/' . $client->id);
    }

    public function destroy(Client $client) {
        $client->delete();
        return redirect('/clients');
    }

    public function create() {
        return inertia('Clients/Create');
    }

    public function store(Request $request) {
        $request->validate([
            'last_name' => 'string|required',
            'first_name' => 'string|required',
            'address' => 'string|required',
            'phone' => 'string|required',
            'bdate' => 'date|required',
        ]);

        $c = Client::create($request->all());

        return redirect('/clients/' . $c->id);
    }
}
