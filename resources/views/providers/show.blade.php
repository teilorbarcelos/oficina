@extends('layouts.main')
@section('title', $provider->name)
@section('content')
    <div class="col-md-10 offset-md-1 show-container">
        <div class="row">
            <div id="container" class="col-md-6">
                <h1>{{ $provider->name }}</h1>
                <p class="provider-cpf"><ion-icon name="card"></ion-icon> {{ $provider->cpf }}.</p>
                <p class="provider-contact"><ion-icon name="call"></ion-icon> {{ $provider->contact }}.</p>
                <p class="provider-address"><ion-icon name="pin"></ion-icon> {{ $provider->address }}.</p>
            </div>
            <div class="col-md-12" id="info-container">
                <h3>Informações adicionais: </h3>
                <p class="provider-info"><ion-icon name="information-circle"></ion-icon> {{ $provider->info }}.</p>
            </div>
            <a href="/providers/edit/{{ $provider->id }}" class="btn btn-info btn-edit btn-sm button-table-action"><ion-icon name="create"></ion-icon> Editar cadastro</a>
        </div>
    </div>
@endsection