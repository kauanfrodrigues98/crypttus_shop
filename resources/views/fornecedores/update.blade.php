@extends('app')

@section('tab-title', 'Detalhes Fornecedor')

@section('content')
    @include('components.alert_request')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url()->previous() }}">Fornecedores</a></li>
            <li class="breadcrumb-item active" aria-current="page">Detalhes</li>
        </ol>
    </nav>

    <form method="post" action="{{ route('fornecedores.update') }}">
        @csrf
        <input type="hidden" name="fornecedorId" value="{{ $fornecedorId }}">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Dados Pessoais</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <label for="razao_social">Razão Social<span class="text-danger">*</span></label>
                        <input type="text" name="razao_social" id="razao_social" class="form-control form-control-sm"
                               required value="{{ $fornecedor->razao_social }}">
                    </div>
                    <div class="col-md-6">
                        <label for="nome_fantasia">Nome Fantasia</label>
                        <input type="text" name="nome_fantasia" id="nome_fantasia" class="form-control form-control-sm"
                               value="{{ $fornecedor->nome_fantasia }}">
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-3">
                        <label for="cnpj">CNPJ</label>
                        <input type="text" name="cnpj" id="cnpj" class="form-control form-control-sm"
                               value="{{ $fornecedor->cnpj }}">
                    </div>
                    <div class="col-md-3">
                        <label for="email">E-Mail</label>
                        <input type="email" name="email" id="email" class="form-control form-control-sm"
                               value="{{ $fornecedor->email }}">
                    </div>
                    <div class="col-md-3">
                        <label for="celular">Celular<span class="text-danger">*</span></label>
                        <input type="tel" name="celular" id="celular" class="form-control form-control-sm" required
                               value="{{ $fornecedor->celular }}">
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
                        <input type="text" name="cep" id="cep" class="form-control form-control-sm"
                               onkeyup="pesquisaCep(this.value)" value="{{ $fornecedor->cep }}">
                    </div>
                    <div class="col-md-6">
                        <label for="logradouro">Logradouro</label>
                        <input type="text" name="logradouro" id="logradouro" class="form-control form-control-sm"
                               value="{{ $fornecedor->logradouro }}">
                    </div>
                    <div class="col-md-3">
                        <label for="numero">Numero</label>
                        <input type="text" name="numero" id="numero" class="form-control form-control-sm"
                               value="{{ $fornecedor->numero }}">
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-3">
                        <label for="bairro">Bairro</label>
                        <input type="text" name="bairro" id="bairro" class="form-control form-control-sm"
                               value="{{ $fornecedor->bairro }}">
                    </div>
                    <div class="col-md-3">
                        <label for="cidade">Cidade</label>
                        <input type="text" name="cidade" id="cidade" class="form-control form-control-sm"
                               value="{{ $fornecedor->cidade }}">
                    </div>
                    <div class="col-md-3">
                        <label for="uf">UF</label>
                        <select name="uf" id="uf" class="custom-select custom-select-sm">
                            <option value="">Selecione</option>
                            @foreach($ufs as $key => $uf)
                                <option
                                    value="{{ $key }}" {{ $fornecedor->uf === $key ? 'selected' : '' }}>{{ $uf }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="complemento">Complemento</label>
                        <textarea name="complemento" id="complemento" cols="30" rows="1"
                                  class="form-control form-control-sm">{{ $fornecedor->complemento }}</textarea>
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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"
                integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw=="
                crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="{{ asset('js/fornecedores/create.js') }}"></script>
    @endsection
@endsection
