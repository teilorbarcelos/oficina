@extends('layouts.main')
@section('title', 'Cadastro de cliente')
@section('content')
<div id="create-container" class="col-md-6 offset-md-3">
    <h1 id="h1-create">Cadastro de novo cliente: </h1>
    <form action="/clients/create" method="POST" enctype="multipart/form-data">
    @csrf
        <div class="form-group">
            <label for="name">Nome do cliente: </label>
            <input type="text" required class="form-control" id="name" name="name" placeholder="Digite o nome do cliente">
        </div>
        <div class="form-group">
            <label for="cpf">CPF/CNPJ: </label>
            <input type="text" required class="form-control" id="cpf" name="cpf" placeholder="Digite o CPF ou CNPJ">
        </div>
        <div class="form-group">
            <label for="contact">Contatos do cliente: </label>
            <input type="text" required class="form-control" id="contact" name="contact" placeholder="Digite os numeros d telefone do cliente">
        </div>
        <div class="form-group">
            <label for="address">Endereço: </label>
            <input type="text" required class="form-control" id="address" name="address" placeholder="Digite o endereço">
        </div>
        <div class="form-group">
            <label for="info">Informações adicionais: </label>
            <textarea type="text" required class="form-control" id="info" name="info" placeholder="Informações adicionais do cliente"></textarea>
        </div>
        <button type="submit" class="btn btn-primary btn-create"><ion-icon name="checkmark"></ion-icon> Concluir cadastro</button>
    </form>
</div>
@endsection