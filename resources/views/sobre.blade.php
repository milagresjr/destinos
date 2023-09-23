@extends('layouts.app')

@section('conteudo')

<!-- slider_area_start -->
<div class="slider_area">

    <div class="bg-title">

            <!-- Texto no background -->

            <h2 class="texto-desc-title">Quem somos?</h2>
            <p class="texto-desc-subtitle">Conheça a nossa empresa</p>

            <!-- Texto no background -->

            {{-- FORM PESQUISA --}}
            @include('layouts.includes.form-pesquisa')
            {{-- FIM FORM-PESQUISA --}}

    </div>

</div>

<div class="container mb-5">

    <div class="most_wanted_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section_title text-center mb_20">
                        <h3>Sobre nós</h3>
                    </div>
                </div>
            </div>
            <div class="about-text">
                <p>
                    A <strong>Destinos.ao</strong> é a maior e primeira plataforma de vendas de bilhetes digitais de passagens 
rodoviárias de Angola.
                </p>
                <p>
                    Levamos às empresas de transportes ao mundo tecnológico com a mesma velocidade que o 
mundo chega até nós.
                </p>
                <p>
                    Proporcionamos aos nossos clientes e parceiros a melhor experiência para as suas viagens, 
sejam com soluçoes que facilitam o dia a dia das empresas de transporte, ou com a facilidade 
de adquirir uma passagem de qualquer ponto do país pelo site ou aplicativo da <strong>Destinos.ao</strong>.
                </p>
                <p>
                    Fundada em 2023 pelos admnistradores e engenheiros: Salomão Albino, Gelsom Luís, Milagres
Júnior e Filipe Mundombe. A sede da <strong>Destinos.ao</strong>, está localizada em Luanda-Ingombotas.

                </p>
            </div>
    </div>
    </div>

</div>

@endsection

