{{-- @dd($report) --}}
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

    <title>Imprimir Relatório</title>
</head>
<body>
    <div class="print-report">
        <h1 id="company-name">{{ $company->name }}</h1>
        <h3 id="company-contact">{{ $company->contact }}</h3>
        <h4 id="company-address">{{ $company->address }}</h4>
        <h6 id="company-cpf">{{ $company->cpf }}</h6>
        <table class="table table-striped table-bordered table-hover table-sm table-responsive w-100 p-3">
            <thead>
                <tr>
                    <th id="cod-col" >#</th>
                    <th id="client-col">#Código# Cliente</th>
                    <th id="cpf-col">CPF/CNPJ</th>
                    <th id="date-col">Data</th>
                    <th id="total-col">Subtotal (R$)</th>
                </tr>
            </thead>
            <tbody>
                @php $soma = 0 @endphp
                @for ($i = 0; $i < count($report['id']); $i++)
                @php $soma += $report['vtotal'][$i] @endphp
                    <tr>
                        <td id="cod-col">{{ $report['id'][$i] }}</td>
                        <td id="client-col">{{ $report['client'][$i] }}</td>
                        <th id="cpf-col">{{ $report['cpf'][$i] }}</th>
                        <th id="date-col">{{ $report['date'][$i] }}</th>
                        <th id="total-col">{{ $report['vtotal'][$i] }}</th>
                    </tr>
                @endfor
                <tr>
                    <td id="cod-col"></td>
                    <td id="client-col"></td>
                    <td id="cpf-col"></th>
                    <td id="date-col">Total: </td>
                    <td id="total-col">{{ number_format($soma, 2, '.', '') }}</td>
                </tr>
            </tbody>
        </table>
        <h6 id="print-footer">Developed by Teilor Productions. e-mail: tsb-@live.com</h6>
    </div>
</body>