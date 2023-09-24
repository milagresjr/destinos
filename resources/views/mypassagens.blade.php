@extends("layouts.app2")

@section("titulo","Escolha de poltrona")

@section("conteudo2")
  
<div class="container-mypassagens">

    <div class="side-menu-mypassagens shadow">
        <a href="{{ route('my_account') }}"><i class="fa fa-user"></i>  Meu Perfil</a>
        <a href="{{ route('my_passagens') }}" class="active"><i class="fa fa-ticket"></i>  Minhas Passagens</a>
        <a href="#"><i class="fa fa-cog"></i>  Notificações</a>
        <a href="{{ route('alt_senha') }}"><i class="fa fa-lock"></i>  Alterar Senha</a>
    </div>

    <div class="side-main-mypassagens">
        <h4>Minhas Passagens</h4>
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
    </div>

</div>

@endsection