@extends('layouts.app')

@section('conteudo')

<!-- slider_area_start -->
<div class="slider_area">

    <div class="bg-title">

            <!-- Texto no background -->

            <h2 class="texto-desc-title">Agências</h2>
            <p class="texto-desc-subtitle">Conheça as companhias de viagens que são nossas parceiras </p>

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
                        <h3>Agências de viagem</h3>
                    </div>
                </div>
            </div>
            <div class="row agencias">
                @if(isset($agencias))
                    @foreach($agencias as $a)
                    <div class="card col-12 col-md-4 m-2 shadow" style="width: 18rem;">
                        <div class="card-body card-agencias">
                          <img src="{{ asset('storage/agencias/'.$a->logo) }}" style="height: 60px; width: 100px;" class="" alt="Imagem de {{ $a->nome }}">
                          <h5 class="card-title">{{ $a->nome }}</h5>
                          {{-- <p class="card-text">{{ $a->descricao }}.</p> --}}
                          <a href="{{ route('agencia.param',$a->id) }}" class="boxed-btn4">Ver agência</a>
                        </div>
                      </div>
                    @endforeach
                @endif
            </div>
    </div>
    </div>

</div>

@endsection

