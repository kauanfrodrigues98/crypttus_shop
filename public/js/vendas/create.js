$(document).ready(function () {
    $("#quantidade").mask('00000', {placeholder: '0'});
    $("#preco_unitario, #desconto_real, #desconto_perc, #subtotal, #valor, #valor_parcela").mask('#.##0,00', {
        placeholder: '0,00',
        reverse: true
    });

    $("#produto").select2({
        ajax: {
            url: window.location.origin + "/get/venda/codigo_grade",
            method: 'post',
            dataType: 'json',
            data: function (params) {
                return {
                    search: params.term, // search term
                    page: params.page,
                    venda: true,
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
                $("#preco_unitario").val(number_format(data.preco_venda, 2, ',', '.'))
                $("#subtotal").val(number_format(data.preco_venda, 2, ',', '.'))
            },
            error: function (e) {
                // console.log(e);
            }
        });
    });

    $("#funcionario").select2({
        ajax: {
            url: window.location.origin + "/get/funcionarios",
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
                            text: item.nome
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

    $("#cliente").select2({
        ajax: {
            url: window.location.origin + "/get/clientes",
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
                            text: item.nome
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

const calculaDescontoReal = () => {
    let desconto_real = moedaBRparaSQL($("#desconto_real").val())
    let quantidade = $("#quantidade").val()
    let preco_unitario = moedaBRparaSQL($("#preco_unitario").val())
    let subtotal = quantidade * preco_unitario
    let desc_perc = (desconto_real / subtotal) * 100
    subtotal = subtotal - desconto_real

    $("#desconto_perc").val(number_format(desc_perc, 2, ',', '.'))
    $("#subtotal").val(number_format(subtotal, 2, ',', '.'))
}

const calculaDescontoPerc = () => {
    let desconto_perc = moedaBRparaSQL($("#desconto_perc").val())
    let quantidade = $("#quantidade").val()
    let preco_unitario = moedaBRparaSQL($("#preco_unitario").val())
    let subtotal = quantidade * preco_unitario
    let desconto = subtotal * (desconto_perc / 100)
    subtotal = subtotal - desconto

    $("#desconto_real").val(number_format(desconto, 2, ',', '.'))
    $("#subtotal").val(number_format(subtotal, 2, ',', '.'))
}

const calculaSubtotal = () => {
    let quantidade = !empty($("#quantidade").val()) ? $("#quantidade").val() : 0
    let preco_unitario = moedaBRparaSQL($("#preco_unitario").val())
    let desconto_real = empty($("#desconto_real").val()) ? 0 : moedaBRparaSQL($("#desconto_real").val())
    let subtotal = ((quantidade * preco_unitario) - desconto_real)

    $("#subtotal").val(number_format(subtotal, 2, ',', '.'))
}

const adicionar = () => {
    let codigo = $("#cod_grade").val()
    let descricao = $("#descricao_hidden").val()
    let quantidade = $("#quantidade").val()
    let preco_unit = $("#preco_unitario").val()
    let desconto_real = !empty($("#desconto_real").val()) ? $("#desconto_real").val() : '0,00'
    let desconto_perc = !empty($("#desconto_perc").val()) ? $("#desconto_perc").val() : '0,00'
    let subtotal = $("#subtotal").val()

    if (empty(codigo) || empty(descricao) || empty(quantidade) || empty(preco_unit) || empty(desconto_real) || empty(subtotal)) {
        alert('Todos os campos devem ser informados.')
        return false
    }

    let temEstoque = requisicao('/tem_estoque', {
        codigo: codigo,
        quantidade: quantidade,
        _token: $("input[name='_token']").val()
    })

    if (temEstoque.quantidade < quantidade) {
        swal('Aviso!', 'A quantidade informada é maior que o estoque disponivel.', 'warning')
        return false
    }

    let row = ''

    row += '<tr>'
    row += '<td><input type="hidden" name="codigo[]" value="' + codigo + '">' + codigo + '</td>'
    row += '<td>' + descricao + '</td>'
    row += '<td><input type="hidden" name="quantidade[]" value="' + quantidade + '">' + quantidade + '</td>'
    row += '<td><input type="hidden" name="preco_unitario[]" value="' + moedaBRparaSQL(preco_unit) + '">' + preco_unit + '</td>'
    row += '<td><input type="hidden" name="desconto_real[]" value="' + moedaBRparaSQL(desconto_real) + '">' + desconto_real + '</td>'
    row += '<td><input type="hidden" name="desconto_perc[]" value="' + moedaBRparaSQL(desconto_perc) + '">' + desconto_perc + '</td>'
    row += '<td><input type="hidden" name="subtotal[]" value="' + moedaBRparaSQL(subtotal) + '">' + subtotal + '</td>'
    row += '<td><button type="button" class="btn btn-sm btn-danger" onclick="remover(this.parentNode.parentNode.rowIndex)">Remover</button></td>'
    row += '</tr>'

    $("#tabela_produtos tbody").append(row)

    calculaTotal()
    calculaFalta()
    limparProdutos()
}

const calculaTotal = () => {
    let tabela = $("#tabela_produtos")
    let total = 0

    tabela.find('tbody').find('tr').map(function () {
        total = total + moedaBRparaSQL($(this).find('td').eq(6).text())
    })

    $("#total").val(total)

    $(".spanTotal, .spanFalta").html(number_format(total, 2, ',', '.'))
}

const limparProdutos = () => {
    $("#produto, #quantidade, #preco_unitario, #desconto_real, #desconto_perc, #subtotal").val('')
}

const remover = (row) => {
    document.getElementById('tabela_produtos').deleteRow(row)
    calculaTotal()
    calculaFalta()
}

const removerForma = (row) => {
    document.getElementById('tabela_forma').deleteRow(row)
    calculaTotal()
    calculaFalta()
}

const adicionarForma = () => {
    let formaPagamento = $("#forma_pagamento").val()
    let parcelas = $("#parcelas").val()
    let valor = $("#valor").val()
    let valorParcela = $("#valor_parcela").val()

    if (empty(formaPagamento)) {
        swal('Aviso!', 'Você deve informar a forma de pagamento.', 'warning')
        $("#forma_pagamento").focus()
        return false
    }

    if (empty(parcelas)) {
        swal('Aviso!', 'Você deve informar a quantidade de parcelas.', 'warning')
        $("#parcelas").focus()
        return false
    }

    if (empty(valor)) {
        swal('Aviso!', 'Você deve informar o valor que será pago nessa forma de pagamento.', 'warning')
        $("#valor").focus()
        return false
    }

    let row = ''

    row += '<tr>'
    row += '<td><input type="hidden" name="forma_pagamento[]" value="' + formaPagamento + '">' + formaPagamento + '</td>'
    row += '<td><input type="hidden" name="parcela[]" value="' + parcelas + '">' + parcelas + '</td>'
    row += '<td><input type="hidden" name="valor[]" value="' + moedaBRparaSQL(valor) + '">' + valor + '</td>'
    row += '<td><input type="hidden" name="valor_parcela[]" value="' + moedaBRparaSQL(valorParcela) + '">' + valorParcela + '</td>'
    row += '<td><button type="button" class="btn btn-sm btn-danger" onclick="removerForma(this.parentNode.parentNode.rowIndex)">Remover</button></td>'
    row += '</tr>'

    $("#tabela_forma tbody").append(row)

    calculaFalta()
    limparForma()
}

const bloqueiaParcelas = (forma) => {
    if (forma !== 'Crédito') {
        $("#parcelas").val(1).trigger('change').attr('disabled', 'disabled')
    } else {
        $("#parcelas").val('').trigger('change').removeAttr('disabled')
    }
}

const limparForma = () => {
    $("#forma_pagamento, #parcelas, #valor_parcela").val('').trigger('change')
    $("#valor").val('')
}

const calculaParcela = () => {
    let parcelas = $("#parcelas").val()
    let valor = empty($("#valor").val()) ? 0.00 : moedaBRparaSQL($("#valor").val())
    let valorParcela = valor / parcelas

    $("#valor_parcela").val(number_format(valorParcela, 2, ',', '.'))
}

const calculaFalta = () => {
    let total = 0
    let totalForma = 0

    $("#tabela_produtos tbody tr").map(function () {
        total = total + moedaBRparaSQL($(this).find('td').eq(6).text())
    })

    $("#tabela_forma tbody tr").map(function () {
        totalForma = totalForma + moedaBRparaSQL($(this).find('td').eq(2).text())
    })

    let totalFalta = total - totalForma

    $(".spanFalta").html(number_format(totalFalta, 2, ',', '.'))
}
