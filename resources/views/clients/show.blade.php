@extends('layouts.main')
@section('title', $client->name)
@section('content')
    <div class="col-md-10 offset-md-1 show-container">
        <div class="row">
            <div id="container" class="col-md-6">
                <h1>{{ $client->name }}</h1>
                <p class="client-cpf"><ion-icon name="card"></ion-icon> {{ $client->cpf }}.</p>
                <p class="client-contact"><ion-icon name="call"></ion-icon> {{ $client->contact }}.</p>
                <p class="client-address"><ion-icon name="pin"></ion-icon> {{ $client->address }}.</p>
            </div>
            <div class="col-md-12" id="info-container">
                <h3>Informações adicionais: </h3>
                <p class="client-info"><ion-icon name="information-circle"></ion-icon> {{ $client->info }}.</p>
            </div>
            <a href="/clients/edit/{{ $client->id }}" class="btn btn-info btn-edit btn-sm button-table-action"><ion-icon name="create"></ion-icon> Editar cadastro</a>
            <a href="/sale/create?client={{ $client->id }}" class="btn btn-primary" id="client-submit"><ion-icon name="clipboard"></ion-icon> Nota de venda/serviço</a>
        </div>
    </div>
@endsection