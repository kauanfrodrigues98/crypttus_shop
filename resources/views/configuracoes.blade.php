@section('styles')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
@endsection

@extends('app')

@section('tab-title', 'Configuraçoes')

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Configurações</li>
        </ol>
    </nav>

    @include('components.alert')

    <div class="card shadow mb-4">
        <div
            class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Configurações</h6>
            <div class="dropdown no-arrow">
                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                     aria-labelledby="dropdownMenuLink">
                    <div class="dropdown-header">Ações</div>
                    @can('create', 'App\Models\Cores')
                        <a class="dropdown-item" href="{{ route('cores.create') }}">Nova Cor</a>
                    @endcan
                    <a class="dropdown-item" href="#">Exportar PDF</a>
                    <a class="dropdown-item" href="#">Exportar Excel</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-1">
                    <label for="usa_caixa_inicial">Usa Caixa Inicial</label>
                    <select name="usa_caixa_inicial" id="usa_caixa_inicial" class="custom-select custom-select-sm">
                        <option value="Sim">Sim</option>
                        <option value="Não">Não</option>
                    </select>
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
