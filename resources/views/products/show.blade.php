@extends('layouts.main')
@section('title', $product->name)
@section('content')
    <div class="col-md-10 offset-md-1 show-container">
        <div class="row">
            <div id="container" class="col-md-6">
                <h1>{{ $product->name }}</h1>
                <p class="product-category"><ion-icon name="folder"></ion-icon>Categoria: {{ $product->category }}.</p>
                <p class="product-price"><ion-icon name="pricetag"></ion-icon>Preço: R$ {{ $product->price }}.</p>
                <p class="product-amount"><ion-icon name="logo-buffer"></ion-icon>Quantidade disponível: {{ $product->amount }}.</p>
                <p class="product-provider"><ion-icon name="cart"></ion-icon>Fornecedor: {{ $product->provider }}.</p>
            </div>
            <div class="col-md-12" id="info-container">
                <h3>Informações adicionais: </h3>
                <p class="product-info"><ion-icon name="information-circle"></ion-icon> {{ $product->info }}.</p>
            </div>
            <a href="/products/edit/{{ $product->id }}" class="btn btn-info btn-edit btn-sm button-table-action">
                <ion-icon name="create"></ion-icon> Editar cadastro
            </a>
        </div>
    </div>
@endsection