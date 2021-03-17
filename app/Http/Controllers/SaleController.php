<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;
use App\Models\Product;
use App\Models\Client;
use App\Models\Company;
use DateTime;

class SaleController extends Controller
{
    public function index(){
        
        $search = request('search');
        $filterDateBegin = request('date-begin');
        $filterDateEnd = request('date-end');

        if($search){

            $report = Sale::where([
                ['client', 'like', '%'.$search.'%']
            ])->orWhere([
                ['created_at', 'like', '%'.$search.'%']
            ])->get();

            $sales = Sale::where([
                ['client', 'like', '%'.$search.'%']
            ])->orWhere([
                ['created_at', 'like', '%'.$search.'%']
            ])->sortable()->paginate(10);

        }elseif($filterDateBegin && $filterDateEnd){
            $report = Sale::whereDate('created_at', '>=', $filterDateBegin)->WhereDate('created_at', '<=', $filterDateEnd)->get(); 
            $sales = Sale::whereDate('created_at', '>=', $filterDateBegin)->WhereDate('created_at', '<=', $filterDateEnd)->sortable()->paginate(10);
        }else{
            $report = Sale::all();
            $sales = Sale::sortable()->paginate(10);

        }

        return view('sales.list', ['sales' => $sales, 'search' => $search, 'dateBegin' => $filterDateBegin, 'dateEnd' => $filterDateEnd, 'report' => $report]);

    }

    public function create(){

        $products = Product::orderBy('name')->get();
        $clients = Client::orderBy('name')->get();

        $nameClient = '';
        $cpfClient = '';

        if($clientid = request('client')){
            $client = Client::findOrFail($clientid);
            $nameClient = '#'.$client->id.'# '.$client->name;
            $cpfClient = $client->cpf;
        }

        
        return view('sales.create', ['products' => $products, 'clients' => $clients, 'nameClient' => $nameClient, 'cpfClient' => $cpfClient]);

        
        
    }

    public function store(Request $request){
        
        $sale = new Sale;
        
        $sale->client = $request->client;
        $sale->cpf = $request->cpf;
        $sale->vtotal = $request->vtotal;
        $sale->prods = $request->prods;
        $sale->amountprods = $request->amountprods;
        $sale->subtprods = $request->subtprods;
        
        if($sale->save()){

            for($i = 0; $i < count($sale->prods); $i++){
                
                if(strpos($sale->prods[$i], '#') !== false){
                    
                    $codigosplit = explode('#', $sale->prods[$i]);
                    $idproduct = $codigosplit[1];

                    $product = Product::findOrFail($idproduct)->toArray();
                    $product['amount'] -= $sale->amountprods[$i];

                    Product::findOrFail($idproduct)->update($product);
                    
                }
            }

            return redirect('/sales/'.$sale->id)->with('msg', 'Venda cadastrada com sucesso: Estoque de produtos atualizado!');
        }else{
            return redirect()->back()->with('msg', 'A venda não foi cadastrada devido a um erro interno!');
        }
        

        
    }

    public function show($id){
        
        $sale = Sale::findOrFail($id);

        $prods = array(
            'prod' => $sale->prods,
            'amount' => $sale->amountprods,
            'subtotal' => $sale->subtprods
        );

        return view('sales.show', ['sale' => $sale, 'prods' => $prods]);

    }

    public function report(Request $request){

        $company = Company::findOrFail(1);

        return view('sales.report', ['report' => $request->all(), 'company' => $company]);

    }

    public function print($id){

        $company = Company::findOrFail(1);
        $sale = Sale::findOrFail($id);

        return view('sales.print', ['sale' => $sale, 'company' => $company]);

    }
}
