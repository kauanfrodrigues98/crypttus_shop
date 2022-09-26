$(document).ready(function () {
    $("#quantidade").mask('00000', {placeholder: '0'});
    $("#preco_unitario, #desconto_real, #desconto_perc, #subtotal, #valor, #valor_parcela").mask('#.##0,00', {
        placeholder: '0,00',
        reverse: true
    });

    $("#produto").select2({
        ajax: {
            url: window.location.origin + "/get/codigo_grade",
            method: 'post',
            dataType: 'json',
            data: function (params) {
                return {
                    search: params.term, // search term
                    page: params.page,
                    _token: $("input[name='_token']").val()
                };
            },
            processResults: function (data, params) {
                params.page = params.page || 1;

                return {
                    // results: data.items,
                    results: data.map(function (item) {
                        return {
                            id: item.codigo,
                            text: item.codigo + ' - ' + item.descricao
                        }
                    }),
                    pagination: {
                        more: (params.page * 30) < data.total_count
                    }
                };
            },
            cache: true
        },
        placeholder: 'Procurar',
        // minimumInputLength: 3,
    }).on("change", function (e) {
        $.ajax({
            url: window.location.origin + "/get/detalhes/produto",
            dataType: 'json',
            type: 'post',
            async: true,
            data: {
                codigo: this.value,
                _token: $("input[name='_token']").val()
            },
            success: function (data) {
                $("#cod_grade").val(data.codigo_grade)
                $("#descricao_hidden").val(data.descricao)
                $("#quantidade").val(1)
                $("#preco_unitario").val(number_format(data.preco_compra, 2, ',', '.'))
                $("#subtotal").val(number_format(data.preco_compra, 2, ',', '.'))
            },
            error: function (e) {
                // console.log(e);
            }
        });
    });

    $("#fornecedor").select2({
        ajax: {
            url: window.location.origin + "/get/fornecedores",
            method: 'post',
            dataType: 'json',
            data: function (params) {
                return {
                    search: params.term, // search term
                    page: params.page,
                    _token: $("input[name='_token']").val()
                };
            },
            processResults: function (data, params) {
                params.page = params.page || 1;

                return {
                    // results: data.items,
                    results: data.map(function (item) {
                        return {
                            id: item.id,
                            text: item.razao_social
                        }
                    }),
                    pagination: {
                        more: (params.page * 30) < data.total_count
                    }
                };
            },
            cache: true
        },
        placeholder: 'Procurar',
        // minimumInputLength: 3,
    });
});

const calculaSubtotal = () => {
    let quantidade = !empty($("#quantidade").val()) ? $("#quantidade").val() : 0
    let preco_unitario = moedaBRparaSQL($("#preco_unitario").val())
    let subtotal = (quantidade * preco_unitario)

    $("#subtotal").val(number_format(subtotal, 2, ',', '.'))
}

const adicionar = () => {
    let codigo = $("#cod_grade").val()
    let descricao = $("#descricao_hidden").val()
    let quantidade = $("#quantidade").val()
    let preco_unit = $("#preco_unitario").val()
    let subtotal = $("#subtotal").val()

    if (empty(codigo) || empty(descricao) || empty(quantidade) || empty(subtotal)) {
        alert('Todos os campos devem ser informados.')
        return false
    }

    let row = ''

    row += '<tr>'
    row += '<td><input type="hidden" name="codigo[]" value="' + codigo + '">' + codigo + '</td>'
    row += '<td>' + descricao + '</td>'
    row += '<td><input type="hidden" name="quantidade[]" value="' + quantidade + '">' + quantidade + '</td>'
    row += '<td><input type="hidden" name="preco_unitario[]" value="' + moedaBRparaSQL(preco_unit) + '">' + preco_unit + '</td>'
    row += '<td><input type="hidden" name="subtotal[]" value="' + moedaBRparaSQL(subtotal) + '">' + subtotal + '</td>'
    row += '<td><button type="button" class="btn btn-sm btn-danger" onclick="remover(this.parentNode.parentNode.rowIndex)">Remover</button></td>'
    row += '</tr>'

    $("#tabela_produtos tbody").append(row)

    calculaTotal()
    limparProdutos()
}

const calculaTotal = () => {
    let tabela = $("#tabela_produtos")
    let total = 0

    tabela.find('tbody').find('tr').map(function () {
        total = total + moedaBRparaSQL($(this).find('td').eq(4).text())
    })

    $("#total").val(total)

    $(".spanTotal, .spanFalta").html(number_format(total, 2, ',', '.'))
}

const limparProdutos = () => {
    $("#produto, #quantidade, #preco_unitario, #subtotal").val('')
}

const remover = (row) => {
    document.getElementById('tabela_produtos').deleteRow(row)
    calculaTotal()
}
