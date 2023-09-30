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
            <th>DATA DA RESERVA</th>
            <th>NOME DO CLIENTE</th>
            <th>PRECO TOTAL</th>
            <!-- <th>NUMERO DE PASSAGEIROS</th> -->
            <th>STATUS</th>
            <th></th>
          </tr>
        </thead>

        @foreach($reservas as $r)

        <tbody>
          <tr role="row" class="odd">
            <td>#{{ $r->codigo_reserva }}</td>
            <td>{{ $r->created_at }}</td>
            <td>{{ $r->nome_cliente }}</td>
            <td>{{ number_format($r->preco_total,2,',','.') }} kz</td>
            
            @if($r->status == "Aguardando Pagamento")
            <td><strong style="color: blue;">{{ $r->status }}</strong></td>
            @elseif($r->status == "Pago")
            <td><strong style="color: green;">{{ $r->status }}</strong></td>
            @else
            <td><strong style="color: red;">{{ $r->status }}</strong></td>
            @endif
            <td>
              <a href="{{ route('admin.reserva.show', $r->codigo_reserva) }}" class="btn btn-primary">
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
