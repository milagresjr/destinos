@extends("layouts.app-admin")

@section("conteudo-admin")

@section("titulo-page", "Pagina de Reservas")
@section("breadcrumb1", "Home")
@section("breadcrumb2", "Reservas")

      <!-- Your Page Content Here -->   
      <div class="box">
        <div class="box-header">
        </div>
      <div class="box-body">
      <table id="tabelaReserv" class="table table-striped table-bordered table-hover">

        <thead>
          <tr role="row">
            <th>#</th>
            <th>CODIGO DA VIAGEM</th>
            <th>NOME DO CLIENTE</th>
            <th>NUMERO DA POLTRONA</th>
            <th>PRECO TOTAL</th>
            <th>NOME DO PASSAGEIRO</th>
            <th>IDADE DO PASSAGEIRO</th>
            <th>STATUS</th>
            <th></th>
          </tr>
        </thead>

        @foreach($reservas as $r)

        <tbody>
          <tr role="row" class="odd">
            <td>{{ $r->id }}</td>
            <td>{{ $r->viagem_id }}</td>
            <td>{{ $r->nome_cliente }}</td>
            <td>{{ $r->numero_poltrona }}</td>
            <td>{{ number_format($r->preco_total,2,',','.') }} kz</td>
            <td>{{ $r->nome_passageiro }}</td>
            <td>{{ $r->idade_passageiro }}</td>
            @if($r->status == "Aguardando Pagamento")
            <td><strong style="color: blue;">{{ $r->status }}</strong></td>
            @elseif($r->status == "Pago")
            <td><strong style="color: green;">{{ $r->status }}</strong></td>
            @else
            <td><strong style="color: red;">{{ $r->status }}</strong></td>
            @endif
            <td>
              <a href="#" class="btn btn-primary">
                <i class="fa fa-eye"></i>
                Ver Detalhes
              </a>
            </td>
          </tr>
        </tbody>

        @endforeach

      </table>
    </div>
      </div>


      <script>

        document.addEventListener('DOMContentLoaded', () => {

           // ALTERAR ENTRE MENU ATIVO
          addActiveClass('reservas');

        });


      </script>

@endsection
