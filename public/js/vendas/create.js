$(document).ready(function () {
    $("#quantidade").mask('00000', {placeholder: '0'});
    $("#preco_unitario, #desconto_real, #desconto_perc, #subtotal").mask('#.##0,00', {
        placeholder: '0,00',
        reverse: true
    });

    $("#produto").select2({
        ajax: {
            url: window.location.origin + "/get/produtos",
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

const calculaDesconto = (flag) => {
    if (flag === 1) {
        let desconto_real = moedaBRparaSQL($("#desconto_real").val())
        let quantidade = $("#quantidade").val()
        let preco_unitario = moedaBRparaSQL($("#preco_unitario").val())
        let subtotal = quantidade * preco_unitario
        let desconto = subtotal - desconto_real
        let desc_perc = subtotal * (subtotal / 100)

        $("#desconto_perc").val(number_format(desc_perc, 2, ',', '.'))
        $("#subtotal").val(number_format(desconto, 2, ',', '.'))
    } else {
        let desconto_perc = moedaBRparaSQL($("#desconto_perc").val())
        let quantidade = $("#quantidade").val()
        let preco_unitario = moedaBRparaSQL($("#preco_unitario").val())
        let subtotal = quantidade * preco_unitario
        let desconto = subtotal * (desconto_perc / 100)
        subtotal = subtotal - desconto

        $("#desconto_real").val(number_format(desconto, 2, ',', '.'))
        $("#subtotal").val(number_format(subtotal, 2, ',', '.'))
    }
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
    let subtotal = $("#subtotal").val()

    let row = ''

    row += '<tr>'
    row += '<td>' + codigo + '</td>'
    row += '<td>' + descricao + '</td>'
    row += '<td>' + quantidade + '</td>'
    row += '<td>' + preco_unit + '</td>'
    row += '<td>' + desconto_real + '</td>'
    row += '<td>' + subtotal + '</td>'
    row += '<td><button type="button" class="btn btn-sm btn-danger">Remover</button></td>'
    row += '</tr>'

    $("#tabela_produtos tbody").append(row)

    calculaTotal()
}

const calculaTotal = () => {
    let tabela = $("#tabela_produtos")

    tabela.find('tbody').find('tr').map(function () {
        console.log(tabela.find('tbody').find('tr').find('td').eq(5).text())
    })
}
