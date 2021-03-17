@extends('layouts.main')
@section('title', 'Venda nº: '.$sale->id)
@section('content')
    <div class="col-md-10 offset-md-1 show-container">
        <div class="row">
            <div id="container" class="col-md-6">
                <h1>Venda nº: {{ $sale->id }}</h1>
                <p class="sale-client"><ion-icon name="people"></ion-icon> {{ $sale->client }}.</p>
                <p class="sale-cpf"><ion-icon name="card"></ion-icon> {{ $sale->cpf }}.</p>
            </div>
            <div id="sale-table">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th id="cod-col" scope="col">#</th>
                            <th id="product-sv-col" scope="col">Produto</th>
                            <th id="unity-price-sv-col" scope="col">Preço un. (R$)</th>
                            <th id="amount-sv-col" scope="col">Quantidade</th>
                            <th id="subtotal-sv-col" scope="col">Subtotal (R$)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @for ($i = 0; $i < count($prods['prod']); $i++)
                            <tr>
                                <td id="cod-col" scope="row">{{ $i + 1 }}</td>
                                <td id="product-sv-col" >{{ $prods['prod'][$i] }}</a></td>
                                <td id="unity-price-sv-col" scope="col">{{ number_format($prods['subtotal'][$i] / $prods['amount'][$i], 2, '.', '') }}</th>
                                <td id="amount-sv-col">{{ $prods['amount'][$i] }}</td>
                                <td id="subtotal-sv-col">{{ number_format($prods['subtotal'][$i], 2, '.', '') }}</td>
                            </tr>
                        @endfor
                        <tr>
                            <td id="cod-col" scope="row"></td>
                            <td id="product-sv-col" ></a></td>
                            <td id="unity-price-sv-col" scope="col"></th>
                            <td id="amount-sv-col">Total: </td>
                            <td id="subtotal-sv-col">{{ $sale->vtotal }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div id="print-button">
                <a target="_blank" href="/sales/print/{{ $sale->id }}" class="btn btn-info btn-print btn-sm button-table-action"><ion-icon name="print"></ion-icon> Imprimir Venda</a>
            </div>
        </div>
    </div>
@endsection