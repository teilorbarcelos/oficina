@extends('layouts.main')
@section('title', 'Lista de Vendas')
@section('content')
@include('layouts.search')

<div class="col-md-10 offset-md-1 title-container" id="title-sales-container">
    <h1>Vendas e serviços realizados: </h1>
    <a class="btn btn-primary btn-create btn-sm" href="/sale/create" id="create-sale-button"><ion-icon name="add-circle"></ion-icon> Realizar venda</a>
</div>
<div class="date-filter-container">
    <form action="" method="GET">
        <div class="campos-form-filtro">
            <h6 id="label-filter-date">Filtrar por data: </h6>
            <label id="label-date-begin" for="date-begin">Data de início: </label>
            <input type="date" class="form-control" id="date-begin" name="date-begin" value="{{ $dateBegin }}">
            <label id="label-date-end" for="date-end">Data de término: </label>
            <input type="date" class="form-control" id="date-end" name="date-end" value="{{ $dateEnd }}">
            <button type="submit" class="btn btn-primary btn-sm" id="button-filter"><ion-icon name="funnel"></ion-icon> Filtrar</button>
        </div>
    </form>
</div>
<div class="col-md-10 offset-md-1 list-container">
    @if (count($sales) > 0)
        <form class="container overflow-auto" target="_blank" action="sales/report" " method="POST">
        @csrf
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th id="cod-col" scope="col">@sortablelink('id', '#')</th>
                        <th id="client-col" scope="col">@sortablelink('client', 'Cliente')</th>
                        <th id="cpf-col" scope="col">CPF/CNPJ</th>
                        <th id="vtotal-col" scope="col">@sortablelink('vtotal', 'Total (R$)')</th>
                        <th id="date-col" scope="col">@sortablelink('created_at', 'Data')</th>
                        <th id="action-col" scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($report as $reportite)
                        <input type="hidden" name="id[]" value="{{ $reportite->id }}">
                        <input type="hidden" name="client[]" value="{{ $reportite->client }}">
                        <input type="hidden" name="cpf[]" value="{{ $reportite->cpf }}">
                        <input type="hidden" step=".01" name="vtotal[]" value="{{ $reportite->vtotal }}">
                        <input type="hidden" name="date[]" value="{{ date('d/m/y', strtotime($reportite->created_at)) }}">
                    @endforeach
                    @foreach ($sales as $sale)
                        <tr>
                            <td id="cod-col" scope="row">{{ $sale->id }}</td>
                            <td id="client-col" ><a href="/sales/{{ $sale->id }}">{{ $sale->client }}</a></td>
                            <td id="cpf-col">{{ $sale->cpf }}</td>
                            <td id="vtotal-col">{{ $sale->vtotal }}</td>
                            <td  id="date-col">{{ date('d/m/y', strtotime($sale->created_at)) }}</td>
                            <td  id="action-col">
                                <a target="_blank" href="/sales/print/{{ $sale->id }}" class="btn btn-info btn-print btn-sm button-table-action"><ion-icon name="print"></ion-icon> Imprimir venda</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="print-report-button"><button type="submit" class="btn btn-info btn-create btn-sm"><ion-icon name="paper"></ion-icon> Imprimir Relatório</button></div>
        </form>
        <div id="paginator">
            <p>{{ $sales->withQueryString()->links() }}</p>
        </div>
    @else
        @if ($search)
            <p>Sua busca não retornou nenhum resultado. <a href="/sales/create">Realizar venda.</a></p>
        @else
            <p>Você ainda não fez nenhuma venda. <a href="/sales/create">Realizar venda.</a></p>
        @endif
    @endif
</div>
@endsection