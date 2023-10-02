@extends('layouts.app')

@section('conteudo')

<div class="container-principal-cad">


     <div class="mb_70 mb-5">
             <h3>Cadastre-se e viage por todo lugar</h3>
     </div>

<div class="container section-cadastro">
    <div class="alert alert-success alert-dismissible fade show" role="alert" id="cliente-cadastrado"  style="display: none; border-radius: 0px;">
    <strong>Cadastro realizado!</strong> Faça login <a href="{{ route('login') }}" style="text-decoration: underline;">aqui</a>.
    </div>
    <div class="alert alert-danger alert-dismissible fade show" role="alert" id="cliente-nao-cadastrado"  style="display: none; border-radius: 0px;">
        <strong>Cadastro não realizado!</strong> Tente novamente.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
    </div>
    
 <form method="post" action="" id="formCadClient" class="form-contact contact_form" novalidate="novalidate">
  @csrf
   <div class="row">

    <div class="col-12 col-lg-6 form-group">
        <input type="text" class="form-control valid" name="nome" id="nome" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Seu  Nome'" placeholder="Seu Nome">
    </div>

    <div class="col-12 col-lg-6 form-group">
        <input type="email" class="form-control valid" name="email" id="email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Seu email'" placeholder="Seu email">
    </div>
  </div>

  <div class="form-group">
    <input type="tel" class="form-control valid" name="telefone" id="telefone" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Número de telefone'" placeholder="Número de telefone">
  </div>

  <div class="form-group">
    <input type="password" class="form-control valid" name="senha1" id=senha1 onfocus="this.placeholder = ''" onblur="this.placeholder = 'Senha'" placeholder="Senha">
  </div>

  <div class="form-group">
    <input type="password" class="form-control valid" name="senha2" id="senha2" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Senha novamente'" placeholder="Senha novamente">
  </div>
    <div class="form-group">
        <button type="submit" class="button button-contactForm boxed-btn max-width" id="btnCadastroClient" style="width: 100%;">Cadastrar</button>
    </div>
    <p style="text-align: center; margin: -10px 0px 10px;">------------------------------- Ou -------------------------------</p>
    <p style="text-align: center;">Já possui uma conta? <a href="{{ route('login') }}" style="color: #fd4951">Faça login!</a></p>

</form>
</div>

</div>

@endsection
