@extends('layouts.main')
@section('title', 'Cadastro de fornecedor')
@section('content')
<div id="create-container" class="col-md-6 offset-md-3">
    <h1 id="h1-create">Cadastro de novo fornecedor: </h1>
    <form action="/providers/create" method="POST" enctype="multipart/form-data">
    @csrf
        <div class="form-group">
            <label for="name">Nome do fornecedor: </label>
            <input type="text" required class="form-control" id="name" name="name" placeholder="Digite o nome do fornecedor">
        </div>
        <div class="form-group">
            <label for="cpf">CPF/CNPJ: </label>
            <input type="text" required class="form-control" id="cpf" name="cpf" placeholder="Digite o CPF ou CNPJ">
        </div>
        <div class="form-group">
            <label for="contact">Contatos do fornecedor: </label>
            <input type="text" required class="form-control" id="contact" name="contact" placeholder="Digite os numeros d telefone do fornecedor">
        </div>
        <div class="form-group">
            <label for="address">Endereço: </label>
            <input type="text" required class="form-control" id="address" name="address" placeholder="Digite o endereço">
        </div>
        <div class="form-group">
            <label for="info">Informações adicionais: </label>
            <textarea type="text" required class="form-control" id="info" name="info" placeholder="Informações adicionais do fornecedor"></textarea>
        </div>
        <button type="submit" class="btn btn-primary btn-create"><ion-icon name="checkmark"></ion-icon> Concluir cadastro</button>
    </form>
</div>
@endsection