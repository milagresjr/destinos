@extends("layouts.app2")

@section("titulo","Checkout")

@section("conteudo2")
  

<div class="fundo-principal">

  <div class="fundo-white container finish-buy shadow">

    <h2>Compra finalizada <i class="fa fa-check-circle"></i> </h2>
    <p>
        A sua compra foi finalizada com o metodo de pagamento por transferencia bancaria
    {{-- </p>

    A sua compra foi finalizada com sucesso!

    Método de pagamento: Transferência bancária.
    Número do pedido: [Número do Pedido]
    Data da compra: [Data da Compra] --}}

  <p>
    Obrigado por escolher nosso serviço. 
    Após a confirmação de pagamento você receberá o bilhete pelo whatsapp / email.
    {{-- Seu pedido está em processamento e você receberá um email de confirmação em breve. --}}

  </p>
    
  <p>
    Tenha um ótimo dia!
  </p>

  <h3 style="margin-top: 20px;">Destino.ao</h3>

  <a href="{{ route('home') }}" class="btn btn-success mt-4">Voltar á pagina inicial</a>


  </div>

</div>

@endsection