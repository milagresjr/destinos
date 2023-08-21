@extends('layouts.app')

@section('conteudo')

<div class="container-principal-login">

  <div class="section_title text-center mb_70">
         <h3>Minha Conta</h3>
   </div>
   
  <div class="container section-login mt-5 mb-5">

      <div class="alert alert-danger alert-dismissible fade show" role="alert" id="acesso-negado"  style="display: none;">
          <strong>Acesso Negado</strong> Tente novamente.
          <button type="button" id="btnFecharAlert" class="btFecharAlert">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

      <form method="post" action="" id="formLogin" class=form-contact contact_form" novalidate="novalidate">
        @csrf
        <div class="form-group">
          <input type="text" class="form-control valid" name="email_tel" id="email_tel" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email ou Número de telefone'" placeholder="Email ou Número de telefone">
        </div>

        <div class="form-group">
          <input type="password" class="form-control valid" name="senha" id=senha onfocus="this.placeholder = ''" onblur="this.placeholder = 'Senha'" placeholder="Senha">
        </div>
          <div class="form-group">
              <button type="submit" class="button button-contactForm boxed-btn max-width" id="btnLogar" style="width: 100%;">Entrar</button>
          </div>
          <p style="text-align: center; margin: -10px 0px 10px;">------------------------------- Ou -------------------------------</p>
          <p style="text-align: center;">Não possui uma conta? <a href="{{ route('cadastrar') }}" style="color: #fd4951">Crie uma agora mesmo!</a></p>

      </form>

  </div>
  
</div>
@endsection
