<style>
    @page {
        margem-top: 0px !important;
        margem-bottom: 0px !important;
    }

    th, td {
        font-size: 12px;
    }

    .centralizado {
        text-align: center;
    }

    .div_text_small {
        font-size: 12px;
    }

    .div_geral {
        margin-top: -30px;
        margin-left: -30px;
        width: 125% !important;
    }

    p {
        margin: 5px;
    }

    table {
        margin-top: 10px;
        margin-bottom: 10px;
    }

    .sem_valor_fiscal {
        font-size: 13px;
        text-align: center;
        margin-top: 20px;
    }

    .sem_valor_fiscal > p {
        margin: 0px;
    }
</style>

<div class="div_geral">

<div class="centralizado" style="margin-bottom: 10px;">
    <p>{{ $title }}</p>
</div>

<div class="div_text_small">
    <p>Venda: {{ $venda->id }}</p>
    <p>Vendedor: Fulano de Tal</p>
    <p>Cliente: Kauan Rodrigues</p>
    <p>Data da compra: {{ $date }}</p>
</div>

<table>
    <thead>
    <tr>
        <th>Código</th>
        <th>Descrição</th>
        <th>Qtd</th>
        <th>Prc Unit</th>
        <th>Desconto</th>
        <th>Subtotal</th>
    </tr>
    </thead>
    <tbody>
    @php
        $count = 1
    @endphp
    @forelse($venda->produtoVenda as $produto)
        <tr>
            <td>{{ $produto->codigo_grade }}</td>
            <td>{{ $produto->codigoGrade->produto->nome}}</td>
            <td class="centralizado">{{ $produto->quantidade }}</td>
            <td class="centralizado">{{ number_format($produto->preco_unitario, 2, ',', '.') }}</td>
            <td class="centralizado">{{ number_format($produto->desconto_real, 2, ',', '.') }}</td>
            <td class="centralizado">{{ number_format($produto->subtotal, 2, ',', '.') }}</td>
        </tr>
        @php
            $count++
        @endphp
    @empty
        <tr>
            <td colspan="6" class="text-center">Não foram encontrados registros para serem
                exibidos
            </td>
        </tr>
    @endforelse
    </tbody>
</table>

<div class="div_text_small">
    <p>Total: {{ number_format($venda->total, 2, ',', '.') }}</p>
    <p>Desconto: {{ number_format($venda->desconto_real, 2, ',', '.') }}</p>
    <p>Produtos Comprados: {{ $count }}</p>
</div>

    <div class="centralizado sem_valor_fiscal">
        <!-- <p>********************************</p> -->
        <p>DOCUMENTO SEM VALOR FISCAL</p>
        <!-- <p>********************************</p> -->
    </div>

</div>
