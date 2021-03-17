@extends('layouts.main')
@section('title', 'Editar cadastro de produto')
@section('content')
<div id="create-container" class="col-md-6 offset-md-3">
    <h1 id="h1-create">Editar cadastro de produto: </h1>
    <form action="/products/update/{{ $product->id }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
        <div class="form-group">
            <label for="name">Nome do produto: </label>
            <input type="text" required class="form-control" id="name" name="name" placeholder="Digite o nome do produto" value="{{ $product->name }}">
        </div>
        <div class="form-group">
            <label for="category">Categoria do produto: </label>
            <input type="text" required class="form-control" id="category" name="category" placeholder="Digite a categoria do produto" value="{{ $product->category }}">
        </div>
        <div class="form-group">
            <label for="price">Preço (R$): </label>
            <input type="number" step=".01" required class="form-control" id="price" name="price" placeholder="Digite o preço" value="{{ $product->price }}">
        </div>
        <div class="form-group">
            <label for="amount">Quantidade disponível: </label>
            <input type="number" required class="form-control" id="amount" name="amount" placeholder="Quantidade disponível" value="{{ $product->amount }}">
        </div>
        <div class="form-group">
            <label for="provider">Fornecedor: </label>
            <input type="text" autocomplete="off" list="providers" required class="form-control" id="provider" name="provider" placeholder="Informe o fornecedor" value="{{ $product->provider }}">
            <datalist id="providers" name="providers">
                @foreach ($providers as $provider)
                    <option>{{ $provider->name }}</option>
                @endforeach
            </datalist>
        </div>
        <div class="form-group">
            <label for="info">Informações adicionais: </label>
            <textarea type="text" required class="form-control" id="info" name="info" placeholder="Informações adicionais">{{ $product->info }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary btn-create"><ion-icon name="save"></ion-icon> Salvar Alterações</button>
    </form>
</div>
@endsection