
const btnCancelar = document.querySelector("#btnCancelarReserva");

btnCancelar.addEventListener('click', () => {

    let idReserva = btnCancelar.getAttribute('data-id-reserva');
    
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
            window.location = '/mypassagens/cancelar/'+idReserva;
        } else {
            // swal('Atencao','Reserva cancelada','error');
        }
    })
});