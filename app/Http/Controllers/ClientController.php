<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;

class ClientController extends Controller
{
    public function index(){

        $search = request('search');

        if($search){

            $clients = Client::where([
                ['name', 'like', '%'.$search.'%']
            ])->paginate(10);

        }else{

            $clients = Client::orderBy('name')->paginate(10);

        }

        return view('clients.list', ['clients' => $clients, 'search' => $search]);

    }

    public function create(){
        
        return view('clients.create');
    }

    public function store(Request $request){
        
        $client = new Client;
        
        $client->name = $request->name;
        $client->cpf = $request->cpf;
        $client->contact = $request->contact;
        $client->address = $request->address;
        $client->info = $request->info;

        $client->save();

        return redirect('/clients/'.$client->id)->with('msg', 'Cadastro realizado com sucesso!');
    }

    public function edit($id){
        
        $client = Client::findOrFail($id);

        return view('clients.edit', ['client' => $client]);

    }

    public function show($id){
        
        $client = Client::findOrFail($id);

        return view('clients.show', ['client' => $client]);

    }

    public function update(Request $request){
        
        $client = $request->all();

        if(Client::findOrFail($request->id)->update($client)){
            return redirect()->back()->with('msg', 'Alterações salvas com sucesso no cadastro!');
        }else{
            return redirect()->back()->with('msg', 'Não foi possível salvar as alterações no cadastro!');
        }

    }

    public function ajaxGet($id){
        
        $client = Client::findOrFail($id);
        
        return $client->cpf;

    }
}
