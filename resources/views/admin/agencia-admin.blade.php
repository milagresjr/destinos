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
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalNovaAgencia">
          <i class="fa fa-plus"></i> Novo
        </button>
      <table style="overflow: scroll;" id="tabela" class="table table-striped table-bordered table-hover">


        <thead>
          <tr role="row">
            <th>ID</th>
            <th>NOME</th>
            <th>ENDEREÇO</th>
            <th>EMAIL</th>
            <th>TELEFONE</th>
            <th>DESCRIÇÃO</th>
            <th>IMAGEM</th>
            <th></th>
          </tr>
        </thead>

        @foreach($agencias as $a)

        <tbody>
          <tr role="row" class="odd">
            <td style="vertical-align: middle" >{{ $a->id }}</tdclass=>
            <td style="vertical-align: middle" >{{ $a->nome }}</td>
            <td style="vertical-align: middle" >{{ $a->endereco }}</td>
            <td style="vertical-align: middle" >{{ $a->email }}</td>
            <td style="vertical-align: middle" >{{ $a->telefone }}</td>
            <td class="column-descricao" style="vertical-align: middle" >{{ $a->descricao }}</td>
            <td style="vertical-align: middle" ><img src="{{ asset('storage/agencias/' . $a->logo) }}" alt="Logotipo da {{ $a->nome }}" style="width: 80px; height: 30px; border-radius: 5px;" /></td>
            <td style="vertical-align: middle" >
              <button class="btn btn-success btn-editar" data-id="{{ $a->id }}" data-toggle="modal" data-target="#modalEditarAgencia" style="margin-right: 10px;">
                <i class="fa fa-pencil"></i> Editar
              </button>
              <button class="btn btn-danger btn-deletar" data-id="{{ $a->id }}" data-toggle="modal" data-target="#modalDeleteAgencia">
                <i class="fa fa-trash"></i> Excluir
              </button>
            </td>
          </tr>
        </tbody>

        @endforeach

      </table>
    </div>
   </div>

   <!-- MODAL  NOVO AGENCIA-->
  <!-- Modal -->
  <div class="modal fade" id="modalNovaAgencia" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Cadastrar Agencia de Viagem</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="POST" action="{{ route('admin.agencia.store') }}" enctype="multipart/form-data">
          @csrf
          <div class="modal-body">
              <div class="form-group">
                <label for="nomeInput">Nome</label>
                <input type="text" class="form-control" placeholder="Digite o nome" id="nomeInput" name="nome">
              </div>
              <div class="form-group">
                <label for="descricaoInput">Endereço</label>
                <input type="text" class="form-control" placeholder="Digite um endereço" id="descricaoInput" name="endereco">
              </div>
              <div class="row">
                <div class="form-group col-md-6">
                    <label for="descricaoInput">Email</label>
                    <input type="text" class="form-control" placeholder="Digite um email (opcional)" id="descricaoInput" name="email">
                </div>
                <div class="form-group col-md-6">
                    <label for="descricaoInput">Telefone</label>
                    <input type="text" class="form-control" placeholder="Digite um número de telefone" id="descricaoInput" name="telefone">
                </div>
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

 <!-- MODAL  EDITAR AGENCIA-->
  <!-- Modal -->
  <div class="modal fade" id="modalEditarAgencia" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Editar Agencia de Viagem</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="POST" action="{{ route('admin.agencia.update',0) }}" id="formEdit" enctype="multipart/form-data">
          @csrf
          @method('PUT') 
          {{-- <!-- ou @method('PATCH') --> --}}

          <div class="modal-body">
              <div class="form-group">
                <label for="nomeInputEdit">Nome</label>
                <input type="text" class="form-control" id="nomeInputEdit" name="nome">
              </div>
              <div class="form-group">
                <label for="enderecoInputEdit">Endereço</label>
                <input type="text" class="form-control" placeholder="Digite um endereço" id="enderecoInputEdit" name="endereco">
              </div>
              <div class="row">
                <div class="form-group col-md-6">
                    <label for="emailInputEdit">Email</label>
                    <input type="text" class="form-control" placeholder="Digite um email (opcional)" id="emailInputEdit" name="email">
                </div>
                <div class="form-group col-md-6">
                    <label for="telInputEdit">Telefone</label>
                    <input type="text" class="form-control" placeholder="Digite um número de telefone" id="telInputEdit" name="telefone">
                </div>
              </div>
              <div class="form-group">
                <label for="descricaoInputEdit">Descrição</label>
                <input type="text" class="form-control" id="descricaoInputEdit" name="descricao">
              </div>
              <div class="form-group">
                <label for="imagemInputEditOld">Imagem</label>
                <input type="file" class="form-control" id="imagemInputEditOld" name="imagem">
              </div>        
              <input type="hidden" name="id" id="idInputEdit">
              <input type="hidden" id="imagemInputEdit" name="imagem_2">
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


 <!-- MODAL  DELETAR AGENCIA-->
  <!-- Modal -->
  <div class="modal fade" id="modalDeleteAgencia" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="POST" action="{{ route('admin.agencia.destroy',0) }}">
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
      var endereco = document.querySelector("#enderecoInputEdit");
      var email = document.querySelector("#emailInputEdit");
      var telefone = document.querySelector("#telInputEdit");
      var descricao = document.querySelector("#descricaoInputEdit");
      var imagem = document.querySelector("#imagemInputEdit");
      var idAgencia = document.querySelector("#idInputEdit");

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
          const response = await fetch('/admin/agencys/'+id+'/edit');
          const data = await response.json();
          nome.value = data.nome;
          endereco.value = data.endereco;
          email.value = data.email;
          telefone.value = data.telefone;
          descricao.value = data.descricao;
          idAgencia.value = data.id;
          imagem.value = data.logo;
        }catch(e) {
          console.log("ERRO: ",e);
        }
      }

      });

      //DELETAR
      var btnDelete = document.querySelectorAll(".btn-deletar");
      var idAgenciaDelete = document.querySelector("#idInputDelete");

      btnDelete.forEach( btn => {

        btn.addEventListener('click', event => {

          var idDelete = btn.getAttribute("data-id");
          idAgenciaDelete.value = idDelete;

        });

      });

      // ALTERAR ENTRE MENU ATIVO
      addActiveClass('agencias');


    });
</script>

@endsection
