@extends("layouts.app-admin")

@section("conteudo-admin")

@section("titulo-page", "Pagina de Reservas")
@section("breadcrumb1", "Home")
@section("breadcrumb2", "Reservas")

      <!-- Your Page Content Here -->   
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Data Table With Full Features</h3>
        </div>
      <div class="box-body">
      <table id="tabelaReserva" class="table table-striped table-bordered table-hover">

        <thead>
          <tr role="row">
            <th>ID</th>
            <th>NUMERO POLTRONA</th>
            <th>PRECO TOTAL</th>
            <th>NOME DO PASSAGEIRO</th>
            <th>IDADE</th>
          </tr>
        </thead>

        @foreach($reservas as $r)

        <tbody>
          <tr role="row" class="odd">
            <td>{{ $r->id }}</td>
            <td>{{ $r->numero_poltrona }}</td>
            <td>{{ number_format($r->preco_total,2,',','.') }} kz</td>
            <td>{{ $r->nome_passageiro }}</td>
            <td>{{ $r->idade }}</td>
          </tr>
        </tbody>

        @endforeach

      </table>
    </div>
      </div>

@endsection
