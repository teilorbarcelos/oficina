<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Provider;

class ProviderController extends Controller
{
    public function index(){

        $search = request('search');

        if($search){

            $providers = Provider::where([
                ['name', 'like', '%'.$search.'%']
            ])->paginate(10);

        }else{

            $providers = Provider::orderBy('name')->paginate(10);

        }

        return view('providers.list', ['providers' => $providers, 'search' => $search]);

    }

    public function create(){
        
        return view('providers.create');
    }

    public function store(Request $request){
        
        $provider = new Provider;
        
        $provider->name = $request->name;
        $provider->cpf = $request->cpf;
        $provider->contact = $request->contact;
        $provider->address = $request->address;
        $provider->info = $request->info;

        $provider->save();

        return redirect('/providers/'.$provider->id)->with('msg', 'Cadastro realizado com sucesso!');
    }

    public function edit($id){
        
        $provider = Provider::findOrFail($id);

        return view('providers.edit', ['provider' => $provider]);

    }

    public function show($id){
        
        $provider = Provider::findOrFail($id);

        return view('providers.show', ['provider' => $provider]);

    }

    public function update(Request $request){
        
        $provider = $request->all();

        if(Provider::findOrFail($request->id)->update($provider)){
            return redirect()->back()->with('msg', 'Alterações salvas com sucesso no cadastro!');
        }else{
            return redirect()->back()->with('msg', 'Não foi possível salvar as alterações no cadastro!');
        }

    }
}
