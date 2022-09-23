@section('styles')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
@endsection

@extends('app')

@section('tab-title', 'Detalhes Venda')

@section('content')
    @include('components.alert_request')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url()->previous() }}">Vendas</a></li>
            <li class="breadcrumb-item active" aria-current="page">Detalhes</li>
        </ol>
    </nav>

    <form method="post" action="{{ route('vendas.store') }}">
        @csrf

        <input type="hidden" id="cod_grade">
        <input type="hidden" id="descricao_hidden">
        <input type="hidden" name="total" id="total">

        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Dados Principais</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <label for="funcionario">Funcionário<span class="text-danger">*</span></label>
                        <input type="text" id="funcionario" class="form-control form-control-sm"
                               value="{{ $venda->user->nome }}" readonly>
                    </div>
                    <div class="col-md-6">
                        <label for="cliente">Cliente<span class="text-danger">*</span></label>
                        <input type="text" id="cliente" class="form-control form-control-sm"
                               value="{{ $venda->cliente->nome }}" readonly>
                    </div>
                </div>
            </div>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Produto</h6>
            </div>
            <div class="card-body">
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
                                <th>Desconto (%)</th>
                                <th>Subtotal</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($venda->produtoVenda as $prod)
                                <tr>
                                    <td>{{ $prod->codigo_grade }}</td>
                                    <td>{{ $prod->codigoGrade->produto->nome }}</td>
                                    <td>{{ $prod->quantidade }}</td>
                                    <td>{{ number_format($prod->preco_unitario, 2, ',', '.') }}</td>
                                    <td>{{ number_format($prod->desconto_real, 2, ',', '.') }}</td>
                                    <td>{{ number_format($prod->desconto_perc, 2, ',', '.') }}</td>
                                    <td>{{ number_format($prod->subtotal, 2, ',', '.') }}</td>
                                    <td>{{ $venda->codigo }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6">Não conseguimos localizar os produtos dessa venda</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="col-md-12 centralizado">
                        <label class="lblCifrao">R$&nbsp;</label><span
                            class="spanTotal">{{ number_format($venda->total, 2, ',', '.') }}</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Pagamento</h6>
            </div>
            <div class="card-body">

                <div class="row mt-4">
                    <div class="col-md-6 offset-md-3">
                        <table id="tabela_forma" class="table table-hover table-sm table-striped">
                            <thead>
                            <tr>
                                <th>Forma Pagamento</th>
                                <th>Nº Parcelas</th>
                                <th>Valor (R$)</th>
                                <th>Valor Parcela (R$)</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $totalForma = 0;
                            @endphp
                            @forelse($venda->formaPagamento as $forma)
                                <tr>
                                    <td>{{ $forma->forma_pagamento }}</td>
                                    <td>{{ $forma->parcelas }}</td>
                                    <td>{{ number_format($forma->valor, 2, ',', '.') }}</td>
                                    <td>{{ number_format($forma->valor_parcela, 2, ',', '.') }}</td>
                                </tr>

                                @php
                                    $totalForma = $totalForma + $forma->valor;
                                @endphp
                            @empty
                                <tr>
                                    <td colspan="3">Não localizamos nenhuma forma de pagamento para esta venda</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="col-md-12 centralizado">
                        <p class="lblCifrao centralizado">Total Pago</p>
                        <label class="lblCifrao">R$&nbsp;</label><span
                            class="spanFalta">{{ number_format($totalForma, 2, ',', '.') }}</span>
                    </div>
                </div>
            </div>
        </div>
    </form>

    @section('scripts')
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"
                integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw=="
                crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        {{--        <script src="{{ asset('js/vendas/create.js') }}"></script>--}}
    @endsection
@endsection
