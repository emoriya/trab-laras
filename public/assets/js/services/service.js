$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(document).ready(function () {
    $('#search-cep').submit(function (event) {
        event.preventDefault();
        var cep = $(this).find('input[name="cep"]').val();
        var product = $(this).find('input[name="product_id"]').val();
        getCep(cep, product);
    });
});

function getCep(cep = '', produto_id = 0) {
    var request = $.ajax({
        type: 'POST',
        url: '/correios/frete',
        data: { cep_destino: cep, produto_id },
    });

    request.success(function (data) {
        console.log(data);
    });
}
