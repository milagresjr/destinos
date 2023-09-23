@extends("layouts.app-admin")

@section("conteudo-admin")

@section("titulo-page", "Pagina dos Destinos")
@section("breadcrumb1", "Home")
@section("breadcrumb2", "Destinos")

      <!-- Your Page Content Here -->   
      <div class="box">
        <div class="box-header">
          {{-- <h3 class="box-title">Destinos</h3> --}}
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
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalNovoDestino">
          <i class="fa fa-plus"></i> Novo
        </button>
      <table id="tabelaReserv" class="table table-striped table-bordered table-hover">


        <thead>
          <tr role="row">
            <th>ID</th>
            <th>NOME</th>
            <th>DESCRIÇÃO</th>
            <th>IMAGEM</th>
            <th>OPC</th>
          </tr>
        </thead>

        @foreach($destinos as $d)

        <tbody>
          <tr role="row" class="odd">
            <td>{{ $d->id }}</td>
            <td>{{ $d->nome }}</td>
            <td>{{ $d->descricao }}</td>
            <td><img src="{{ asset('storage/destinos/' . $d->foto) }}" alt="Imagem destino!" style="width: 50px; height: 50px; border-radius: 5px;" /></td>
            <td>
              <button class="btn btn-success btn-editar" data-id="{{ $d->id }}" data-toggle="modal" data-target="#modalEditarDestino" style="margin-right: 10px;">
                <i class="fa fa-pencil"></i> Editar
              </button>
              <button class="btn btn-danger btn-deletar" data-id="{{ $d->id }}" data-toggle="modal" data-target="#modalDeleteDestino">
                <i class="fa fa-trash"></i> Excluir
              </button>
            </td>
          </tr>
        </tbody>

        @endforeach

      </table>
    </div>
   </div>

   <!-- MODAL  NOVO DESTINO-->
  <!-- Modal -->
  <div class="modal fade" id="modalNovoDestino" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Cadastrar Destino</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="POST" action="{{ route('admin.destino.store') }}" enctype="multipart/form-data">
          @csrf
          <div class="modal-body">
              <div class="form-group">
                <label for="nomeInput">Nome</label>
                <input type="text" class="form-control" placeholder="Digite o nome" id="nomeInput" name="nome">
              </div>
              <div class="form-group">
                <label for="descricaoInput">Descrição</label>
                <input type="text" class="form-control" placeholder="Digite uma descrição" id="descricaoInput" name="descricao">
              </div>
              <div class="form-group">
                <label for="imagemInput">Imagem</label>
                <input type="file" class="form-control" id="imagemInput" name="imagem">
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

 <!-- MODAL  EDITAR DESTINO-->
  <!-- Modal -->
  <div class="modal fade" id="modalEditarDestino" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Editar Destino</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="POST" action="{{ route('admin.destino.update',0) }}" id="formEdit" enctype="multipart/form-data">
          @csrf
          @method('PUT') 
          {{-- <!-- ou @method('PATCH') --> --}}

          <div class="modal-body">
              <div class="form-group">
                <label for="nomeInputEdit">Nome</label>
                <input type="text" class="form-control" id="nomeInputEdit" name="nome">
              </div>
              <div class="form-group">
                <label for="descricaoInputEdit">Descrição</label>
                <input type="text" class="form-control" id="descricaoInputEdit" name="descricao">
              </div>
              <div class="form-group">
                <label for="imagemInput">Imagem</label>
                <input type="file" class="form-control" id="imagemInput" name="imagem">
              </div>        
              <input type="hidden" name="id" id="idInputEdit">
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


 <!-- MODAL  DELETAR DESTINO-->
  <!-- Modal -->
  <div class="modal fade" id="modalDeleteDestino" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="POST" action="{{ route('admin.destino.destroy',0) }}">
          @csrf
          @method('DELETE')
          <div class="modal-body">
             <h2 style="text-align: center;">Tem certeza que deseja eliminar ?</h2>
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
      var nome = document.querySelector("#nomeInputEdit");
      var descricao = document.querySelector("#descricaoInputEdit");
      var idDestino = document.querySelector("#idInputEdit");

      btnEditar.forEach((btn) => {

      btn.addEventListener('click', (event) => {

        var id = btn.getAttribute("data-id");

        // fetch('/admin/destinys/'+id+'/edit')
        // .then( response => response.json() )
        // .then( data => {
        //   console.log(data);
        //   nome.value = data.nome;
        //   descricao.value = data.descricao;
        // }).catch( error => {
        //   console.log("Erro no fetch: ", error);
        // });
        myFecth(id);
      });

      const myFecth = async (id) => {
        try {
          const response = await fetch('/admin/destinys/'+id+'/edit');
          const data = await response.json();
          nome.value = data.nome;
          descricao.value = data.descricao;
          idDestino.value = data.id;
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
       addActiveClass('destinos');

    });
</script>

@endsection
