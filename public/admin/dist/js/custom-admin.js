


document.addEventListener('DOMContentLoaded', () => {
    
    const btnCancelar = document.querySelector("#btCancelReserva");
    const btnValidar = document.querySelector("#btValidarPag");
    const enviarEmail = document.querySelector("#btEnviarEmail");
    const btnBaixarBilhete = document.querySelector("#btBaixarBilhete");
    const status = document.querySelector("#status-pagamento").value;


    if(status === "Aguardando Pagamento") {
        enviarEmail.style.display = 'none';
    } else if(status === "Cancelado") {
        enviarEmail.style.display = 'none';
        btnCancelar.style.display = 'none';
        btnValidar.style.display = 'none';
    } else {
        btnValidar.style.display = 'none';
    }


    btnBaixarBilhete.addEventListener('click', () => {

        let CodeReserva = document.querySelector("#code-reserva").value;
        window.location = '/admin/bilhete/download/'+CodeReserva;

    });

    btnValidar.addEventListener('click', () => {

        let CodeReserva = document.querySelector("#code-reserva").value;
        
        swal({
            title: "Deseja validar o pagamento desta reserva?",
            text: "",
            icon: "warning",
            buttons: ["Cancelar","Sim"],
            dangerMode: false,
        })
        .then((conf) => {
            if(conf) {
                // swal('Atencao','Reserva cancelada com sucesso!','success');
                window.location = '/admin/reservas/validar/'+CodeReserva;
            } else {
                // swal('Atencao','Reserva cancelada','error');
            }
        })
    });

    btnCancelar.addEventListener('click', () => {

        let CodeReserva = document.querySelector("#code-reserva").value;
        
        swal({
            title: "Deseja cancelar a reserva?",
            text: "Essa ação pode não ser desfeita.",
            icon: "warning",
            buttons: ["Cancelar","Sim"],
            dangerMode: true,
        })
        .then((conf) => {
            if(conf) {
                // swal('Atencao','Reserva cancelada com sucesso!','success');
                window.location = '/admin/reservas/cancelar/'+CodeReserva;
            } else {
                // swal('Atencao','Reserva cancelada','error');
            }
        })
    });


});