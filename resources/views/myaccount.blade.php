@extends("layouts.app2")

@section("titulo","Escolha de poltrona")

@section("conteudo2")
  
<div class="container-myaccount">

    <div class="side-menu-myaccount shadow">
        <a href="{{ route('my_account') }}" class="active"><i class="fa fa-user"></i>  Meu Perfil</a>
        {{-- <a href="{{ route('my_passagens') }}"><i class="fa fa-ticket"></i>  Minhas Passagens</a> --}}
        <a href="{{ route('my_passagens') }}"><i class="fa fa-ticket"></i>  Minhas Reservas</a>
        <a href="#" class="notificacao"><i class="fa fa-cog"></i>  Notificações</a>
        <a href="{{ route('alt_senha') }}"><i class="fa fa-lock"></i>  Alterar Senha</a>
    </div>

    <div class="side-main-myaccount">
        <h4>Minha Conta</h4>
        <header class="shadow">
            <div class="area-client">
                <div class="avatar">
                    <i class="fa fa-user"></i>
                </div>
                <div class="info-client">
                    <span class="name">{{ $client->nome }}</span>
                    <span>{{ $client->email }}</span>
                </div>
            </div>
            <a href="{{ route('edit_profile') }}" class="button-edit-profile">
                Editar meu perfil
            </a>
        </header>
    </div>

</div>

@endsection