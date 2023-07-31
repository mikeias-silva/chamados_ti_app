@extends('layouts.master')

@section('content')
    <div class="container">
        <h1 class="mb-4">Indicadores</h1>

        <div class="row">
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <h2 class="card-title">Chamados por Categoria</h2>
                    </div>
                    <ul class="list-group list-group-flush">
                        @foreach($chamadosPorCategoria as $chamadoPorCategoria)
                            <li class="list-group-item">
                                {{ $chamadoPorCategoria->categoria->nome }}
                                <span class="badge bg-primary">{{ $chamadoPorCategoria->total_chamados }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <h2 class="card-title">Total de Chamados Abertos</h2>
                    </div>
                    <div class="card-body">
                        <p class="card-text display-4">{{ $totalChamadosAbertos }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <h2 class="card-title">Total de Chamados Resolvidos dentro do Prazo</h2>
                    </div>
                    <div class="card-body">
                        <p class="card-text display-4">{{ $totalChamadosResolvidos }}</p>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <h2 class="card-title">Percentual de Chamados Resolvidos dentro do Prazo</h2>
                    </div>
                    <div class="card-body">
                        <p class="card-text display-4">{{ isset($percentualResolvidosDentroPrazo) ? number_format($percentualResolvidosDentroPrazo, 2) . '%' : 'N/A' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
