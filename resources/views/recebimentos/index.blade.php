@section('styles')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
@endsection

@extends('app')

@section('tab-title', 'Recebimentos')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">Recebimentos</li>
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
            <form action="" method="GET">
                @csrf
                <div class="row">
                    <div class="col-md-3">
                        <label for="data_inicial">Data Inicial</label>
                        <input type="date" name="data_inicial" id="data_inicial" class="form-control form-control-sm"
                               value="{{ $data_inicial }}">
                    </div>
                    <div class="col-md-3">
                        <label for="data_final">Data Final</label>
                        <input type="date" name="data_final" id="data_final" class="form-control form-control-sm"
                               value="{{ $data_final }}">
                    </div>
                    <div class="col-md-2 btn_alinhado">
                        <button type="submit" class="btn btn-sm btn-primary btn-block">Filtrar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Recebimentos</h6>
            <div class="dropdown no-arrow">
                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                     aria-labelledby="dropdownMenuLink">
                    <div class="dropdown-header">Ações</div>
                    <a class="dropdown-item" href="{{ route('recebimentos.create') }}">Novo Recebimento</a>
                    <a class="dropdown-item" href="#">Exportar PDF</a>
                    <a class="dropdown-item" href="#">Exportar Excel</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <table id="tabela_vendas" class="table table-sm">
                        <thead>
                        <tr>
                            <th>Recebimento</th>
                            <th>Funcionário</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Data Recebimento</th>
                            <th class="text-center">Ações</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($recebimentos as $recebimento)
                            <tr>
                                <td>{{ $recebimento->id }}</td>
                                <td>{{ $recebimento->cliente->nome }}</td>
                                <td>{{ $recebimento->user->nome }}</td>
                                <td>R$ {{ number_format($recebimento->total, 2, ',', '.') }}</td>
                                <td>{{ date('d/m/Y H:i:s', strtotime($recebimento->created_at)) }}</td>
                                <td class="text-center">
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                             aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Ações</div>
                                            <a class="dropdown-item"
                                               href="{{ route('recebimentos.show', ['id' => $recebimento->id]) }}">Detalhes</a>
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
                </div>
            </div>
        </div>
    </div>
    @section('scripts')
        <script type="text/javascript" charset="utf8"
                src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
        <script src="{{ asset('js/vendas/index.js') }}"></script>
    @endsection
@endsection
