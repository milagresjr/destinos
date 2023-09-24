@extends("layouts.app2")

@section("titulo","Escolha de poltrona")

@section("conteudo2")
  
<div class="container-myaccount">

    <div class="side-menu-myaccount shadow">
        <a href="{{ route('my_account') }}"><i class="fa fa-user"></i>  Meu Perfil</a>
        <a href="{{ route('my_passagens') }}"><i class="fa fa-ticket"></i>  Minhas Passagens</a>
        <a href="#"><i class="fa fa-cog"></i>  Notificações</a>
        <a href="{{ route('alt_senha') }}" class="active"><i class="fa fa-lock"></i>  Alterar Senha</a>
    </div>

    <div class="side-main-myaccount">
        <h4>Alterar senha</h4>
        <div class="edit-area shadow">
            <form action="#">
                <div class="form-group">
                    <label for="nome">Senha actual*</label>
                    <input type="password" name="nome" id="nome" class="form-control">
                </div>
                <div class="form-group mt-3">
                    <label for="email">Senha nova*</label>
                    <input type="password" name="email" id="email" class="form-control" readonly>
                </div>
                <div class="form-group mt-3">
                    <label for="telefone">Repita senha nova*</label>
                    <input type="password" name="telefone" id="telefone" class="form-control">
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