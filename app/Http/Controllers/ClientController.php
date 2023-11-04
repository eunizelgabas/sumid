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

    public function search($searchKey){
        return inertia('Clients/Index', [
            'clients' => Client::where('last_name', 'like' , "%$searchKey%")->orWhere('first_name', 'like' , "%$searchKey%")->orWhere('address', 'like' , "%$searchKey%")->get()
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
            'bio'   => 'string|nullable'
        ]);

        $client->update($request->all());

        return redirect('/clients/' . $client->id)->with('Info', 'Client Updated Successfully');
    }

    public function destroy(Client $client) {
        $client->delete();
        return redirect('/clients')->with('Info', 'Client successfully deleted');
    }

    public function create() {
        return inertia('Clients/Create');
    }

    public function store(Request $request) {

       $fields = $request->validate([
            'last_name' => 'string|required',
            'first_name' => 'string|required',
            'address' => 'string|required',
            'phone' => 'string|required',
            'bdate' => 'date|required',
            'bio'   =>'string|nullable',
            // 'profile_pic' => $fileName
        ]);


        $fileName = null;
        if($request->profile_pic){
            $fileName = time() . '.' . $request->profile_pic->extension();
            $request->profile_pic->move(public_path('uploads/profile_pic'), $fileName);
            $fields['profile_pic'] = $fileName;
        }

        $c = Client::create($fields);

        return redirect('/clients/' . $c->id)->with('Info', 'Client Created Successfully');
    }

    public function toggleActive(Client $client){
        $client->active = !$client->active;
        $client->save();

        return back();
    }
}
