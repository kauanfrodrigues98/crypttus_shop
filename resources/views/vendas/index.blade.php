@extends('app')

@section('tab-title', 'Vendas')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">Vendas</li>
                    <li class="breadcrumb-item active" aria-current="page">Relatório</li>
                </ol>
            </nav>
        </div>
        <div class="col-md-4 text-right">
            <button type="button" class="btn btn-outline-primary" onclick="toggleFiltros()">Filtros</button>
        </div>
    </div>

    @include('components.alert')

    <div class="card shadow mb-4 filtros">
        <div class="card-header">
            <h6 class="m-0 font-weight-bold text-primary">Filtros</h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-3">
                    <label for="data_inicial">Data Inicial</label>
                    <input type="date" name="data_inicial" id="data_inicial" class="form-control form-control-sm">
                </div>
                <div class="col-md-3">
                    <label for="data_final">Data Final</label>
                    <input type="date" name="data_final" id="data_final" class="form-control form-control-sm">
                </div>
                <div class="col-md-2 btn_alinhado">
                    <button type="button" class="btn btn-sm btn-primary btn-block">Filtrar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Vendas</h6>
            <div class="dropdown no-arrow">
                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                     aria-labelledby="dropdownMenuLink">
                    <div class="dropdown-header">Ações</div>
                    <a class="dropdown-item" href="{{ route('vendas.create') }}">Nova Venda</a>
                    <a class="dropdown-item" href="#">Exportar PDF</a>
                    <a class="dropdown-item" href="#">Exportar Excel</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-sm">
                        <thead>
                        <tr>
                            <th>Venda</th>
                            <th>Cliente</th>
                            <th>Funcionário</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Data Venda</th>
                            <th class="text-center">Ações</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($vendas as $venda)
                            @php
                                $total = 0
                            @endphp

                            <tr>
                                <td>{{ $venda->id }}</td>
                                <td>{{ $venda->cliente->nome }}</td>
                                <td>{{ $venda->user->nome }}</td>
                                <td>R$ {{ number_format($venda->total, 2, ',', '.') }}</td>
                                @switch($venda->status)
                                    @case(1)
                                        <td><span class="badge badge-info">Aberto</span></td>
                                        @break
                                    @case(2)
                                        <td><span class="badge badge-success">Finalizado</span></td>
                                        @break
                                    @case(3)
                                        <td><span class="badge badge-danger">Cancelado</span></td>
                                        @break
                                @endswitch
                                <td>{{ date('d/m/Y H:i:s', strtotime($venda->created_at)) }}</td>
                                <td class="text-center">
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                             aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Ações</div>
                                            <a class="dropdown-item" href="#">Finalizar</a>
                                            <a class="dropdown-item" href="#">Alterar</a>
                                            <a class="dropdown-item" href="#">Deletar</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">Não foram encontrados registros para serem
                                    exibidos
                                </td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                    <hr>
                    <div class="row mt-2">
                        <div class="col-md-12 pagination_center">
                            {{ $vendas->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
