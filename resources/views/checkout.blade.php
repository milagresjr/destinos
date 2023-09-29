@extends("layouts.app2")

@section("titulo","Checkout")

@section("conteudo2")
  

<div class="fundo-principal">

  <div class="fundo-white container shadow">

    <form class="form-passageiro" action="{{ route('checkout_store') }}" method="post">
       @csrf
      @if(isset($arrayDecode))
    
        @foreach($arrayDecode as $key => $a)

          <h3 style="margin-block: 20px;">Dados do passageiro {{ $key = $key + 1; }}</h3>
          
          <div class="row">

            <div class="col-2 col-md-2 mb-2">
              <input type="text" style="text-align: center;" name="num_poltrona{{ $key }}" class="form-control" placeholder="27" value="{{ $a }}" readonly aria-label="Last name" required>
            </div>

            <div class="col-10 col-md-5 mb-2">
              <input type="text" class="form-control" name="nome_passageiro{{ $key }}" placeholder="Nome completo" aria-label="Nome completo" required>
            </div>

            <div class="col-12 col-md-5 mb-2">
              <input type="tel" class="form-control" name="idade{{ $key }}" placeholder="Idade" aria-label="Numero do documento" required>
            </div>

          </div>

          <input type="hidden" value="{{ $key }}" name="qtdPassageiro">
          <input type="hidden" value="{{ $viagem[0]->preco_bilhete }}" name="precoTotal">
          <input type="hidden" value="{{ $idViagem }}" name="idViagem">
          <input type="hidden" value="transferencia" name="forma-pag" id="form-pag">
        @endforeach
        @endif

  </div>

  <div class="container f-pag shadow">

    <h3>Forma de pagamento</h3>
    <div class="formas-pagamento">
      
      <div class="transferencia active" id="transfMethod">
        <i class="fa fa-bank"></i>
        <span>Transferência bancária</span>
      </div>
      <div class="mcx" id="mcxMethod">
        <i class="fa fa-credit-card"></i>
        <span>Multicaixa Express</span>
      </div>

    </div>

    <!-- TRANSFERENCIA -->
      <div class="mt-4" id="bodyTrans">
        <div class="">
        <h4>Informações Bancárias</h4>
  
          <div class="info-bank">

          <div>
            <p><strong>Banco: </strong> BFA </p>
            <p><strong>Numero da conta: </strong> 2345436798665</p>
            <p><strong>IBAN: </strong> AO60 0000 5465 7654 2345 45</p>
          </div>
          <div>
            <p><strong>Banco: </strong> BFA </p>
            <p><strong>Numero da conta: </strong> 2345436798665</p>
            <p><strong>IBAN: </strong> AO60 0000 5465 7654 2345 45</p>
          </div>

          </div>
  <hr>
          <p class="obs">
            Obs: Após realizar o pagamento, enviar o seu 
            comprovativo de pagamento nos seguintes contactos:
            <ul>
              <li><strong>Email:</strong> geral@destino.co.ao</li>
              <li><strong>Whatsapp:</strong> 954367123</li>
            </ul>
          </p>

        </div>
      </div>
  <!-- FIM TRANSFERENCIA -->

  <!--  MCX -->
    <div class="mt-4" id="bodyMcx">
      <div class="card card-body">
          <p>
            <h4>Indisponivel</h4>
              De momento este método de pagamento esta Indisponivel. Tente outro
          </p>
      </div>
    </div>
  <!-- FIM MCX -->

  </div>

  <div class="container comprar mt-4 mb-3 float-right">
  <span>Clicando em comprar você aceita nossos <a href="#">termos de uso</a> e <a href="#">politica de privacidade</a>.</span>
  <button type="submit" class="btn-comprar" id="btnComprar">Comprar</button>

  </div>

  </form>

</div>

@endsection