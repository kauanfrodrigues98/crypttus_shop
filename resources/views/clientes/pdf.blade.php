<style>
    th {
        border: 1px solid #696969;
        background: #efefef;
        font-size: 15px;
        padding: 2px 7px 2px 7px;
    }

    td {
        border: 1px solid #939393;
        padding: 2px 7px 2px 7px;
        font-size: small;
    }

    .centralizado {
        text-align: center;
    }

    p {
        border: 1px solid #6b6b6b;
        padding: 7px;
    }
</style>

<div class="centralizado">
    <p>{{ $title }}</p>
    <p>Data Relatório: {{ $date }}</p>
</div>

<table>
    <thead>
    <tr>
        <th>Nome</th>
        <th>E-mail</th>
        <th>CPF</th>
        <th>Nascimento</th>
        <th>Celular</th>
    </tr>
    </thead>
    <tbody>
    @forelse($clientes as $cliente)
        <tr>
            <td>{{ $cliente->nome }}</td>
            <td>{{ $cliente->email }}</td>
            <td>{{ $cliente->cpf }}</td>
            <td>{{ Helper::dataSQLparaBR($cliente->data_nascimento) }}</td>
            <td>{{ $cliente->celular }}</td>
        </tr>
    @empty
        <tr>
            <td colspan="6" class="text-center">Não foram encontrados registros para serem
                exibidos
            </td>
        </tr>
    @endforelse
    </tbody>
</table>
