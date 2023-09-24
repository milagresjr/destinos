@extends("layouts.app2")

@section("titulo","Escolha de poltrona")

@section("conteudo2")
  
<div class="container-myaccount">

    <div class="side-menu-myaccount shadow">
        <a href="{{ route('my_account') }}" class="active"><i class="fa fa-user"></i>  Meu Perfil</a>
        <a href="{{ route('my_passagens') }}"><i class="fa fa-ticket"></i>  Minhas Passagens</a>
        <a href="#"><i class="fa fa-cog"></i>  Notificações</a>
        <a href="{{ route('alt_senha') }}"><i class="fa fa-lock"></i>  Alterar Senha</a>
    </div>

    <div class="side-main-myaccount">
        <h4>Editar perfil</h4>
        <div class="edit-area shadow">
            <form action="#">
                <div class="form-group">
                    <label for="nome">Name*</label>
                    <input type="text" name="nome" id="nome" value="{{ $client[0]->nome }}" class="form-control">
                </div>
                <div class="form-group mt-3">
                    <label for="email">Email*</label>
                    <input type="email" name="email" id="email" value="{{ $client[0]->email }}" class="form-control" readonly>
                </div>
                <div class="form-group mt-3">
                    <label for="telefone">Telefone*</label>
                    <input type="tel" name="telefone" id="telefone" value="{{ $client[0]->telefone }}" class="form-control">
                </div>
                <button type="submit" value="Salvar" class="btn btn-success btn-salvar-perfil mt-3">
                    <i class="fa fa-spinner" aria-hidden="true"></i>
                    Salvar
                </button>
            </form>
        </div>
    </div>

</div>

@endsection