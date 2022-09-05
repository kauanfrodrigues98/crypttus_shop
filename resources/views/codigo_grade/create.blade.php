@section('styles')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
@endsection

@extends('app')

@section('tab-title', 'Tamanhos')

@section('content')
    @include('components.alert_request')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url()->previous() }}">Código Grade</a></li>
            <li class="breadcrumb-item active" aria-current="page">Cadastro</li>
        </ol>
    </nav>

    <form method="post" action="{{ route('codigo_grade.store') }}">
        @csrf
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Dados Principais</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <label for="produto">Produto</label>
                        <select id="produto" name="produtos[]" class="custom-select custom-select-sm" multiple></select>
                    </div>
                    <div class="col-md-3">
                        <label for="cor">Cor</label>
                        <select id="cor" name="cores[]" class="custom-select custom-select-sm" multiple></select>
                    </div>
                    <div class="col-md-3">
                        <label for="tamanho">Tamanho</label>
                        <select id="tamanho" name="tamanhos[]" class="custom-select custom-select-sm" multiple></select>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-2 offset-md-5 btn_alinhado">
                        <button type="button" class="btn btn-sm btn-primary btn-block" onclick="gerarGrade()">
                            Adicionar
                        </button>
                    </div>
                </div>

                <div class="row mt-5">
                    <div class="col-md-6 offset-md-3">
                        <table id="tabela_codigos" class="table table-sm">
                            <thead>
                            <tr>
                                <th>Código Grade</th>
                                <th>Código Base</th>
                                <th>Cor</th>
                                <th>Tamanho</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-2">
            <div class="col-md-4 offset-md-4">
                <button type="submit" class="btn btn-sm btn-success btn-block">Salvar</button>
            </div>
        </div>
    </form>

    @section('scripts')
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script src="{{ asset('js/codigo_grade/create.js') }}"></script>
    @endsection
@endsection
