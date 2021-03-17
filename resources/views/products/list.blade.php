@extends('layouts.main')
@section('title', 'Lista de productos')
@section('content')
@include('layouts.search')

<div class="col-md-10 offset-md-1 title-container">
    <h1>Productos Cadastrados: </h1>
</div>
<div class="create-button"><a class="btn btn-primary btn-create btn-sm" href="/product/create"><ion-icon name="add-circle"></ion-icon> Cadastrar novo producto</a></div>
<div class="col-md-10 offset-md-1 list-container">
    @if (count($products) > 0)
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th id="cod-col" scope="col">@sortablelink('id', '#')</th>
                    <th id="name-col" scope="col">@sortablelink('name', 'Nome')</th>
                    <th id="category-col" scope="col">@sortablelink('category', 'Categoria')</th>
                    <th id="price-col" scope="col">@sortablelink('price', 'Preço (R$)')</th>
                    <th id="amount-col" scope="col">@sortablelink('amount', 'Quantidade')</th>
                    <th id="action-col" scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td id="cod-col" scope="row">{{ $product->id }}</td>
                        <td id="name-col" ><a href="/products/{{ $product->id }}">{{ $product->name }}</a></td>
                        <td id="category-col">{{ $product->category }}</td>
                        <td id="price-col">{{ $product->price }}</td>
                        <td  id="amount-col">{{ $product->amount }}</td>
                        <td  id="action-col">
                            <a href="/products/edit/{{ $product->id }}" class="btn btn-info btn-edit btn-sm button-table-action"><ion-icon name="create"></ion-icon> Editar</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div id="paginator">
            <p>{{ $products->withQueryString()->links() }}</p>
        </div>
    @else
        @if ($search)
            <p>Sua busca não retornou nenhum resultado. <a href="/products/create">Cadastrar produto.</a></p>
        @else
            <p>Você ainda não tem productos cadastrados. <a href="/products/create">Cadastrar produto.</a></p>
        @endif
    @endif
</div>
@endsection