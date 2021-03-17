<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- CSS do Google -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">

    <!-- CSS do Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <!-- meu CSS e JS -->
    <link rel="stylesheet" href="/css/styles.css">

    <title>Imprimir Venda</title>
</head>
<body>
    <div class="print-sale">
        <h1 id="company-name">{{ $company->name }}</h1>
        <h3 id="company-contact">{{ $company->contact }}</h3>
        <h4 id="company-address">{{ $company->address }}</h4>
        <h6>Código da Venda: {{ $sale->id }}</h6>
        <h5>Cliente: {{ $sale->client }}</h5>
        <h6>CPF/CNPJ: {{ $sale->cpf }}</h6>
        <table class="table table-striped table-bordered table-hover table-sm table-responsive w-100 p-3">
            <thead>
                <tr style="text-align: center;">
                    <th id="cod-col">#</th>
                    <th id="product-col">#Código# Produto</th>
                    <th id="unity-price-col">Preço un. (R$)</th>
                    <th id="amount-col">Quantidade</th>
                    <th id="subtotal-col">Subtotal (R$)</th>
                </tr>
            </thead>
            <tbody>
                @for ($i = 0; $i < count($sale->prods); $i++)
                    <tr>
                        <td id="cod-col" scope="row">{{ $i + 1 }}</td>
                        <td id="product-col" >{{ $sale->prods[$i] }}</a></td>
                        <td id="unity-price-col" scope="col">{{ number_format($sale->subtprods[$i] / $sale->amountprods[$i], 2, '.', '') }}</th>
                        <td id="amount-col">{{ $sale->amountprods[$i] }}</td>
                        <td id="subtotal-col">{{ number_format($sale->subtprods[$i], 2, '.', '') }}</td>
                    </tr>
                @endfor
                <tr>
                    <td id="cod-col" scope="row"></td>
                    <td id="product-col" ></a></td>
                    <td id="unity-price-col" scope="col"></th>
                    <td id="amount-col">Total: </td>
                    <td id="subtotal-col">{{ $sale->vtotal }}</td>
                </tr>
            </tbody>
        </table>
        <h6>Assinatura:______________________________________________</h6>
        <h6 id="company-cpf">{{ $company->cpf }}</h6>
        <h6 id="print-footer">Developed by Teilor Productions. e-mail: tsb-@live.com</h6>
    </div>
</body>