@extends('layouts.main')
@section('title', 'Formulário de Venda')
@section('content')
<div id="sale-create-container">
    <h1 id="h1-create">Realizar venda: </h1>
    <form action="/sales/create" method="POST" enctype="multipart/form-data">
    @csrf
        <div class="form-client">
            <div class="form-group">
                <label for="client">Nome do cliente: </label>
                <input type="text" required autocomplete="off" list="clients" class="form-control" id="client" name="client" placeholder="Digite o nome do cliente" value="{{ $nameClient }}">
                <datalist id="clients" name="clients">
                    @foreach ($clients as $client)
                        <option>#{{ $client->id }}# {{ $client->name }}</option>
                    @endforeach
                </datalist>
            </div>
            <div class="form-group">
                <label for="cpf">CPF/CNPJ: </label>
                <input type="text" required class="form-control" id="cpf" name="cpf" placeholder="Digite o CPF ou CNPJ" value="{{ $cpfClient }}">
            </div>
        </div>
        <label id="form-sale-products-title">Produtos vendidos:</label>
        <div class="form-sale-products">
            <div class="form-group campo-product" id="">
                <input type="text" autocomplete="off" required list="products" class="form-control prod" id="prod1" name="prods[]">
                <datalist id="products" name="products">
                    @foreach ($products as $product)
                        <option>#{{ $product->id }}# {{ $product->name }}</option>
                    @endforeach
                </datalist>
                <label>x</label>
                <input type="number" required class="form-control amountprod" value="1" id="amountprod1" name="amountprods[]">
                <label>= (R$)</label>
                <input type="number" step=".01" required class="form-control subtprod" value="0.00" id="subtprod1" name="subtprods[]">
                <button type="button" class="btn btn-primary btn-create btn-sm" id="add-campo"><ion-icon name="add"></ion-icon></button>
            </div>
        </div>
        <div class="form-vtotal">
            <label>Total a pagar (R$): </label>
            <input type="number" step=".01" required value="0.00" class="form-group" id="vtotal" name="vtotal" placeholder="">
        </div>
        <button type="submit" class="btn btn-primary btn-create"><ion-icon name="checkmark"></ion-icon> Concluir venda</button>
    </form>
</div>
@endsection