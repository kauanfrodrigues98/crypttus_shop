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

        <input type="hidden" id="cod_grade">
        <input type="hidden" id="descricao_hidden">

        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Dados Principais</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <label for="funcionario">Funcionário<span class="text-danger">*</span></label>
                        <select name="funcionario" id="funcionario" class="custom-select custom-select-sm"
                                required></select>
                    </div>
                    <div class="col-md-6">
                        <label for="cliente">Cliente<span class="text-danger">*</span></label>
                        <select name="cliente" id="cliente" class="custom-select custom-select-sm" required></select>
                    </div>
                </div>
            </div>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Produto</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <label for="produto">Produto</label>
                        <select name="produto" id="produto" class="custom-select custom-select-sm"></select>
                    </div>
                    <div class="col-md-3">
                        <label for="quantidade">Quantidade</label>
                        <input type="text" name="quantidade" id="quantidade" class="form-control form-control-sm"
                               onkeyup="calculaSubtotal()">
                    </div>
                    <div class="col-md-3">
                        <label for="preco_unitario">Preço Unitário</label>
                        <input type="text" name="preco_unitario" id="preco_unitario"
                               class="form-control form-control-sm" readonly>
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="col-md-3">
                        <label for="desconto_real">Desconto (R$)</label>
                        <input type="text" name="desconto_real" id="desconto_real" class="form-control form-control-sm"
                               onkeyup="calculaDesconto(1)">
                    </div>
                    <div class="col-md-3">
                        <label for="desconto_perc">Desconto (%)</label>
                        <input type="text" name="desconto_perc" id="desconto_perc" class="form-control form-control-sm"
                               onkeyup="calculaDesconto(2)">
                    </div>
                    <div class="col-md-3">
                        <label for="subtotal">Subtotal</label>
                        <input type="text" name="subtotal" id="subtotal" class="form-control form-control-sm">
                    </div>
                    <div class="col-md-3 btn_alinhado">
                        <button type="button" class="btn btn-sm btn-primary btn-block" onclick="adicionar()">Adicionar
                        </button>
                    </div>
                </div>

                <hr class="mt-4">

                <div class="row mt-4">
                    <div class="col-md-12">
                        <table id="tabela_produtos" class="table table-sm table-hover">
                            <thead>
                            <tr>
                                <th>Código</th>
                                <th>Descrição</th>
                                <th>Qtd</th>
                                <th>Prc Unit</th>
                                <th>Desconto (R$)</th>
                                <th>Subtotal</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="col-md-12 centralizado">
                        <label class="lblCifrao">R$&nbsp;</label><span class="spanTotal">0,00</span>
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
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
        <script src="{{ asset('js/vendas/create.js') }}"></script>
    @endsection
@endsection
