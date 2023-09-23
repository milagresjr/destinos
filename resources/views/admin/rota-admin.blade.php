@extends("layouts.app-admin")

@section("conteudo-admin")

@section("titulo-page", "Pagina de Rotas")
@section("breadcrumb1", "Home")
@section("breadcrumb2", "Rotas")

        <!-- Your Page Content Here -->   
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Rotas</h3>
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
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalNovaRota">
            <i class="fa fa-plus"></i> Novo
          </button>

      <table id="tabelaReserv" class="table table-striped table-bordered table-hover">

       
        <thead>
          <tr role="row">
            <th>ID</th>
            <th>ROTA</th>
            <th>AGÊNCIA</th>
          </tr>
        </thead>

        @foreach($rotas as $r)

        <tbody>
          <tr role="row" class="odd">
            <td>{{ $r->id }}</td>
            <td>{{ $r->provi_partida }} => {{ $r->provi_destino }}</td>
            <td>{{ $r->nomeAgencia }}</td>
            <td>
              <button class="btn btn-success btn-editar" data-id="{{ $r->id }}" data-toggle="modal" data-target="#modalEditarRota" style="margin-right: 10px;">
                <i class="fa fa-pencil"></i> Editar
              </button>
              <button class="btn btn-danger btn-deletar" data-id="{{ $r->id }}" data-toggle="modal" data-target="#modalDeleteRota">
                <i class="fa fa-trash"></i> Excluir
              </button>
            </td>
          </tr>
        </tbody>

        @endforeach

      </table>
    </div>
      </div>


  <!-- MODAL  NOVA ROTA-->
  <!-- Modal -->
  <div class="modal fade" id="modalNovaRota" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Cadastrar Rota</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="POST" action="{{ route('admin.rota.store') }}">
          @csrf
          <div class="modal-body">
              <div class="form-group">
                <label for="partindoSelect">Partindo de</label>
                <select class="form-control" id="partindoSelect" name="partindoDe">
                @if($destinos)
                  @foreach($destinos as $d)
                  <option value="{{ $d->id }}">{{ $d->nome }}</option>
                  @endforeach
                @endif
                </select>
              </div>
              <div class="form-group">
                <label for="indoSelect">Indo para</label>
                <select class="form-control" id="indoSelect" name="indoPara">
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

 <!-- MODAL  EDITAR ROTA-->
  <!-- Modal -->
  <div class="modal fade" id="modalEditarRota" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Editar Rota</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="POST" action="{{ route('admin.rota.update',0) }}" id="formEdit">
          @csrf
          @method('PUT') 
          {{-- <!-- ou @method('PATCH') --> --}}

          <div class="modal-body">
              <div class="form-group">
                <label for="partindoSelect">Partindo de</label>
                <select class="form-control" id="partindoSelectEdit" name="partindoDe">
                  <option id="optionPartindoEdit"></option>
                @if($destinos)
                  @foreach($destinos as $d)
                    <option value="{{ $d->id }}" class="partindoOption">{{ $d->nome }}</option>
                  @endforeach
                @endif
                </select>
              </div>
              <div class="form-group">
                <label for="indoSelect">Indo para</label>
                <select class="form-control" id="indoSelectEdit" name="indoPara">
                  <option id="optionIndoEdit"></option>
                  @if($destinos)
                  @foreach($destinos as $d)
                  <option value="{{ $d->id }}" class="indoOption">{{ $d->nome }}</option>
                  @endforeach
                @endif
                </select>
              </div>
              <div class="form-group">
                <label for="agenciaSelect">Agência</label>
                <select class="form-control" id="agenciaSelectEdit" name="agencia">
                  <option id="optionAgenciaEdit"></option>
                  @if($agencias)
                    @foreach($agencias as $a)
                      <option value="{{ $a->id }}" class="agenciaOption">{{ $a->nome }}</option>
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
<!-- FIM DO MODAL -->


 <!-- MODAL  DELETAR ROTA-->
  <!-- Modal -->
  <div class="modal fade" id="modalDeleteRota" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="POST" action="{{ route('admin.rota.destroy',0) }}">
          @csrf
          @method('DELETE')
          <div class="modal-body">
             <h2 style="text-align: center;">Tem certeza que deseja eliminar esta rota ?</h2>
             <input type="hidden" name="id" id="idInputDelete">
          <div class="modal-footer">
            <button class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary">Sim</button>
          </div>
      </form>
      </div>
    </div>
  </div>




<script>
    document.addEventListener("DOMContentLoaded", () => {
      
      //ALTERAR
      var btnEditar = document.querySelectorAll(".btn-editar");
      //Dados do form
      var partindo = document.querySelector("#partindoSelectEdit");
      var indo = document.querySelector("#indoSelecttEdit");
      var idRota = document.querySelector("#idSelectEdit");

      btnEditar.forEach((btn) => {

      btn.addEventListener('click', (event) => {

        var id = btn.getAttribute("data-id");
        fetchPartindo(id);

      });

      const fetchPartindo = async (id) => {
        try {
          const response = await fetch('/admin/routes/'+id+'/edit');
          const data = await response.json();
            
            // console.log(data);
          data.map( d => {

            idRota.value = id;

            //Partindo
            let tagOptionPartindoEdit = document.querySelector("#optionPartindoEdit");
            tagOptionPartindoEdit.textContent = d.provi_partida;
            tagOptionPartindoEdit.value = d.idLocalPartida;

            //Indo
            let tagOptionIndoEdit = document.querySelector("#optionIndoEdit");
            tagOptionIndoEdit.textContent = d.provi_destino;
            tagOptionIndoEdit.value = d.idLocalDestino;

            //Agencia
            let tagOptionAgenciaEdit = document.querySelector("#optionAgenciaEdit");
            tagOptionAgenciaEdit.textContent = d.nomeAgencia;
            tagOptionAgenciaEdit.value = d.idAgencia;

            let partindoOption = document.querySelectorAll(".partindoOption");
            let indoOption = document.querySelectorAll(".indoOption");
            let agenciaOption = document.querySelectorAll(".agenciaOption");

            partindoOption.forEach( option => {
              
              (d.idLocalPartida == option.value) ? option.style.display = 'none' : option.style.display = 'block';

            });
            indoOption.forEach( option => {
              
              (d.idLocalDestino == option.value) ? option.style.display = 'none' : option.style.display = 'block';

            });
            agenciaOption.forEach( option => {
              
              (d.idAgencia == option.value) ? option.style.display = 'none' : option.style.display = 'block';

            });
            // partindo.appendChild(tagOptionEdit);
         });

          // indo.appendChild = `<option>${data.provi_destino}</option>`;
        }catch(e) {
          console.log("ERRO: ",e);
        }
      }

      });

      //DELETAR
      var btnDelete = document.querySelectorAll(".btn-deletar");
      var idDestinoDelete = document.querySelector("#idInputDelete");

      btnDelete.forEach( btn => {

        btn.addEventListener('click', event => {

          var idDelete = btn.getAttribute("data-id");
          idDestinoDelete.value = idDelete;

        });

      });

       // ALTERAR ENTRE MENU ATIVO
       addActiveClass('rotas');

    });
</script>


@endsection
