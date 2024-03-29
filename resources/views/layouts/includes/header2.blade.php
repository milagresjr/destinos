<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('titulo')</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('css/escolhaPoltrona.css') }}">
    <link rel="stylesheet" href="{{ asset('css/header2.css') }}">
    <link rel="stylesheet" href="{{ asset('css/checkout.css') }}">
    <link rel="stylesheet" href="{{ asset('css/myaccount.css') }}">
    <link rel="stylesheet" href="{{ asset('css/mypassagens.css') }}">
    <link rel="stylesheet" href="{{ asset('css/edit-perfil.css') }}"> 
    <link rel="stylesheet" href="{{ asset('css/finish-buy.css') }}"> 
</head>
<body style="background-color: #F0F1F5;">
    

<div class="header">
    <h2 class="logo"> <a href="{{ route('home') }}"> Destino.ao</a></h2>
    <a href="#" class="login">
      <i class="fa fa-user-circle"></i>
      <span>{{ \Auth::guard('client')->user()->nome }}</span>
    </a>
</div>