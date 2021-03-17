@extends('layouts.main')
@section('title', 'Cadastro de produto')
@section('content')
<div id="create-container" class="col-md-6 offset-md-3">
    <h1 id="h1-create">Cadastro de novo produto: </h1>
    <form action="/products/create" method="POST" enctype="multipart/form-data">
    @csrf
        <div class="form-group">
            <label for="name">Nome do produto: </label>
            <input type="text" required class="form-control" id="name" name="name" placeholder="Digite o nome do produto">
        </div>
        <div class="form-group">
            <label for="category">Categoria do produto: </label>
            <input type="text" required class="form-control" id="category" name="category" placeholder="Digite a categoria do produto">
        </div>
        <div class="form-group">
            <label for="price">Preço (R$): </label>
            <input type="number" step=".01" required class="form-control" id="price" name="price" placeholder="Digite o preço">
        </div>
        <div class="form-group">
            <label for="amount">Quantidade disponível: </label>
            <input type="number" required class="form-control" id="amount" name="amount" placeholder="Quantidade disponível">
        </div>
        <div class="form-group">
            <label for="provider">Fornecedor: </label>
            <input type="text" autocomplete="off" list="providers" required class="form-control" id="provider" name="provider" placeholder="Informe o fornecedor">
            <datalist id="providers" name="providers">
                @foreach ($providers as $provider)
                    <option>{{ $provider->name }}</option>
                @endforeach
            </datalist>
        </div>
        <div class="form-group">
            <label for="info">Informações adicionais: </label>
            <textarea type="text" required class="form-control" id="info" name="info" placeholder="Informações adicionais"></textarea>
        </div>
        <button type="submit" class="btn btn-primary btn-create"><ion-icon name="checkmark"></ion-icon> Concluir cadastro</button>
    </form>
</div>
@endsection