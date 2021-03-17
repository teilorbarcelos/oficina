<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Provider;

class ProductController extends Controller
{
    public function index(Request $request){

        $search = request('search');

        if($search){

            $products = Product::where([
                ['name', 'like', '%'.$search.'%']
            ])->orWhere([
                ['category', 'like', '%'.$search.'%']
            ])->sortable()->paginate(10);

        }else{

            $products = Product::sortable()->paginate(10);

        }

        return view('products.list', ['products' => $products, 'search' => $search]);

    }

    public function create(){

        $providers = Provider::orderBy('name')->get();

        
        return view('products.create', ['providers' => $providers]);
    }

    public function store(Request $request){
        
        $product = new Product;
        
        $product->name = $request->name;
        $product->category = $request->category;
        $product->price = $request->price;
        $product->amount = $request->amount;
        $product->provider = $request->provider;
        $product->info = $request->info;

        $product->save();

        return redirect('/products/'.$product->id)->with('msg', 'Cadastro realizado com sucesso!');
    }

    public function edit($id){
        
        $product = Product::findOrFail($id);
        $providers = Provider::orderBy('name')->get();

        return view('products.edit', ['product' => $product, 'providers' => $providers]);

    }

    public function show($id){
        
        $product = Product::findOrFail($id);

        return view('products.show', ['product' => $product]);

    }

    public function update(Request $request){
        
        $product = $request->all();

        if(Product::findOrFail($request->id)->update($product)){
            return redirect()->back()->with('msg', 'Alterações salvas com sucesso no cadastro!');
        }else{
            return redirect()->back()->with('msg', 'Não foi possível salvar as alterações no cadastro!');
        }

    }

    public function ajaxGet($id){
        
        $product = Product::findOrFail($id);
        
        return $product->price;

    }
}
