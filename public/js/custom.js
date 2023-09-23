

/** LOGIN DO CLIENTE */
$(document).ready(function () {

    // $('#acesso-negado').hide();

    var body = $('#body');

    $('#btnCadastroClient').click(function (e) {
        e.preventDefault();
        body.addClass('loading');
        var form = $('#formCadClient');

        $.ajax({
            method: 'POST',
            url: '/store/client',
            data: form.serialize(),
            success: function (result) {
                if (result.success) {
                    body.removeClass('loading');
                    $('#cliente-cadastrado').show();
                } else {
                    body.removeClass('loading');
                    $('#cliente-nao-cadastrado').show();
                }
            }
        });
        return false;
    });


    $('#btnLogarModal').click(function (e) {

        e.preventDefault();
        body.addClass('loading');
        var form = $('#formLoginModal');
        var DivUrl = $('#div-url').data('url');
        $.ajax({
            method: 'POST',
            url: '/logar/client',
            data: form.serialize(),
            success: function (res) {
                if (res.success) {
                    body.removeClass('loading');
                    window.location = DivUrl;
                    //alert(url);
                } else {
                    body.removeClass('loading');
                    $('#acesso-negado-modal').show();
                    //alert('Acesso negado!');
                }
            }
        });
        // return false;
    });

    // body.addClass('loading');

    $('#btnLogar').click(function (e) {
        e.preventDefault();
        body.addClass('loading');
        //$('#modal-loading').modal();
        var form = $('#formLogin');
        // alert(form.serialize());
        $.ajax({
            method: 'POST',
            url: '/admin/logar',
            data: form.serialize(),
            success: function (result) {
                if (result.success) {
                    body.removeClass('loading');
                    //$('#modal-loading').close();
                    // alert('ADMIN ENTROUU...');
                    window.location = '/admin/home';
                } else {
                    // alert('Admin n logout');
                    //LOGAR CLIENTE
                    $.ajax({
                        method: 'POST',
                        url: '/logar/client',
                        data: form.serialize(),
                        success: function (result) {
                            if (result.success) {
                                body.removeClass('loading');
                                //$('#modal-loading').close();
                                //alert('ENTROUU...');
                                window.location = '/';
                            } else {
                                /** LOGIN ADM */
                                body.removeClass('loading');
                                // $('#btnFecharModalCarregando').click();
                                $('#acesso-negado').show();
                                //alert('Acesso negado!');
                            }
                        }
                    });

                }
            }
        });

        return false;
    });

    $('#btnFecharAlert').click(function () {
        $('#acesso-negado').hide();
    });


    //AUTO COMPLETE PARTINDO DE
    // $("#rota-autocomplet").keyup(function () {
    //     var query = $(this).val();
    //     if (query != '') {
    //         //alert(partindo);
    //         var _token = $('input[name="_token"]').val();
    //         $.ajax({
    //             url: "/autocomplete/partindo/",
    //             method: "post",
    //             data: { query: query, _token: _token },
    //             success: function (data) {
    //                 $("#listaRotaAutoComplete").fadeIn();
    //                 $("#listaRotaAutoComplete").html(data);
    //             },
    //             error: function (xhr, status, error) {
    //                 alert(xhr.responseText);
    //                 alert(status);
    //                 alert(error);
    //             }
    //         });
    //     }
    // });
    // $("#listaPartindo").on('click', 'li', function () {
    //     $("#partindo_de").val($(this).text())
    //     $("#listaPartindo").fadeOut();
    // });

    // //AUTO COMPLETE INDO PARA
    // $("#indo_para").keyup(function () {
    //     var query = $(this).val();
    //     if (query != '') {
    //         //alert(partindo);
    //         var _token = $('input[name="_token"]').val();
    //         $.ajax({
    //             url: "/autocomplete/indo/",
    //             method: "POST",
    //             data: { query: query, _token: _token },
    //             success: function (data) {
    //                 $("#listaIndo").fadeIn();
    //                 $("#listaIndo").html(data);
    //             },
    //             error: function (xhr, status, error) {
    //                 alert(xhr.responseText);
    //                 alert(status);
    //                 alert(error);
    //             }
    //         });
    //     }
    // });
    // $("#listaIndo").on('click', 'li', function () {
    //     $("#indo_para").val($(this).text())
    //     $("#listaIndo").fadeOut();
    // });

});
