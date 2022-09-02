@extends('app')

@section('tab-title', 'Funcionários')

@section('content')
    @include('components.alert_request')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url()->previous() }}">Clientes</a></li>
            <li class="breadcrumb-item active" aria-current="page">Cadastro</li>
        </ol>
    </nav>

    <form method="post" action="{{ route('clientes.store') }}">
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
                        <label for="email">E-Mail</label>
                        <input type="email" name="email" id="email" class="form-control form-control-sm">
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-3">
                        <label for="cpf">CPF</label>
                        <input type="text" name="cpf" id="cpf" class="form-control form-control-sm">
                    </div>
                    <div class="col-md-3">
                        <label for="data_nascimento">Data Nascimento<span class="text-danger">*</span></label>
                        <input type="text" name="data_nascimento" id="data_nascimento" class="form-control form-control-sm" required>
                    </div>
                    <div class="col-md-3">
                        <label for="celular">Celular<span class="text-danger">*</span></label>
                        <input type="tel" name="celular" id="celular" class="form-control form-control-sm" required>
                    </div>
                </div>
            </div>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Endereço</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        <label for="cep">CEP</label>
                        <input type="text" name="cep" id="cep" class="form-control form-control-sm" onkeyup="pesquisaCep(this.value)">
                    </div>
                    <div class="col-md-6">
                        <label for="logradouro">Logradouro</label>
                        <input type="text" name="logradouro" id="logradouro" class="form-control form-control-sm">
                    </div>
                    <div class="col-md-3">
                        <label for="numero">Numero</label>
                        <input type="text" name="numero" id="numero" class="form-control form-control-sm">
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-3">
                        <label for="bairro">Bairro</label>
                        <input type="text" name="bairro" id="bairro" class="form-control form-control-sm">
                    </div>
                    <div class="col-md-3">
                        <label for="cidade">Cidade</label>
                        <input type="text" name="cidade" id="cidade" class="form-control form-control-sm">
                    </div>
                    <div class="col-md-3">
                        <label for="uf">UF</label>
                        <select name="uf" id="uf" class="custom-select custom-select-sm">
                            <option value="">Selecione</option>
                            @foreach($ufs as $key => $uf)
                                <option value="{{ $key }}">{{ $uf }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="complemento">Complemento</label>
                        <textarea name="complemento" id="complemento" cols="30" rows="1" class="form-control form-control-sm"></textarea>
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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="{{ asset('js/clientes/create.js') }}"></script>
    @endsection
@endsection
