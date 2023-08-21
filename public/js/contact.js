$(document).ready(function(){

    (function($) {
        "use strict";


    jQuery.validator.addMethod('answercheck', function (value, element) {
        return this.optional(element) || /^\bcat\b$/.test(value)
    }, "type the correct answer -_-");

    // validate contactForm form
    $('#btnCad').click(function() {
        //alert("Simmm");
        //$('#btnCad').click(function)
        $('#formCadastroClient').validate({
            rules: {
                nome: {
                    required: true,
                    minlength: 5
                },
                email: {
                    required: fase,
                    email: true
                },
                telefone: {
                    required: true,
                    minlength: 9,
                    maxlenght: 9
                },
                senha1: {
                    required: true,
                    password: true,
                    minlenght: 8
                },
                senha2: {
                    required: true,
                    password: true,
                    minlenght: 8
                }
            },
            messages: {
                nome: {
                    required: "Preencha o campo com seu nome",
                    minlength: "Seu nome deve conter mais de 2 caracteres"
                },
                email: {
                    required: "Preencha o campo com seu email",
                    email: "Coloque um email v�lido"
                },
                telefone: {
                    required: "Preencha o campo com seu n�mero de telefone",
                    minlength: "Seu n�mero deve conter 9 digitos",
                    maxlength: "Seu n�mero deve conter 9 digitos"
                },
                senha1: {
                    required: "Preencha o campo com aua senha",
                    password: "Coloque uma senha v�lida",
                    minlength: "A senha deve ter no m�nimo 8 caracteres"
                },
                senha2: {
                    required: "Preencha o campo com aua senha",
                    password: "Coloque uma senha v�lida",
                    minlength: "A senha deve ter no m�nimo 8 caracteres"
                }
            }
        })
    })

 })(jQuery)
})
