<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;

class CompanyController extends Controller
{
    public function create(){
        return view('company');
    }

    public function edit(){
        $company = Company::findOrFail(1);
        return view('company', ['company' => $company]);
    }

    public function show(){

        $company = Company::all();

        if($company == ''){
            return redirect('/company/option/create');
        }else{
            return redirect('/company/option/edit');
        }

    }

    public function store(Request $request){
        
        $company = new Company;
        
        $company->name = $request->name;
        $company->cpf = $request->cpf;
        $company->contact = $request->contact;
        $company->address = $request->address;
        

        $company->save();

        return redirect('company/option/edit')->with('msg', 'Dados inseridos com sucesso!');
    }

    public function update(Request $request){
        
        $company = $request->all();

        if(Company::findOrFail(1)->update($company)){
            return redirect()->back()->with('msg', 'Alterações salvas com sucesso no cadastro!');
        }else{
            return redirect()->back()->with('msg', 'Não foi possível salvar as alterações no cadastro!');
        }
    }
}
