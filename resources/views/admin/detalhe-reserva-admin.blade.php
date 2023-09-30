@extends("layouts.app-admin")

@section("conteudo-admin")

@section("titulo-page", "Detalhes Reserva")
@section("breadcrumb1", "Home")
@section("breadcrumb2", "Detalhes Reserva")

      <!-- Your Page Content Here -->   
      <div class="box container-reserva">

        @foreach($reservas as $p)
            
            <h2>Informações da Reserva</h2>
            <div class="info-passag"><h5>Cliente: </h5><span>{{ $p->nome_cliente }}</span></div>
            <div class="info-passag"><h5>Data: </h5><span>{{ $p->created_at }}</span></div>
            <div class="info-passag"><h5>Preço Total: </h5><span>{{ number_format($p->preco_total,2,',','.') }} kz</span></div>
            <div class="info-passag"><h5>Status: </h5>
            @if($p->status == "Aguardando Pagamento")
            <span><strong style="color: blue;">{{ $p->status }}</strong></span>
            @elseif($p->status == "Pago")
            <span><strong style="color: green;">{{ $p->status }}</strong></span>
            @else
            <span><strong style="color: red;">{{ $p->status }}</strong></span>
            @endif
          </div>
          <input type="hidden" id="code-reserva" value="{{ $p->codigo_reserva }}">
          <input type="hidden" id="status-pagamento" value="{{ $p->status }}">
        @endforeach

        @foreach($info_passageiro as $r)
            
            <h4>Passageiro 01</h4>
            <div class="info-passag"><strong>Nome: </strong><span>{{ $r->nome_passageiro }}</span></div>
            <div class="info-passag"><strong>Idade: </strong><span>{{ $r->idade_passageiro }}</span></div>
            <div class="info-passag"><strong>Numero da poltrona: </strong><span>{{ $r->numero_poltrona }}</span></div>

        @endforeach

    <hr>
        <div class="buttons">
          <button class="btn btn-success" id="btValidarPag">Validar Pagamento</button>

          <button class="btn btn-danger" id="btCancelReserva" >Cancelar Reserva</button>

          <button class="btn btn-primary" id="btBaixarBilhete" >
            <i class="fa fa-download"></i>
            Baixar bilhete
          </button>
          <button class="btn btn-primary" id="btEnviarEmail" >
            <i class="fa fa-envelop"></i>
            Enviar bilhete por email
          </button>
        </div>

    </div>



      <script>

        document.addEventListener('DOMContentLoaded', () => {

           // ALTERAR ENTRE MENU ATIVO
          addActiveClass('reservas');

        });


      </script>

@endsection
