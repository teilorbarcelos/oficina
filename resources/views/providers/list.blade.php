@extends('layouts.main')
@section('title', 'Lista de fornecedores')
@section('content')
@include('layouts.search')

<div class="col-md-10 offset-md-1 title-container">
    <h1>Fornecedores Cadastrados: </h1>
</div>
<div class="create-button"><a class="btn btn-primary btn-create btn-sm" href="/provider/create"><ion-icon name="person-add"></ion-icon> Cadastrar novo fornecedor</a></div>
<div class="col-md-10 offset-md-1 list-container">
    @if (count($providers) > 0)
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th id="cod-col" scope="col">#</th>
                    <th id="name-col" scope="col">Nome</th>
                    <th id="cpf-col" scope="col">CPF/CNPJ</th>
                    <th id="contact-col" scope="col">Contato</th>
                    <th id="action-col" scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($providers as $provider)
                    <tr>
                        <td id="cod-col" scope="row">{{ $provider->id }}</td>
                        <td id="name-col" ><a href="/providers/{{ $provider->id }}">{{ $provider->name }}</a></td>
                        <td id="cpf-col">{{ $provider->cpf }}</td>
                        <td id="contact-col">{{ $provider->contact }}</td>
                        <td  id="action-col">
                            <a href="/providers/edit/{{ $provider->id }}" class="btn btn-info btn-edit btn-sm button-table-action"><ion-icon name="create"></ion-icon> Editar</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div id="paginator">
            <p>{{ $providers->withQueryString()->links() }}</p>
        </div>
    @else
        @if ($search)
            <p>Sua busca não retornou nenhum resultado. <a href="/providers/create">Cadastrar fornecedor.</a></p>
        @else
            <p>Você ainda não tem fornecedores cadastrados. <a href="/providers/create">Cadastrar fornecedor.</a></p>
        @endif
    @endif
</div>
@endsection