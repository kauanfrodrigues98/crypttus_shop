const tabelaCodigos = $("#tabela_codigos")

$(document).ready(function () {

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
                            text: item.codigo + ' - ' + item.nome
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

    $("#cor").select2({
        ajax: {
            url: window.location.origin + "/get/cores",
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
                            text: item.cor
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

    $("#tamanho").select2({
        ajax: {
            url: window.location.origin + "/get/tamanhos",
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
                            text: item.tamanho
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

const gerarGrade = () => {
    let produto = $("#produto").val()
    let cor = $("#cor").val()
    let tamanho = $("#tamanho").val()

    let row = ''

    if (!empty(produto)) {
        let grade = ''
        produto.map(function (prod) {
            cor.map(function (corValue) {
                tamanho.map(function (tam) {
                    grade = prod
                    grade += corValue
                    grade += tam

                    row += '<tr>'
                    row += '<td><input type="hidden" name="codigo_grade[]" value="' + grade + '"/>' + grade + '</td>'
                    row += '<td><input type="hidden" name="produto[]" value="' + prod + '"/>' + prod + '</td>'
                    row += '<td><input type="hidden" name="cor[]" value="' + corValue + '"/>' + corValue + '</td>'
                    row += '<td><input type="hidden" name="tamanho[]" value="' + tam + '"/>' + tam + '</td>'
                    row += '<td><button type="button" class="btn btn-sm btn-danger" onclick="removeRow(this.parentNode.parentNode.rowIndex)">Remover</button></td>'
                    row += '</tr>'
                })
            })
        })
    }

    tabelaCodigos.find('tbody').append(row)
}

const removeRow = (row) => {
    document.getElementById('tabela_codigos').deleteRow(row)
}
