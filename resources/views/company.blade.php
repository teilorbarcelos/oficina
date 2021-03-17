@extends('layouts.main')
@section('title', 'Dados da empresa')
@section('content')
<div id="create-container" class="col-md-6 offset-md-3">
    @if ($company != '')
    <h1 id="h1-create">Alterar os dados da empresa: </h1>
    <form action="/company/update" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
            <div class="form-group">
                <label for="name">Nome da empresa: </label>
                <input type="text" required class="form-control" id="name" name="name" placeholder="Digite o nome" value="{{ $company->name }}">
            </div>
            <div class="form-group">
                <label for="cpf">CPF/CNPJ: </label>
                <input type="text" required class="form-control" id="cpf" name="cpf" placeholder="Digite o CPF ou CNPJ" value="{{ $company->cpf }}">
            </div>
            <div class="form-group">
                <label for="contact">Contatos: </label>
                <input type="text" required class="form-control" id="contact" name="contact" placeholder="Digite os numeros de telefone da empresa" value="{{ $company->contact }}">
            </div>
            <div class="form-group">
                <label for="address">Endereço: </label>
                <input type="text" required class="form-control" id="address" name="address" placeholder="Digite o endereço" value="{{ $company->address }}">
            </div>
            <button type="submit" class="btn btn-primary btn-create"><ion-icon name="checkmark"></ion-icon> Atualizar dados</button>
        </form>
    @else
    <h1 id="h1-create">Inserir os dados da empresa: </h1>
    <form action="/company/create" method="POST" enctype="multipart/form-data">
        @csrf
            <div class="form-group">
                <label for="name">Nome da empresa: </label>
                <input type="text" required class="form-control" id="name" name="name" placeholder="Digite o nome">
            </div>
            <div class="form-group">
                <label for="cpf">CPF/CNPJ: </label>
                <input type="text" required class="form-control" id="cpf" name="cpf" placeholder="Digite o CPF ou CNPJ">
            </div>
            <div class="form-group">
                <label for="contact">Contatos: </label>
                <input type="text" required class="form-control" id="contact" name="contact" placeholder="Digite os numeros de telefone da empresa">
            </div>
            <div class="form-group">
                <label for="address">Endereço: </label>
                <input type="text" required class="form-control" id="address" name="address" placeholder="Digite o endereço">
            </div>
            <button type="submit" class="btn btn-primary btn-create"><ion-icon name="checkmark"></ion-icon> Inserir dados</button>
        </form>
    @endif
    
</div>
@endsection