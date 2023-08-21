@extends("layouts.app2")

@section("titulo","Checkout")

@section("conteudo2")
  

<div class="fundo-principal">

  <div class="fundo-branco container">

    
    <form class="form-passageiro" action="{{ route('checkout_store') }}" method="post">
       @csrf
      @if(isset($arrayDecode))
    
        @foreach($arrayDecode as $key => $a)
        <h3 style="margin-block: 20px;">Dados do passageiro {{ $key = $key + 1; }}</h3>
        <div class="row">

          <div class="col-2 col-lg-1 mb-2">
            <input type="text" style="text-align: center;" name="num_poltrona{{ $key }}" class="form-control" placeholder="27" value="{{ $a }}" readonly aria-label="Last name">
          </div>

          <div class="col-10 col-lg-5 mb-2">
            <input type="text" class="form-control" name="nome_passageiro{{ $key }}" placeholder="Nome completo" aria-label="Nome completo">
          </div>

          <div class="col-12 col-lg-5 mb-2">
            <input type="tel" class="form-control" name="idade{{ $key }}" placeholder="Idade" aria-label="Numero do documento">
          </div>

          <div class="col-12 col-lg-6 mb-2">
            <input type="tel" class="form-control" name="idade{{ $key }}" placeholder="Telefone" aria-label="Numero de telefone">
          </div>
        </div>

        <input type="hidden" value="{{ $key }}" name="qtdPassageiro">
        <input type="hidden" value="{{ $precoTotal }}" name="precoTotal">
        <input type="hidden" value="{{ $idViagem }}" name="idViagem">
        @endforeach
        @endif
        <!-- MUdar para submit --><input type="hidden" value="Enviar" id="btnEnv">
    </form>

  </div>

  <div class="container f-pag">

    <h3>Forma de pagamento</h3>
    <p>  </p>
  </div>

</div>

@endsection