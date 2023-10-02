@extends("layouts.app2")

@section("titulo","Escolha de poltrona")

@section("conteudo2")
  
<div class="container-mypassagens">

    <div class="side-menu-mypassagens shadow">
        <a href="{{ route('my_account') }}"><i class="fa fa-user"></i>  Meu Perfil</a>
        {{-- <a href="{{ route('my_passagens') }}" class="active"><i class="fa fa-ticket"></i>  Minhas Passagens</a> --}}
        <a href="{{ route('my_passagens') }}" class="active"><i class="fa fa-ticket"></i>  Minhas Reservas</a>
        <a href="#" class="notificacao" onclick="swal('Sem Notificação!','De momento não possui nenhuma notificação','warning')"><i class="fa fa-cog"></i>  Notificações</a>
        <a href="{{ route('alt_senha') }}"><i class="fa fa-lock"></i>  Alterar Senha</a>
    </div>

    <div class="side-main-mypassagens">
        <h4>Minhas Passagens</h4>

        @if(!isset($reservas))
        <header class="shadow">
            <div class="sem-viagens">
                <h4>Você ainda não possui viagens marcadas</h4>
                <span>
                    Aproveite as ofertas, descontos e faça sua pesquisa aos melhores destinos.
                </span>
            </div>
            <a href="{{ route('home') }}" class="button-edit-profile">
             <i class="fa fa-search"></i>  Procurar passagens
            </a>
        </header>
        @endif

        
        <div class="div-table">

<table class="table table-striped table-bordered table-hover">

<thead>
  <tr role="row">
    <th>#</th>
    <th>Data da reserva</th>
    <th>Preco total</th>
    <th>Status</th>
    <th></th>
  </tr>
</thead>

@foreach($reservas as $r)

<tbody>
  <tr role="row" class="odd">
    <td>{{ $r->id }}</td>
    <td>{{ $r->created_at }}</td>
    <td>{{ number_format($r->preco_total,2,',','.') }} kz</td>
    
    @if($r->status == "Aguardando Pagamento")
    <td><strong style="color: blue;">{{ $r->status }}</strong></td>
    @elseif($r->status == "Pago")
    <td><strong style="color: green;">{{ $r->status }}</strong></td>
    @else
    <td><strong style="color: red;">{{ $r->status }}</strong></td>
    @endif
    <td>
      {{-- <a href="#" class="btn btn-primary">
        <i class="fa fa-eye"></i>
        Ver Detalhes
      </a> --}}
      @if($r->status == "Aguardando Pagamento")
      <button id="btnCancelar" data-id-reserva="{{ $r->id }}" class="btn btn-danger btnCancelarReserva">
        <i class="fa fa-cancel"></i>
        Cancelar Reserva
      </button>
      @endif
    </td>
  </tr>
</tbody>

@endforeach

</table>

        </div>


    </div>

</div>

@endsection