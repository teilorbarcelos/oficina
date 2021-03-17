@extends('layouts.main')
@section('title', 'Lista de clientes')
@section('content')
@include('layouts.search')

<div class="col-md-10 offset-md-1 title-container">
    <h1>Clientes Cadastrados: </h1>
</div>
<div class="create-button"><a class="btn btn-primary btn-create btn-sm" href="/client/create"><ion-icon name="person-add"></ion-icon> Cadastrar novo cliente</a></div>
<div class="col-md-10 offset-md-1 list-container">
    @if (count($clients) > 0)
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
                @foreach ($clients as $client)
                    <tr>
                        <td id="cod-col" scope="row">{{ $client->id }}</td>
                        <td id="name-col" ><a href="/clients/{{ $client->id }}">{{ $client->name }}</a></td>
                        <td id="cpf-col">{{ $client->cpf }}</td>
                        <td id="contact-col">{{ $client->contact }}</td>
                        <td  id="action-col">
                            <a href="/clients/edit/{{ $client->id }}" class="btn btn-info btn-edit btn-sm button-table-action"><ion-icon name="create"></ion-icon> Editar</a>
                            <a href="/sale/create?client={{ $client->id }}" class="btn btn-primary btn-sm button-table-action" id="client-submit"><ion-icon name="clipboard"></ion-icon> Nota de venda/serviço</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div id="paginator">
            <p>{{ $clients->withQueryString()->links() }}</p>
        </div>
    @else
        @if ($search)
            <p>Sua busca não retornou nenhum resultado. <a href="/clients/create">Cadastrar cliente.</a></p>
        @else
            <p>Você ainda não tem clientes cadastrados. <a href="/clients/create">Cadastrar cliente.</a></p>
        @endif
    @endif
</div>
@endsection