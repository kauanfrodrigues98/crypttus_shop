@extends('app')

@section('tab-title', 'Produtos')

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Produtos</li>
            <li class="breadcrumb-item active" aria-current="page">Relatório</li>
        </ol>
    </nav>

    <div class="card shadow mb-4">
        <div
            class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Produtos</h6>
            <div class="dropdown no-arrow">
                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                     aria-labelledby="dropdownMenuLink">
                    <div class="dropdown-header">Ações</div>
                    <a class="dropdown-item" href="{{ route('produtos.create') }}">Novo Produto</a>
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
                                <th>Nome</th>
                                <th>E-mail</th>
                                <th>Criado em</th>
                                <th class="text-center">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($produtos as $produto)
                                <tr>
                                    <td>{{ $produto->nome }}</td>
                                    <td>{{ $produto->email }}</td>
                                    <td>{{ Helper::dataHoraSQLparaBR($produto->created_at) }}</td>
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
{{--                                    <td><a href="#" class="btn btn-primary btn-sm">Detalhes</a></td>--}}
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center">Não foram encontrados registros para serem exibidos</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection