$(document).ready(function() {
    // $("#colecao").select2({
    //     ajax: {
    //         url: window.location.origin + "/get/colecao",
    //         dataType: 'json',
    //         data: function (params) {
    //             return {
    //                 q: params.term, // search term
    //                 page: params.page
    //             };
    //         },
    //         processResults: function (data, params) {
    //             params.page = params.page || 1;
    //
    //             return {
    //                 results: data.items,
    //                 pagination: {
    //                     more: (params.page * 30) < data.total_count
    //                 }
    //             };
    //         },
    //         cache: true
    //     },
    //     placeholder: 'Procurar',
    //     minimumInputLength: 3,
    // });

    $("#preco_compra, #preco_venda").mask('#.##0,00', {placeholder: '0,00', reverse: true});
});
