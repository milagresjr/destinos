<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Destino</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf_token"content={{ csrf_token() }} >
    <!-- <link rel="manifest" href="site.webmanifest"> -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}">
<link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/themify-icons.css') }}">
<link rel="stylesheet" href="{{ asset('css/nice-select.css') }}">
<link rel="stylesheet" href="{{ asset('css/flaticon.css') }}">
<link rel="stylesheet" href="{{ asset('css/gijgo.css') }}">
<link rel="stylesheet" href="{{ asset('css/animate.css') }}">
<link rel="stylesheet" href="{{ asset('css/slick.css') }}">
<link rel="stylesheet" href="{{ asset('css/slicknav.css') }}">
<link rel="stylesheet" href="{{ asset('js/jquery-ui-1.13.2/jquery-ui.css') }}">
<link rel="stylesheet" href="{{ asset('css/swiper-bundle.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/flick.css') }}">
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css">
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<link rel="stylesheet" href="{{ asset('css/custom.css') }}">
<link rel="stylesheet" href="{{ asset('css/search.css') }}">
<link rel="stylesheet" href="{{ asset('css/about.css') }}">
<link rel="stylesheet" href="{{ asset('css/agencia.css') }}">
<link rel="stylesheet" href="{{ asset('css/bilhete.css') }}">
    <!-- <link rel="stylesheet" href="css/responsive.css"> -->
</head>

<body id="body">

    <!-- NAVBAR -->

    <nav class="navbar navbar-light bg-light fixed-top">
        <div class="container-fluid">
            <div class="div-navbar">
                <a style="text-decoration: none; border: none; cursor: pointer;" class="navbar-toggler" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                  <!--  <span class="navbar-toggler-icon"></span> -->
                  <i class="fa fa-bars"></i>
                </a>
                
                <a class="navbar-brand logo" href="{{ route('home') }}">
                  Destino.ao
                 <!-- <img src="//asset('img/logo2.png') }}" alt="Logotipo destinos" style="width: 150px;"> -->
                </a>

            </div>  
            @if(\Auth::guard('client')->user())
            <div class="d-none d-sm-block">
              <div class="row">
                  <div class="col-2 icon-user">
                    <i class="fa fa-user-circle"></i>
                  </div>
                  <div class="col-10 info-client">
                    <a href="#">Olá, <span>{{ \Auth::guard('client')->user()->nome }}</span></a>
                 <div class="dropdown">
                  <a class="dropdown-toggle" href="#dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">Minha conta</a>
                      <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="#">Perfil</a></li>
                        <li><a class="dropdown-item" href="#">Meus bilhetes</a></li>
                        <li><a class="dropdown-item" href="{{ route('logout') }}">Sair</a></li>
                      </ul>
                    </div>
                  </div>
              </div>
            </div>
            @else
            <a class="navbar-brand d-none d-sm-block login-link" href="{{ route('login') }}"> <i class="fa fa-user-circle"></i> Faça seu login</a>
            @endif
          

          <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
              
                <div class="info-user">
                  <div class="div-icon-user">
                      <i class="fa fa-user-circle"></i>
                  </div>
                  <div class="side-right">
                      @if(\Auth::guard('client')->user())
                      <h5 class="" id="offcanvasNavbarLabel">Ola, {{ \Auth::guard('client')->user()->nome }}</h5>
                      {{-- <span style="">{{ \Auth::guard('client')->user()->email }}</span> --}}
                      @else
                      <h5 class="" id="offcanvasNavbarLabel">Olá, Faça seu login</h5>
                      @endif
                </div>
          </div>
          <!--
              <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            -->
          </div>
            <div class="offcanvas-body">
              <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                <li class="nav-item">
                  <a class="nav-link"  href="{{ route('home') }}"> <i class="fa fa-home icon"></i> Passagem de ônibus</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" aria-current="page" href="{{ route('atendimento') }}"> <i class="fa fa-question-circle icon"></i> Atendimento</a>
                </li>
                @if(\Auth::guard('client')->user())
                  <li class="nav-item">
                    <a class="nav-link" href="#"> <i class="fa fa-user-circle icon"></i> Minha Conta</a>
                  </li>
                @endif
                {{-- <li class="nav-item">
                  <a class="nav-link" href="#"> <i class="fa fa-tags icon"></i> Promoções</a>
                </li> --}}
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('agencias') }}"> <i class="fa fa-bus icon"></i> Agências de viagem</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('rotas') }}"> <i class="fa fa-map icon"></i> Rotas</a>
                </li>
                @if(!\Auth::guard('client')->user())
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}"> <i class="fa fa-user icon"></i> Login</a>
                  </li>
                @endif
              </ul>
            </div>
          </div>
        </div>
      </nav>
      

    <!-- FIM DO NAVBAR -->

