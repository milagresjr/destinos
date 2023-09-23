@extends("layouts.app-admin")

@section("conteudo-admin")

@section("titulo-page", "Pagina de Viagens")
@section("breadcrumb1", "Home")
@section("breadcrumb2", "Viagens")

      <!-- Your Page Content Here -->   
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Viagens</h3>
        </div>
      <div class="box-body">

        {{-- Alert para sucesso! --}}
        @if (session('success'))
          <div class="alert alert-success">
              {{ session('success') }}
          </div>
        @endif
        {{-- Alert para erro --}}
        @if (session('danger'))
          <div class="alert alert-danger">
              {{ session('danger') }}
          </div>
        @endif

         <!-- Button trigger modal -->
         <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalNovaViagem">
          <i class="fa fa-plus"></i> Novo
        </button>

      <table id="tabelaReserva" class="table table-striped table-bordered table-hover">

        <thead>
          <tr role="row">
            <th>ID</th>
            <th>ROTA</th>
            <th>PREÇO DA VIAGEM</th>
            <th>DATA DA VIAGEM</th>
            <th>HORA DE PARTIDA</th>
            <th>HORA DE CHEGADA</th>
            <th>AGÊNCIA</th>
          </tr>
        </thead>

        @foreach($viagem as $v)

        <tbody>
          <tr role="row" class="odd">
            <td>{{ $v->idViagem }}</td>
            <td>{{ $v->provi_partida }} => {{ $v->provi_destino }}</td>
            <td>{{ number_format($v->preco_bilhete,2,',','.') }} kz</td>
            <td class="dataViagem">{{ date('Y/m/d',strtotime($v->data_partida)) }}</td>
            <td>{{ $v->hora_partida }}</td>
            <td>{{ $v->hora_chegada }}</td>
            <td>{{ $v->nomeAgencia }}</td>          
          <td>
            <button class="btn btn-success btn-editar" data-id="{{ $v->idViagem }}" data-toggle="modal" data-target="#modalEditarViagem" style="margin-right: 10px;">
              <i class="fa fa-pencil"></i> Editar
            </button>
            <button class="btn btn-danger btn-deletar" data-id="{{ $v->idViagem }}" data-toggle="modal" data-target="#modalDeleteViagem">
              <i class="fa fa-trash"></i> Excluir
            </button>
          </td>
        </tr>
        </tbody>

        @endforeach

      </table>
    </div>
      </div>



  <!-- MODAL  NOVA VIAGEM-->
  <!-- Modal -->
  <div class="modal fade" id="modalNovaViagem" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Cadastrar Viagem</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="POST" action="{{ route('admin.viagem.store') }}">
          @csrf
          <div class="modal-body">

              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="rotaSelect">Rota</label>
                  <select class="form-control" id="rotaSelect" name="rota">
                  @if($rotas)
                    @foreach($rotas as $r)
                    <option value="{{ $r->id }}">{{ $r->provi_partida }} - {{ $r->provi_destino }} <span>({{ $r->nomeAgencia }})</span></option>
                    @endforeach
                  @endif
                  </select>
                </div>
                <div class="form-group col-md-6">
                  <label for="precoInput">Preço da viagem</label>
                  <input type="tel" name="preco" id="precoInput" class="form-control" />
                </div>
              </div>

              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="dataViagem">Data da viagem</label>
                  <input type="date" name="data_viagem" id="dataViagem" class="form-control">
                </div>
                <div class="form-group col-md-6">
                  <label for="agenciaSelect">Agência</label>
                  <select class="form-control" id="agenciaSelect" name="agencia">
                    @if($agencias)
                      @foreach($agencias as $a)
                      <option value="{{ $a->id }}">{{ $a->nome }}</option>
                      @endforeach
                    @endif
                  </select>
                </div>
              </div>

              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="horaPartida">Hora de partida</label>
                  <input type="time" name="hora_partida" id="horaPartida" class="form-control">
                </div>
                <div class="form-group col-md-6">
                  <label for="horaChegada">Hora de chegada</label>
                  <input type="time" name="hora_chegada" id="horaChegada" class="form-control">
                </div>
              </div>

              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="terminalPartidaSelect">Terminal de partida</label>
                  <select class="form-control" id="terminalPartidaSelect" name="terminal_partida">
                    @if($terminais)
                      @foreach($terminais as $t)
                      <option value="{{ $t->id }}">Terminal {{ $t->nomeTerminal }} ({{ $t->nomeAgencia }})</option>
                      @endforeach
                    @endif
                  </select>
                </div>
                <div class="form-group col-md-6">
                  <label for="terminalChegadaSelect">Terminal de chegada</label>
                  <select class="form-control" id="terminalChegadaSelect" name="terminal_chegada">
                    @if($terminais)
                      @foreach($terminais as $t)
                      <option value="{{ $t->id }}">Terminal {{ $t->nomeTerminal }} ({{ $t->nomeAgencia }})</option>
                      @endforeach
                    @endif
                  </select>
                </div> 
              </div>
              
          </div>
          <div class="modal-footer">
            <button class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary">Salvar</button>
          </div>
      </form>
      </div>
    </div>
  </div>
<!-- FIM DO MODAL -->

 <!-- MODAL  EDITAR ROTA-->
  <!-- Modal -->
  <div class="modal fade" id="modalEditarViagem" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Editar Viagem</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="POST" action="{{ route('admin.viagem.update',0) }}" id="formEdit">
          @csrf
          @method('PUT') 
          {{-- <!-- ou @method('PATCH') --> --}}

          <div class="modal-body">

              
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="rotaSelect">Rota</label>
                  <select class="form-control" id="rotaSelect" name="rota">
                    <option id="rotaOptionEdit"></option>
                  @if($rotas)
                    @foreach($rotas as $r)
                    <option value="{{ $r->id }}" class="optionRota">{{ $r->provi_partida }} - {{ $r->provi_destino }} <span>({{ $r->nomeAgencia }})</span></option>
                    @endforeach
                  @endif
                  </select>
                </div>
                <div class="form-group col-md-6">
                  <label for="precoInput">Preço da viagem</label>
                  <input type="tel" name="preco" id="precoInputEdit" class="form-control" />
                </div>
              </div>

              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="dataViagemEdit">Data da viagem</label>
                  <input type="date" name="data_viagem" id="dataViagemEdit" class="form-control">
                </div>
                <div class="form-group col-md-6">
                  <label for="agenciaSelect">Agência</label>
                  <select class="form-control" id="agenciaSelect" name="agencia">
                    <option id="agenciaOptionEdit"></option>
                    @if($agencias)
                      @foreach($agencias as $a)
                      <option value="{{ $a->id }}" class="optionAgencia">{{ $a->nome }}</option>
                      @endforeach
                    @endif
                  </select>
                </div>
              </div>

              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="horaPartidaEdit">Hora de partida</label>
                  <input type="time" name="hora_partida" id="horaPartidaEdit" class="form-control">
                </div>
                <div class="form-group col-md-6">
                  <label for="horaChegadaEdit">Hora de chegada</label>
                  <input type="time" name="hora_chegada" id="horaChegadaEdit" class="form-control">
                </div>
              </div>

              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="terminalPartidaSelect">Terminal de partida</label>
                  <select class="form-control" id="terminalPartidaSelect" name="terminal_partida">
                    <option id="terminalPartidaOptionEdit"></option>
                    @if($terminais)
                      @foreach($terminais as $t)
                      <option value="{{ $t->id }}" class="optionTerminalPartida">Terminal {{ $t->nomeTerminal }} ({{ $t->nomeAgencia }})</option>
                      @endforeach
                    @endif
                  </select>
                </div>
                <div class="form-group col-md-6">
                  <label for="terminalChegadaSelect">Terminal de chegada</label>
                  <select class="form-control" id="terminalChegadaSelect" name="terminal_chegada">
                    <option id="terminalChegadaOptionEdit"></option>
                    @if($terminais)
                      @foreach($terminais as $t)
                      <option value="{{ $t->id }}" class="optionTerminalChegada">Terminal {{ $t->nomeTerminal }} ({{ $t->nomeAgencia }})</option>
                      @endforeach
                    @endif
                  </select>
                </div> 
              </div>         
              <input type="hidden" name="id" id="idSelectEdit">
          </div>
          <div class="modal-footer">
            <button class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary">Salvar</button>
          </div>
      </form>
      </div>
    </div>
  </div>
<!-- FIM DO MODAL -->

<!-- MODAL  DELETAR ROTA-->
  <!-- Modal -->
  <div class="modal fade" id="modalDeleteViagem" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="POST" action="{{ route('admin.viagem.destroy',0) }}">
          @csrf
          @method('DELETE')
          <div class="modal-body">
             <h2 style="text-align: center;">Tem certeza que deseja excluir esta viagem ?</h2>
             <input type="hidden" name="id" id="idInputDelete">
          <div class="modal-footer">
            <button class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary">Sim</button>
          </div>
      </form>
      </div>
    </div>
  </div>
  {{-- FIM DO MODAL DELETAR --}}




  <script>

document.addEventListener("DOMContentLoaded", () => {
      
      //ALTERAR
      var btnEditar = document.querySelectorAll(".btn-editar");
      //Dados do form
      var rota = document.querySelector("#rotaOptionEdit");
      var dataViagem = document.querySelector("#dataViagemEdit");
      var preco = document.querySelector("#precoInputEdit");
      var horaPartida = document.querySelector("#horaPartidaEdit");
      var horaChegada = document.querySelector("#horaChegadaEdit");
      var agencia = document.querySelector("#agenciaOptionEdit");
      var terminalPartida = document.querySelector("#terminalPartidaOptionEdit");
      var terminalChegada = document.querySelector("#terminalChegadaOptionEdit");
      var idViagem = document.querySelector("#idSelectEdit");

      btnEditar.forEach((btn) => {
        btn.addEventListener('click', (event) => {
          var id = btn.getAttribute("data-id");
          myFetch(id);
        });

      const myFetch = async (id) => {
        try {
          const response = await fetch('/admin/travels/'+id+'/edit');
          const data = await response.json();
          data.map( d => {
            idViagem.value = id;
            preco.value = d.preco_bilhete;
            dataViagem.value = d.data_partida;
            horaPartida.value = d.hora_partida;
            horaChegada.value = d.hora_chegada;
            rota.textContent = d.provi_partida +" => "+ d.provi_destino + " ("+d.nomeAgencia+")";
            rota.value = d.idRota;
            agencia.textContent = d.nomeAgencia;
            agencia.value = d.idAgencia;
            terminalPartida.textContent = "Terminal " + d.terminalPartida;
            terminalPartida.value = d.idTerminalPartida;
            terminalChegada.textContent = "Terminal " + d.terminalChegada;
            terminalChegada.value = d.idTerminalChegada;

            let rotaOption = document.querySelectorAll('.optionRota');
            let agenciaOption = document.querySelectorAll(".optionAgencia");
            let terminalPartidaOption = document.querySelectorAll(".optionTerminalPartida");
            let terminalChegadaOption = document.querySelectorAll(".optionTerminalChegada");

            rotaOption.forEach( option => {
              
              (d.idRota == option.value) ? option.style.display = 'none' : option.style.display = 'block';

            });
            agenciaOption.forEach( option => {
              
              (d.idAgencia == option.value) ? option.style.display = 'none' : option.style.display = 'block';

            });
            terminalPartidaOption.forEach( option => {
              
              (d.idTerminalPartida == option.value) ? option.style.display = 'none' : option.style.display = 'block';

            });
            terminalChegadaOption.forEach( option => {
              
              (d.idTerminalChegada == option.value) ? option.style.display = 'none' : option.style.display = 'block';

            });
            
         });
        }catch(e) {
          console.log("ERRO: ",e);
        }
      }

      });

      //DELETAR
      var btnDelete = document.querySelectorAll(".btn-deletar");
      var idViagemDelete = document.querySelector("#idInputDelete");

      btnDelete.forEach( btn => {

        btn.addEventListener('click', event => {

          var idDelete = btn.getAttribute("data-id");
          idViagemDelete.value = idDelete;

        });

      });

          // ALTERAR ENTRE MENU ATIVO
          addActiveClass('viagens');

    });

  </script>



      <script>   
        let dataViagem = document.querySelectorAll(".dataViagem");
        // dataViagem.innerHTML = 'oii22';
        dataViagem.forEach((d) => {
            let data = new Date(d.innerHTML);
            let day = data.getDate();
            let monthLower = data.toLocaleDateString('pt-BR',{ month:'long' });
            let monthToFirstUpper = monthLower.charAt(0).toUpperCase() + monthLower.slice(1);
            let dataFormatada = `${day} de ${monthToFirstUpper}`;
            d.innerHTML = dataFormatada;
        });
      </script>

@endsection
