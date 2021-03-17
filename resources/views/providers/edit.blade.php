@extends('layouts.main')
@section('title', 'Editar cadastro de fornecedor')
@section('content')
<div id="create-container" class="col-md-6 offset-md-3">
    <h1 id="h1-create">Editar cadastro de fornecedor: </h1>
    <form action="/providers/update/{{ $provider->id }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
        <div class="form-group">
            <label for="name">Nome do fornecedor: </label>
            <input type="text" required class="form-control" id="name" name="name" placeholder="Digite o nome do fornecedor" value="{{ $provider->name }}">
        </div>
        <div class="form-group">
            <label for="cpf">CPF/CNPJ: </label>
            <input type="text" required class="form-control" id="cpf" name="cpf" placeholder="Digite o CPF ou CNPJ" value="{{ $provider->cpf }}">
        </div>
        <div class="form-group">
            <label for="contact">Contatos do fornecedor: </label>
            <input type="text" required class="form-control" id="contact" name="contact" placeholder="Digite os numeros d telefone do fornecedor" value="{{ $provider->contact }}">
        </div>
        <div class="form-group">
            <label for="address">Endereço: </label>
            <input type="text" required class="form-control" id="address" name="address" placeholder="Digite o endereço" value="{{ $provider->address }}">
        </div>
        <div class="form-group">
            <label for="info">Informações adicionais: </label>
            <textarea type="text" required class="form-control" id="info" name="info" placeholder="Informações adicionais do fornecedor">{{ $provider->info }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary btn-create"><ion-icon name="save"></ion-icon> Salvar Alterações</button>
    </form>
</div>
@endsection