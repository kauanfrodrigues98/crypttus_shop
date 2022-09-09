@extends('app')

@section('tab-title', 'Vendas')

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Vendas</li>
            <li class="breadcrumb-item active" aria-current="page">Relatório</li>
        </ol>
    </nav>

    @include('components.alert')

    <div class="card shadow mb-4">
        <div
            class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Códigos Grade</h6>
            <div class="dropdown no-arrow">
                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                     aria-labelledby="dropdownMenuLink">
                    <div class="dropdown-header">Ações</div>
                    <a class="dropdown-item" href="{{ route('codigo_grade.create') }}">Novo Código Grade</a>
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
                            <th>Desconto</th>
                            <th>Subtotal</th>
                            <th>Total</th>
                            <th class="text-center">Ações</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($vendas as $venda)
                            <tr>
                                <td>{{ $venda->cliente->nome }}</td>
                                <td>{{ $venda->user->nome }}</td>
                                <td>{{ $venda->desconto_real }}</td>
                                <td>{{ $venda->subtotal }}</td>
                                <td>{{ $venda->total }}</td>
                                <td class="text-center">
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                             aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Ações</div>
                                            <a class="dropdown-item" href="#">Detalhes</a>
                                            <a class="dropdown-item" href="#">Deletar</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">Não foram encontrados registros para serem
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
