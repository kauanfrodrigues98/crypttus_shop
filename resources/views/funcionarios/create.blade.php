@extends('app')

@section('tab-title', 'Funcionários')

@section('content')
    @include('components.alert_request')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url()->previous() }}">Funcionários</a></li>
            <li class="breadcrumb-item active" aria-current="page">Cadastro</li>
        </ol>
    </nav>

    <form method="post" action="{{ route('user.store') }}">
        @csrf
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Dados Pessoais</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <label for="nome">Nome<span class="text-danger">*</span></label>
                        <input type="text" name="nome" id="nome" class="form-control form-control-sm" required>
                    </div>
                    <div class="col-md-6">
                        <label for="email">E-Mail<span class="text-danger">*</span></label>
                        <input type="email" name="email" id="email" class="form-control form-control-sm" required>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-3">
                        <label for="usuario">Usuário<span class="text-danger">*</span></label>
                        <input type="text" name="usuario" id="usuario" class="form-control form-control-sm" required>
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
