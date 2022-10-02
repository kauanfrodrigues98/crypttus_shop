@section('styles')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
@endsection

@extends('app')

@section('tab-title', 'Produtos')

@section('content')
    @include('components.alert_request')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url()->previous() }}">Produtos</a></li>
            <li class="breadcrumb-item active" aria-current="page">Cadastro</li>
        </ol>
    </nav>

    <form method="post" action="{{ route('produtos.store') }}">
        @csrf
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Dados Principais</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        <label for="codigo">Código<span class="text-danger">*</span></label>
                        <input type="text" name="codigo" id="codigo" class="form-control form-control-sm" required
                               value="{{ $produto->codigo }}">
                    </div>
                    <div class="col-md-3">
                        <label for="nome">Nome Produto</label>
                        <input type="text" name="nome" id="nome" class="form-control form-control-sm" required
                               value="{{ $produto->nome }}">
                    </div>
                    <div class="col-md-6">
                        <label for="descricao">Descrição</label>
                        <input type="text" name="descricao" id="descricao" class="form-control form-control-sm"
                               value="{{ $produto->descricao }}">
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="col-md-3">
                        <label for="colecao">Coleção</label>
                        <select name="colecao" id="colecao" class="custom-select custom-select-sm" required>
                            <option value="">Selecione</option>
                            <option value="1">Verão 2022</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="preco_compra">Preço Compra</label>
                        <input type="text" name="preco_compra" id="preco_compra" class="form-control form-control-sm"
                               required value="{{ $produto->preco_compra }}">
                    </div>
                    <div class="col-md-3">
                        <label for="preco_venda">Preço Venda</label>
                        <input type="text" name="preco_venda" id="preco_venda" class="form-control form-control-sm"
                               required value="{{ $produto->preco_venda }}">
                    </div>
                </div>
            </div>
        </div>

        {{--        <div class="row mt-2">--}}
        {{--            <div class="col-md-4 offset-md-4">--}}
        {{--                <button type="submit" class="btn btn-sm btn-success btn-block">Salvar</button>--}}
        {{--            </div>--}}
        {{--        </div>--}}
    </form>

    @section('scripts')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"
                integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw=="
                crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script src="{{ asset('js/produtos/create.js') }}"></script>
    @endsection
@endsection
