
const rangeInput = document.querySelectorAll(".range-input input");
const priceInput = document.querySelectorAll(".price-input input");
const progress = document.querySelector(".slider .progress");

let priceGap = 1000;

priceInput.forEach(input => {

    input.addEventListener("input", e => {

        let minVal = parseInt(priceInput[0].value);
        let maxVal = parseInt(priceInput[1].value);

        if((maxVal - minVal >= priceGap) && maxVal <= 10000) {
            if(e.target.className === "input-min") {
                rangeInput[0].value = minVal;
                progress.style.left = (minVal / rangeInput[0].max) * 100 + "%";
            } else {
                rangeInput[1].value = minVal + priceGap;
                progress.style.right = 100 - (maxVal / rangeInput[1].max) * 100 + "%";    
            }
        }
    });

});

rangeInput.forEach(input => {

    input.addEventListener("input", e => {

        let minVal = parseInt(rangeInput[0].value);
        let maxVal = parseInt(rangeInput[1].value);

        if(maxVal - minVal < priceGap) {
            if(e.target.className === "range-min") {
                rangeInput[0].value = maxVal - priceGap;
            } else {
                rangeInput[1].value = minVal + priceGap;
            }
        } else {
            priceInput[0].value = minVal;
            priceInput[1].value = maxVal;
            progress.style.left = (minVal / rangeInput[0].max) * 100 + "%";
            progress.style.right = 100 - (maxVal / rangeInput[1].max) * 100 + "%";    
        }
    });

});

$(document).ready(function(){

    var partindoDe = $('#partindo-de');
    var indoPara = $('#indo-para');
    var dataViagem = $('#data-viagem');
    var rotaInput = $('#rota-input');
    const params = new URLSearchParams(window.location.search);
    var rota = params.get('rota').split(' - ');
    partindoDe.val(rota[0]);
    indoPara.val(rota[1]);
    dataViagem.val(params.get('data'));
    rotaInput.val(params.get('rota'));

    // alert(rotaInput.val());

});

// $(document).ready(function(){
    
//     var btnFiltrar = $('#btnFiltrar');
//     var formFiltro = $('#formFiltro');
//     formFiltro.submit(function(e) {
//         e.preventDefault();

//         const params = new URLSearchParams(window.location.search);
//         var minValue = $("#min-value").val();
//         var maxValue = $("#max-value").val();
//         var agencia = 0;
//         $("input[name='agencia_filtro']").each(function() {
//             if($(this).is(':checked')) {
//                 agencia = $(this).val();
//             }
//         })
//         var data = params.get('data');
//         var rota = params.get('rota').split(' - ');
//         var partindoDe = rota[0];
//         var indoPara = rota[1];
//         var _token = $('input[name="_token"]').val();
//         // alert(agencia);
//         $.ajax({
//             url: '/filter',
//             type: 'POST',
//             data: {
//                 data: data, 
//                 partindoDe: partindoDe, 
//                 indoPara: indoPara, 
//                 minValue: minValue, 
//                 maxValue: maxValue, 
//                 agenciaFiltro: agencia,
//                 _token: _token
//             },
//             success: function(res) {
//                 alert(res.success);
//             },
//             error: function (xhr, status, error) {
//                 alert(xhr.responseText);
//                 alert(status);
//                 alert(error);
//             }
//         });
//     });

// });