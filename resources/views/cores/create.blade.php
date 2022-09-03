@extends('app')

@section('tab-title', 'Cores')

@section('content')
    @include('components.alert_request')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url()->previous() }}">Cores</a></li>
            <li class="breadcrumb-item active" aria-current="page">Cadastro</li>
        </ol>
    </nav>

    <form method="post" action="{{ route('cores.store') }}">
        @csrf
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Dados Pessoais</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        <label for="codigo">Código<span class="text-danger">*</span></label>
                        <input type="text" name="codigo" id="codigo" class="form-control form-control-sm" required>
                    </div>
                    <div class="col-md-3">
                        <label for="cor">Cor<span class="text-danger">*</span></label>
                        <input type="text" name="cor" id="cor" class="form-control form-control-sm" required>
                    </div>
                    <div class="col-md-6">
                        <label for="descricao">Descrição</label>
                        <input type="text" name="descricao" id="descricao" class="form-control form-control-sm">
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
@endsection
