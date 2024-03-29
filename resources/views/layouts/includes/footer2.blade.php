
{{-- <script src="{{ asset('js/jquery-2.1.4.min.js') }}"></script> --}}
<script src="{{ asset('js/code.jquery.com_jquery-3.7.1.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.bundle.js') }}"></script>
{{-- <script src="{{ asset('js/escolhaPoltraa.js') }}"></script> --}}
<script src="{{ asset('js/sweetalert.min.js') }}"></script>
<script src="{{ asset('js/checkout.js') }}"></script>
<script src="{{ asset('js/mypassagens.js') }}"></script>

<script>

  $(document).ready(function(){
  
      //Altera o text das div com status ocupadas para um X
      $('.ocupado').text('x');
  
      var selectedSeats = 0; //Variavel que conta o numero de poltronas ja selecionadas
      var preco = 0; //Variavel para calcular o preco das poltronas de acordo as quantidades selecionadas
      var lblpreco = $('#preco'); //Pega o elemento com id preco
      var listaDePoltronas = []; // Array para armazenar todas as poltronas selecionadas
      const btnContinuar = document.querySelector('#btContinuarReserva');
      // const precoViagem = {{ isset($_GET["preco"])?$_GET["preco"]:0 }} //Pega o preco da viagem na url
      const precoViagem = $('#inputPrecoViagem').val(); 
      //Desabilita o botao continuar reserva
      btnContinuar.disabled = true;

      //Evento para quando clicar em uma poltrona
      $('.poltrona').click(function(){
        //alert(idViagem);
            // var idViagem = {{ isset($_GET["idViagem"])?$_GET["idViagem"]:0 }} //Variavel que pega o id da viagem na url
            var idViagem = $('#inputIdViagem').val();
            var valorPoltrona = $(this).data('value'); //Variavel que pega o valor da poltrona
            var potSelecionada = $(this); //Variavel que armazena a poltrona que foi clicada
            
            //Verfica se a poltrona clicada ja esta com status selecionado
            //Caso nao esteja alterar para disponivel
            if (potSelecionada.hasClass('selecionado')) {
                potSelecionada.toggleClass('selecionado');
                selectedSeats--;
                preco = preco - precoViagem;
                let novoPreco = formatarPreco(preco);
                lblpreco.text(novoPreco+' Kz');
                //Token 
                var _token = $('input[name="_token"]').val();
                //Requisicao ajax para eliminar do BD uma poltrona selecionada temporariamente
                //Caso o usuario deseleciona a poltrona
                $.ajax({
                      url: "/deletar_poltrona/"+idViagem+"/"+valorPoltrona,
                      method: "DELETE",
                      data: {
                          numero_poltrona: valorPoltrona, id_viagem: idViagem, _token: _token
                      },
                      success: function(response) {
                        removePoltronaLista(valorPoltrona);
                      },
                      error: function(xhr,status,error){
                          alert(xhr.responseText);
                      }
                  });
  
              }else{

                   /* Ajax para verificar se a poltrona esta temporariamente selecionada! */
                var _token = $('input[name="_token"]').val();
                $.ajax({
                  url: '/verifica_poltrona',
                  method: 'POST',
                  data: {numero_poltrona: valorPoltrona, id_viagem: idViagem, _token: _token},
                  success: function(response){
                if(response.res){
                  swal('Impossível selecionar poltrona','A poltrona já foi selecionada por outro cliente. Por favor, selecione outra poltrona','error');
                 }else{ 
                  //Chamar a funcao selecionarPoltrona 
                  selecionarPoltrona(potSelecionada);
                  //addPoltronaLista(valorPoltrona);
                  //Ajax para inserir temporariamente no BD a poltrona selecionada!
                  $.ajax({
                      url: "/seat_selections",
                      method: "POST",
                      data: {
                          numero_poltrona: valorPoltrona, id_viagem: idViagem, _token: _token
                      },
                      success: function(response) {                       
                          addPoltronaLista(valorPoltrona);
                      },
                      error: function(xhr,status,error){
                          alert(xhr.responseText);
                      }
                  });
  
                 }
              }
            });
            /*Fim do ajax*/
  
              } 
          
  
      });
  
      //Funcao selecionarPoltrona para mudar o status de uma poltrona para selecionada ou disponivel
      function selecionarPoltrona(p){
  
        if (!p.hasClass('ocupado') && selectedSeats < 3) {
                p.toggleClass('selecionado');
                if (p.hasClass('selecionado')) {
                  selectedSeats++;
                  preco = selectedSeats * precoViagem;
                  let novoPreco = formatarPreco(preco);
                  lblpreco.text(novoPreco+' Kz');
                } else {
                  selectedSeats--;
                  preco = preco - precoViagem;
                  let novoPreco = formatarPreco(preco);
                  lblpreco.text(novoPreco+' Kz');
                }
              } else if (p.hasClass('selecionado')) {
                p.toggleClass('selecionado');
                selectedSeats--;
                preco = preco - precoViagem;
                let novoPreco = formatarPreco(preco);
                lblpreco.text(novoPreco+' Kz');
              } else if (selectedSeats >= 3) {
                  swal('Oops!','Você só pode escolher 3 poltronas','error');
              }
      }

      function formatarPreco(precoFormat) {

        let precoForm = precoFormat.toLocaleString('pt-AO',{
          minimumFractionDigits: 2,
          maximumFractionDigits: 2
        });

        return precoForm;

      }
  
      function addPoltronaLista(valorPoltrona)
      {
        if(listaDePoltronas.length >=0 && listaDePoltronas.length <= 2)
        {
         // Verifique se o número da poltrona já está presente na lista de poltronas escolhidas
         if ($.inArray(valorPoltrona, listaDePoltronas) === -1) {
              // Adicione a poltrona à lista de poltronas escolhidas
              listaDePoltronas.push(valorPoltrona);
              btnContinuar.disabled = false;
              btnContinuar.classList.remove("disabled")  
          }
         // console.log(listaDePoltronas);
         //alert(listaDePoltronas);
        }
        
      }

      function removePoltronaLista(valorPoltrona)
      {
        // Remove a poltrona da lista de poltronas escolhidas
        listaDePoltronas.splice(listaDePoltronas.indexOf(valorPoltrona), 1);
        if(listaDePoltronas == 0){
          btnContinuar.disabled = true;
          btnContinuar.classList.add("disabled") 
        }
         
      }

  
      $('#btContinuarReserva').click(function(){
          // var idViagem = {{ isset($_GET["idViagem"])?$_GET["idViagem"]:0 }} 
          var idViagem = $('#inputIdViagem').val();
          //alert('Poltronas selecionadas: '+listaDePOltronas);
          
          const arrayString = JSON.stringify(listaDePoltronas);
          const arrayCodificado = encodeURIComponent(arrayString);
          //alert(arrayCodificado);
          window.location = '/buy/checkout/'+idViagem+'/'+arrayCodificado;
      });
      

    /*  $('#btnEnv').click(function(e){
        e.preventDefault();
        var form = $('#formcheck');
        alert(form.serialize());

      }); */

  });
  
  
  </script>
  
@if(session('client-edit-success'))
    <script>
        var msg ='Dados alterados com sucesso!'
        swal('Sucesso!',msg,'success');
    </script>
@endif

@if(session('client-edit-danger'))
    <script>
        var msg ='Dados não alterados!'
        swal('oops!',msg,'error');
    </script>
@endif

@if(session('senhas-nao-correspondem'))
    <script>
        var msg ='As senhas não correspodem!'
        swal('oops!',msg,'error');
    </script>
@endif

@if(session('senha-atual-errada'))
    <script>
        var msg ='A senha atual está errada!'
        swal('oops!',msg,'error');
    </script>
@endif

@if(session('senha-edit-success'))
    <script>
        var msg ='Senha atualizada com sucesso!'
        swal('Sucesso!',msg,'success');
    </script>
@endif

@if(session('reserva-cancel'))
    <script>
        var msg = 'Reserva cancelada com sucesso!';
        swal('Sucesso!',msg,'success');
    </script>
@endif

<script>

  const noti = querySelectorAll(".notificacao");

  noti.forEach(btn => {

    btn.addEventListener('click', () => {

      alert('oiii');

    });

  });

</script>

</body>
</html>