@extends("layouts.app-admin")

@section("conteudo-admin")

@section("titulo-page", "Pagina de Terminais")
@section("breadcrumb1", "Home")
@section("breadcrumb2", "Viagens")

      <!-- Your Page Content Here -->   
      <div class="box">
        <div class="box-header">
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
         <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalNovoTerminal">
          <i class="fa fa-plus"></i> Novo
        </button>

      <table id="tabelaReserv" class="table table-striped table-bordered table-hover">

        <thead>
          <tr role="row">
            <th>ID</th>
            <th>TERMINAL</th>
            <th>PROVINCIA / MUNICÍPIO</th>
            <th>AGÊNCIA</th>
          </tr>
        </thead>

        @foreach($terminais as $t)

        <tbody>
          <tr role="row" class="odd">
            <td>{{ $t->id }}</td>
            <td>Terminal {{ $t->nomeTerminal }}</td>
            <td>{{ $t->nomeDestino }}</td>
            <td>{{ $t->nomeAgencia }}</td>          
          <td>
            <button class="btn btn-success btn-editar" data-id="{{ $t->id }}" data-toggle="modal" data-target="#modalEditarTerminal" style="margin-right: 10px;">
              <i class="fa fa-pencil"></i> Editar
            </button>
            <button class="btn btn-danger btn-deletar" data-id="{{ $t->id }}" data-toggle="modal" data-target="#modalDeleteTerminal">
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
  <div class="modal fade" id="modalNovoTerminal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Cadastrar Terminal</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="POST" action="{{ route('admin.terminal.store') }}">
          @csrf
          <div class="modal-body">
              <div class="form-group">
                <label for="partindoSelect">Local</label>
                <input type="text" name="local" class="form-control" placeholder="Digite o local do terminal" />
              </div>
              <div class="form-group">
                <label for="indoSelect">Provincia / Municipio</label>
                <select class="form-control" id="proviMuniSelect" name="provi_muni">
                  @if($destinos)
                  @foreach($destinos as $d)
                  <option value="{{ $d->id }}">{{ $d->nome }}</option>
                  @endforeach
                @endif
                </select>
              </div>
              <div class="form-group">
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
          <div class="modal-footer">
            <button class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary">Salvar</button>
          </div>
      </form>
      </div>
    </div>
  </div>
<!-- FIM DO MODAL -->

 <!-- MODAL EDITAR TERMINAL-->
  <!-- Modal -->
  <div class="modal fade" id="modalEditarTerminal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Editar Terminal</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="POST" action="{{ route('admin.terminal.update',0) }}" id="formEdit">
          @csrf
          @method('PUT') 
          {{-- <!-- ou @method('PATCH') --> --}}

          <div class="modal-body">
             <div class="form-group">
                  <label for="localInputEdit">Local</label>
                  <input type="text" name="local" id="localInputEdit" class="form-control" />
                </div>
                <div class="form-group">
                  <label for="indoSelect">Provincia / Municipio</label>
                  <select class="form-control" id="proviMuniSelectEdit" name="provi_muni">
                    <option id="destinoOptionEdit"></option>
                    @if($destinos)
                    @foreach($destinos as $d)
                    <option value="{{ $d->id }}" class="optionDestino">{{ $d->nome }}</option>
                    @endforeach
                  @endif
                  </select>
                </div>
                <div class="form-group">
                  <label for="agenciaSelect">Agência</label>
                  <select class="form-control" id="agenciaSelectEdit" name="agencia">
                    <option id="agenciaOptionEdit"></option>
                      @if($agencias)
                        @foreach($agencias as $a)
                        <option value="{{ $a->id }}" class="optionAgencia">{{ $a->nome }}</option>
                        @endforeach
                      @endif
                  </select>
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
<!-- FIM DO MODAL EDITAR TERMINAL-->

<!-- MODAL  DELETAR ROTA-->
  <!-- Modal -->
  <div class="modal fade" id="modalDeleteTerminal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="POST" action="{{ route('admin.terminal.destroy',0) }}">
          @csrf
          @method('DELETE')
          <div class="modal-body">
             <h2 style="text-align: center;">Tem certeza que deseja excluir este terminal ?</h2>
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
      var local = document.querySelector("#localInputEdit");
      var destino = document.querySelector("#proviMuniSelectEdit");
      var agencia = document.querySelector("#agenciaSelectEdit");
      var idTerminal = document.querySelector("#idSelectEdit");

      btnEditar.forEach((btn) => {

      btn.addEventListener('click', (event) => {
        var id = btn.getAttribute("data-id");
        myFetch(id);
      });

      const myFetch = async (id) => {
        try {
          const response = await fetch('/admin/terminals/'+id+'/edit');
          const data = await response.json();
          data.map( d => {
            idTerminal.value = id;
            local.value = d.nomeTerminal;
            //Indo
            let tagOptionDestinoEdit = document.querySelector("#destinoOptionEdit");
            tagOptionDestinoEdit.textContent = d.nomeDestino;
            tagOptionDestinoEdit.value = d.idDestino;
            //Agencia
            let tagOptionAgenciaEdit = document.querySelector("#agenciaOptionEdit");
            tagOptionAgenciaEdit.textContent = d.nomeAgencia;
            tagOptionAgenciaEdit.value = d.idAgencia;

            let destinoOption = document.querySelectorAll(".optionDestino");
            let agenciaOption = document.querySelectorAll(".optionAgencia");

            destinoOption.forEach( option => {
              
              (d.idDestino == option.value) ? option.style.display = 'none' : option.style.display = 'block';

            });
            agenciaOption.forEach( option => {
              
              (d.idAgencia == option.value) ? option.style.display = 'none' : option.style.display = 'block';

            });
         });
        }catch(e) {
          console.log("ERRO: ",e);
        }
      }

      });

      //DELETAR
      var btnDelete = document.querySelectorAll(".btn-deletar");
      var idTerminalDelete = document.querySelector("#idInputDelete");

      btnDelete.forEach( btn => {

        btn.addEventListener('click', event => {

          var idDelete = btn.getAttribute("data-id");
          idTerminalDelete.value = idDelete;

        });

      });

        // ALTERAR ENTRE MENU ATIVO
        addActiveClass('terminais');
        
    });
</script>


@endsection
