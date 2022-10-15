@section('styles')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
@endsection

@extends('app')

@section('tab-title', 'Sangrias')

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Sangrias</li>
            <li class="breadcrumb-item active" aria-current="page">Relatório</li>
        </ol>
    </nav>

    @include('components.alert')

    <div class="card shadow mb-4">
        <div
            class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Sangrias</h6>
            <div class="dropdown no-arrow">
                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                     aria-labelledby="dropdownMenuLink">
                    <div class="dropdown-header">Ações</div>
                    @can('create', 'App\Models\Sangrias')
                        <a class="dropdown-item" href="{{ route('sangrias.create') }}">Nova Sangria</a>
                    @endcan
                    @can('view', 'App\Models\Sangrias')
                        <a class="dropdown-item" href="{{ route('clientes.pdf') }}" target="_blank">Exportar PDF</a>
                    @endcan
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
                            <th>Funcionário</th>
                            <th>Data Sangria</th>
                            <th>Descrição</th>
                            <th>Total</th>
                            <th class="text-center">Ações</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($sangrias as $sangria)
                            <tr>
                                <td>{{ $sangria->user->nome }}</td>
                                <td>{{ Helper::dataSQLparaBR($sangria->data) }}</td>
                                <td>{{ $sangria->descricao }}</td>
                                <td>{{ number_format($sangria->total, 2, ',', '.') }}</td>
                                <td class="text-center">
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                             aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Ações</div>
                                            @can('update', 'App\Models\Sangrias')
                                                <a class="dropdown-item"
                                                   href="{{ route('sangrias.show', ['id' => $sangria->id]) }}">Detalhes</a>
                                            @endcan
                                            @can('delete', 'App\Models\Sangrias')
                                                <a class="dropdown-item" href="#">Deletar</a>
                                            @endcan
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">Não foram encontrados registros para serem
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
        <script src="{{ asset('js/clientes/index.js') }}"></script>
    @endsection
@endsection
