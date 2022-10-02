function limpaFormularioCep() {
    //Limpa valores do formulário de cep.
    document.getElementById('logradouro').value = ("");
    document.getElementById('bairro').value = ("");
    document.getElementById('cidade').value = ("");
    document.getElementById('uf').value = ("");
    // document.getElementById('ibge').value=("");
}

function meuCallback(conteudo) {
    if (!("erro" in conteudo)) {
        //Atualiza os campos com os valores.
        document.getElementById('logradouro').value=(conteudo.logradouro);
        document.getElementById('bairro').value=(conteudo.bairro);
        document.getElementById('cidade').value=(conteudo.localidade);
        document.getElementById('uf').value=(conteudo.uf);
        // document.getElementById('ibge').value=(conteudo.ibge);
        document.getElementById('numero').focus();
    } //end if.
    else {
        //CEP não Encontrado.
        limpaFormularioCep();
        alert("CEP não encontrado.");
    }
}

function pesquisaCep(valor) {

    if (valor.length < 9) {
        return false;
    }

    //Nova variável "cep" somente com dígitos.
    var cep = valor.replace(/\D/g, '');

    //Verifica se campo cep possui valor informado.
    if (cep !== "") {

        //Expressão regular para validar o CEP.
        var validacep = /^[0-9]{8}$/;

        //Valida o formato do CEP.
        if (validacep.test(cep)) {

            //Preenche os campos com "..." enquanto consulta webservice.
            document.getElementById('logradouro').value = "...";
            document.getElementById('bairro').value = "...";
            document.getElementById('cidade').value="...";
            document.getElementById('uf').value="...";
            // document.getElementById('ibge').value="...";

            //Cria um elemento javascript.
            var script = document.createElement('script');

            //Sincroniza com o callback.
            script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meuCallback';

            //Insere script no documento e carrega o conteúdo.
            document.body.appendChild(script);

        } //end if.
        else {
            //cep é inválido.
            limpaFormularioCep();
            alert("Formato de CEP inválido.");
        }
    } //end if.
    else {
        //cep sem valor, limpa formulário.
        limpaFormularioCep();
    }
}

function number_format(number, decimals, dec_point, thousands_sep) {
    // Strip all characters but numerical ones.
    number = (number + '').replace(/[^0-9+\-Ee.]/g, '');
    var n = !isFinite(+number) ? 0 : +number,
        prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
        sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
        dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
        s = '',
        toFixedFix = function (n, prec) {
            var k = Math.pow(10, prec);
            return '' + Math.round(n * k) / k;
        };
    // Fix for IE parseFloat(0.55).toFixed(0) = 0;
    s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
    if (s[0].length > 3) {
        s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
    }
    if ((s[1] || '').length < prec) {
        s[1] = s[1] || '';
        s[1] += new Array(prec - s[1].length + 1).join('0');
    }
    return s.join(dec);
}

function moedaBRparaSQL(value) {
    let valor = value.replace(',', '.')
    valor = valor.replace('.', '')
    console.log(value)

    return valor
}

/**
 * Verifica se a variavel é vazia ou null
 *
 * @param {*} value
 */
function empty(value) {
    if (value == "" || value == null || value == undefined || value == " " || value == false)
        return true;

    return false;
}

/**
 * Converte moeda brasileira para valor float para banco de dados
 *
 * @param {float} value
 */
function moedaBRparaSQL(value) {
    if (!empty(value)) {
        if (value.includes('.'))
            value = value.replace('.', '');

        if (value.includes(','))
            value = value.replace(',', '.');

        return parseFloat(value);
    }

    return 0.00;
}

function remover_loader() {
    $("#loader").css('display', 'none');
    $("#conteudo").css('display', 'block');
}

//remonta o cep para a requisição
function removeCharCEP(valor) {
    if (!empty(valor) && valor.length == 10) {
        parte1 = valor.slice(0, 2);
        parte2 = valor.slice(3, 6);
        parte3 = valor.slice(7, 10);
        cep = parte1 + parte2 + parte3;

        return cep;
    } else {
        alert("CEP inválido.");
    }
}

function meu_callback(conteudo) {
    if (!("erro" in conteudo)) {
        //Atualiza os campos com os valores.
        document.getElementById('logradouro').value = (conteudo.logradouro);
        document.getElementById('bairro').value = (conteudo.bairro);
        document.getElementById('cidade').value = (conteudo.localidade);
        document.getElementById('uf').value = (conteudo.uf);
        document.getElementById('numero').focus();
        // document.getElementById('ibge').value=(conteudo.ibge);
        $("#cep").removeClass('is-invalid');
        $("#msgCep").addClass('invalid-feedback').html('').css('display', 'none');
    } //end if.
    else {
        //CEP não Encontrado.
        limpa_formulário_cep();
        $("#cep").addClass('is-invalid');
        $("#msgCep").addClass('invalid-feedback').html('CEP não encontrado.').css('display', 'block');
    }
}

/**
 * Pesquisa o CEP informado e traz todos os dodos de endereço
 *
 * @param {string} valor
 */
function pesquisacep(valor) {
    if (valor.length != 10) {
        return false;
    }

    if (!removeCharCEP(valor)) {
        return false;
    }

    //Nova variável "cep" somente com dígitos.
    var cep = valor.replace(/\D/g, '');

    //Verifica se campo cep possui valor informado.
    if (cep != "") {

        //Expressão regular para validar o CEP.
        var validacep = /^[0-9]{8}$/;

        //Valida o formato do CEP.
        if (validacep.test(cep)) {

            //Preenche os campos com "..." enquanto consulta webservice.
            document.getElementById('logradouro').value = "Carregando...";
            document.getElementById('bairro').value = "Carregando...";
            document.getElementById('cidade').value = "Carregando...";
            document.getElementById('uf').value = "Carregando...";
            // document.getElementById('ibge').value="Carregando...";

            //Cria um elemento javascript.
            var script = document.createElement('script');

            //Sincroniza com o callback.
            script.src = 'https://viacep.com.br/ws/' + cep + '/json/?callback=meu_callback';

            //Insere script no documento e carrega o conteúdo.
            document.body.appendChild(script);

            $("#cep").removeClass('is-invalid');
            $("#msgCep").addClass('invalid-feedback').html('').css('display', 'none');

        } //end if.
        else {
            //cep é inválido.
            // limpa_formulário_cep();
            $("#cep").addClass('is-invalid');
            $("#msgCep").addClass('invalid-feedback').html('Formato de CEP inválido.').css('display', 'block');
        }
    } //end if.
    else {
        //cep sem valor, limpa formulário.
        // limpa_formulário_cep();
    }
};

/**
 * Verifica se o CPF é valido.
 *
 * @param {string} cpf
 */
function validaCpf(cpf) {
    cpf = cpf.replace(/\D/g, '');

    if (cpf.toString().length != 11 || /^(\d)\1{10}$/.test(cpf)) return false;

    var result = true;

    [9, 10].forEach(function (j) {
        var soma = 0, r;
        cpf.split(/(?=)/).splice(0, j).forEach(function (e, i) {
            soma += parseInt(e) * ((j + 2) - (i + 1));
        });
        r = soma % 11;
        r = (r < 2) ? 0 : 11 - r;
        if (r != cpf.substring(j, j + 1)) result = false;
    });

    return result;
}

/**
 * converte valores float vindo do banco de dados para moeda brasileira
 *
 * @param {float} number - valor a ser convertido
 * @param {integer} decimals - quantidade de casas decimais depois da virgula
 * @param {string} decPoint - simbolo de separação decimal
 * @param {string} thousandsSep - simbolo de separação de milhar
 */
function number_format(number, decimals, decPoint, thousandsSep) { // eslint-disable-line camelcase
    //  discuss at: http://locutus.io/php/number_format/
    // original by: Jonas Raoni Soares Silva (http://www.jsfromhell.com)
    // improved by: Kevin van Zonneveld (http://kvz.io)
    // improved by: davook
    // improved by: Brett Zamir (http://brett-zamir.me)
    // improved by: Brett Zamir (http://brett-zamir.me)
    // improved by: Theriault (https://github.com/Theriault)
    // improved by: Kevin van Zonneveld (http://kvz.io)
    // bugfixed by: Michael White (http://getsprink.com)
    // bugfixed by: Benjamin Lupton
    // bugfixed by: Allan Jensen (http://www.winternet.no)
    // bugfixed by: Howard Yeend
    // bugfixed by: Diogo Resende
    // bugfixed by: Rival
    // bugfixed by: Brett Zamir (http://brett-zamir.me)
    //  revised by: Jonas Raoni Soares Silva (http://www.jsfromhell.com)
    //  revised by: Luke Smith (http://lucassmith.name)
    //    input by: Kheang Hok Chin (http://www.distantia.ca/)
    //    input by: Jay Klehr
    //    input by: Amir Habibi (http://www.residence-mixte.com/)
    //    input by: Amirouche
    //   example 1: number_format(1234.56)
    //   returns 1: '1,235'
    //   example 2: number_format(1234.56, 2, ',', ' ')
    //   returns 2: '1 234,56'
    //   example 3: number_format(1234.5678, 2, '.', '')
    //   returns 3: '1234.57'
    //   example 4: number_format(67, 2, ',', '.')
    //   returns 4: '67,00'
    //   example 5: number_format(1000)
    //   returns 5: '1,000'
    //   example 6: number_format(67.311, 2)
    //   returns 6: '67.31'
    //   example 7: number_format(1000.55, 1)
    //   returns 7: '1,000.6'
    //   example 8: number_format(67000, 5, ',', '.')
    //   returns 8: '67.000,00000'
    //   example 9: number_format(0.9, 0)
    //   returns 9: '1'
    //  example 10: number_format('1.20', 2)
    //  returns 10: '1.20'
    //  example 11: number_format('1.20', 4)
    //  returns 11: '1.2000'
    //  example 12: number_format('1.2000', 3)
    //  returns 12: '1.200'
    //  example 13: number_format('1 000,50', 2, '.', ' ')
    //  returns 13: '100 050.00'
    //  example 14: number_format(1e-8, 8, '.', '')
    //  returns 14: '0.00000001'

    number = (number + '').replace(/[^0-9+\-Ee.]/g, '')
    var n = !isFinite(+number) ? 0 : +number
    var prec = !isFinite(+decimals) ? 0 : Math.abs(decimals)
    var sep = (typeof thousandsSep === 'undefined') ? ',' : thousandsSep
    var dec = (typeof decPoint === 'undefined') ? '.' : decPoint
    var s = ''

    var toFixedFix = function (n, prec) {
        if (('' + n).indexOf('e') === -1) {
            return +(Math.round(n + 'e+' + prec) + 'e-' + prec)
        } else {
            var arr = ('' + n).split('e')
            var sig = ''
            if (+arr[1] + prec > 0) {
                sig = '+'
            }
            return (+(Math.round(+arr[0] + 'e' + sig + (+arr[1] + prec)) + 'e-' + prec)).toFixed(prec)
        }
    }

    // @todo: for IE parseFloat(0.55).toFixed(0) = 0;
    s = (prec ? toFixedFix(n, prec).toString() : '' + Math.round(n)).split('.')
    if (s[0].length > 3) {
        s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep)
    }
    if ((s[1] || '').length < prec) {
        s[1] = s[1] || ''
        s[1] += new Array(prec - s[1].length + 1).join('0')
    }

    return s.join(dec)
}

/**
 * Converte um valor float vindo do banco de dados para moeda brasileira
 *
 * @param {float} valor - Valor vindo do banco de dados
 */
function moedaSQLparaBR(valor) {
    if (!empty(valor)) {
        valor = valor.replace('.', ',');
        return valor;
    } else {
        return false;
    }
}

/**
 * Limpa todos os campos da tela
 */
function limpar_campos() {
    $("input, select, textarea").val('');
}

/**
 * Abre um modal principal
 *
 * @param {string} [header] - Titulo do modal
 * @param {string} [body] - Conteúdo do corpo do modal
 */
function abrir_modal(header = "", body = "") {
    $(".footer_modal").css('display', 'block');
    $("#titulo_modal").html(header);
    $("#body_modal").html(body);
    $("#modal").modal('show');
}

/**
 * Abre um segundo modal auxiliar em cima do modal principal
 *
 * @param {string} [header] - Titulo do modal auxiliar
 * @param {string} [body] - Corpo do modal auxiliar
 */
function abrir_modal_aux(header = "", body = "") {
    $(".footer_modal_aux").css('display', 'block');
    $("#header_modal_aux").html(header);
    $("#body_modal_aux").html(body);
    $("#modal_aux").modal('show');
}

/**
 * Verifica se a data é verdadeira e válida, alem de verificar se a data inicial é maior que a data final,
 * geralmente utilizada para relatórios por periodo
 *
 * @param {Date} data_inicio
 * @param {Date} data_fim
 */
function validar_data(data_inicio, data_fim) {
    if (empty(data_inicio) || empty(data_fim)) {
        return false;
    }

    if (data_inicio.length != 10 || data_fim.length != 10) {
        return false;
    }

    if (data_inicio.indexOf('/') != -1 || data_fim.indexOf('/') != -1) {
        return false;
    }

    if ((data_inicio.substring(2) != '/' || data_inicio.substring(5) != '/') || (data_fim.substring(2) != '/' || data_fim.substring(5) != '/')) {
        return false;
    }

    return true;
}

/**
 * Converte uma data brasileira em um valor date para ser inserido no banco de dados
 *
 * @param {Date} data
 */
function dataBRparaSQL(data) {
    if (empty(data))
        return "";

    var data = data.split("/");
    var data = data[2] + "-" + data[1] + "-" + data[0]; //0 - Dia; 1 - Mês; 2 - Ano;
    return data;
}

function dataHoraSQLparaData(data) {
    if (empty(data))
        return "";

    var dia = mes = ano = hora = "";

    ano = data.substring(0, 4);
    mes = data.substring(5, 7);
    dia = data.substring(8, 10);

    return dia + "/" + mes + "/" + ano;
}

/**
 * Converte um valor date vindo do banco de dados para uma data brasileira
 *
 * @param {Date} data
 */
function dataSQLparaBR(data) {
    if (empty(data))
        return "<i>--Não Informado--</i>";

    var data = data.split("-");
    var data = data[2] + "/" + data[1] + "/" + data[0]; //0 - Ano; 1 - Mês; 2 - Dia;
    return data;
}

/**
 * Converte um valor datetime vindo do banco de dados em data e hora brasileira.
 *
 * @param {Date} data
 */
function dataHoraSQLparaBR(data) {
    var dia = mes = ano = hora = "";

    ano = data.substring(0, 4);
    mes = data.substring(5, 7);
    dia = data.substring(8, 10);
    hora = data.substring(11, 19);

    return dia + "/" + mes + "/" + ano + " " + hora;
}

/**
 * Limpa todos os input e select existentes na tela
 */
function limparCampos() {
    $("input, select").value('');
}

// function select2_dinamico(campo = "", url = "", id_lbl = 'id', lbl = 'nome')
// {
//   $(campo).select2({
//     placeholder: "Selecione",
//     ajax: {
//       url: base_url_api+url,
//       datatype: 'json',
//       type: 'post',
//       data: function(params)
//       {
//         var query = {
//             db_name: db_name,
//             search: params.term
//         }
//         return query;
//       },
//       beforeSend: function(xhr){
//         xhr.setRequestHeader('Authorization', 'Bearer '+myToken);
//       },
//       processResults: function (data) {
//         data = JSON.parse(data);
//         return {
//           results: $.map(data, function(item){
//             return{
//               id: item.id,
//               text: item.nome
//             }
//           })
//         }
//       }
//     }
//   });
// }


// function tratar_milhar(valor)
// {
//     if(valor.indexOf('.'))
//     {
//         return valor.replace('.', '');
//     }
//     else
//     {
//         return valor;
//     }
// }

/**
 * Permite que seja digitado somente numeros no campo
 *
 * @param {Event} e - Evento do teclado
 */
function somenteNumeros(e) {
    var charCode = e.charCode ? e.charCode : e.keyCode;
    // charCode 8 = backspace
    // charCode 9 = tab
    if (charCode != 8 && charCode != 9) {
        // charCode 48 equivale a 0
        // charCode 57 equivale a 9
        if (charCode < 48 || charCode > 57) {
            return false;
        }
    }
}

/**
 * Realiza requisições AJAX personalizadas.
 *
 * @param {string} url - ROTA onde a requisição deve apontar
 * @param {Array} [dados] - Parametros que serão enviados na requisição
 * @param {string} [type] - Define o tipo da requisição se é POST ou GET
 */
function requisicao(url, dados = "", type = 'post') {
    let lblButton = $(".button_request").html();

    console.log(window.location.origin + url);

    var data = $.ajax({
        cache: true,
        url: window.location.origin + url,
        async: false,
        type: type,
        datatype: 'json',
        data: dados,
        statusCode: {
            500: function () {
                $(".button_request").removeAttr('disabled');
                // swal("Erro!", "Desculpe, mas ocorreu um problema ao acessar o Banco de Dados.", "error");
            }
        },
        beforeSend: function () {
            $(".button_request").attr('disabled', 'disabled').html('Carregando...');
        },
        success: function () {
            $(".button_request").removeAttr('disabled').html(lblButton);
        }
    });

    console.log(data);

    // return data.responseText;
    return JSON.parse(data.responseText);
}

function requisicao_assinatura(url, dados = "", type = 'post') {
    let tokenAssinatura = $("#tokenAssinatura").val();

    let lblButton = $(".button_request").html();

    if (empty(tokenAssinatura)) {
        url = 'authenticate';
        let app_id = $("#app_id").val();
        let secret = $("#secret").val();

        dados = {app_id, secret};

        let base = 'https://api.sandbox.cobrefacil.com.br/' + url;

        var data = $.ajax({
            url: "https://api.sandbox.cobrefacil.com.br/v1/authenticate",
            async: false,
            type: 'post',
            datatype: 'json',
            data: dados,
            // headers: {
            //     'Authorization': 'Bearer '+myToken,
            //     'Content-Type': 'application/json'
            // },
            statusCode: {
                500: function () {
                    $(".button_request").removeAttr('disabled');
                    // swal("Erro!", "Desculpe, mas ocorreu um problema ao acessar o Banco de Dados.", "error");
                }
            },
            beforeSend: function (xhr) {
                // xhr.setRequestHeader('Authorization', 'Bearer '+myToken);
                $(".button_request").attr('disabled', 'disabled').html('Carregando...');
            },
            success: function (result) {
                // if(result.success)
                //     $("#tokenAssinatura").val(result.data.token);

                // alert(result.data.token);

                $(".button_request").removeAttr('disabled').html(lblButton);
            }
        });
    } else {

        let base = 'https://api.sandbox.cobrefacil.com.br/v1/' + url;

        var data = $.ajax({
            url: base,
            async: false,
            type: type,
            datatype: 'json',
            data: dados,
            // headers: {
            //     'Authorization': 'Bearer '+myToken,
            //     'Content-Type': 'application/json'
            // },
            statusCode: {
                500: function () {
                    $(".button_request").removeAttr('disabled');
                    // swal("Erro!", "Desculpe, mas ocorreu um problema ao acessar o Banco de Dados.", "error");
                }
            },
            beforeSend: function (xhr) {
                xhr.setRequestHeader('Authorization', 'Bearer ' + tokenAssinatura);
                $(".button_request").attr('disabled', 'disabled').html('Carregando...');
            },
            success: function () {
                $(".button_request").removeAttr('disabled').html(lblButton);
            }
        });
    }

    // return data.responseText;
    console.log(JSON.parse(data));
    return JSON.parse(data.responseText);
}

/**
 * Exibe um sweetalert modificado, onde o usuario só consegue fecha-lo clicando no botão.
 *
 * @param {string} [title] - Titulo do sweet
 * @param {string} [text] - Conteúdo do corpo do sweet
 * @param {string} [icon] - Icone exibido no sweet
 */
function swal_response(title = "", text = "", icon = "") {
    swal({
        closeOnEsc: false,
        closeOnClickOutside: false,
        title: title,
        text: text,
        icon: icon,
        buttons: {
            catch: {
                text: "Certo",
                value: "Certo"
            }
        }
    }).then((value) => {
        switch (value) {
            case "Certo":
                window.location.reload();
                break;
        }
    });
}

function in_array(value, array) {
    let index = 0;

    for (index = 0; index <= array.length; index++) {
        if (array[index] == value)
            return true;
    }

    return false;
}

function logout() {

    let dados = {
        db_name: db_name,
        _token: _token
    };

    requisicao('logout', dados);

    window.location.href = base_url + 'logout';
}

function movimentacao_caixa(operacao, valor_operacao, operador) {
    let valor_caixa = 0;
    let caixa_atual = 0;

    switch (operador) {
        case 'soma':
            valor_caixa = $("#valor_caixa_hidden").val();
            caixa_atual = (parseFloat(valor_caixa) + parseFloat(valor_operacao));
            break;

        case 'tira':
            valor_caixa = $("#valor_caixa_hidden").val();

            caixa_atual = (parseFloat(valor_caixa) - parseFloat(valor_operacao));
            break;

        default:
            caixa_atual = valor_operacao;
            break;
    }

    let dados = {
        operacao: operacao,
        valor_caixa: valor_caixa,
        caixa_atual: caixa_atual,
        valor_operacao: valor_operacao,
        _token: _token,
        db_name: db_name
    };

    let response = requisicao('operacoes/movimentacao_caixas', dados);

    requisicao('atualiza_caixa', {valor_caixa: response.data.valor_caixa, _token: _token}, false);

    if (response.msg)
        return true;
    else
        return false;
}

const toggleFiltros = () => {
    $(".filtros").toggle();
}
