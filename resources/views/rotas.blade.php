@extends('layouts.app')

@section('conteudo')

<!-- slider_area_start -->
<div class="slider_area">

    <div class="bg-title">

            <!-- Texto no background -->

            <h2 class="texto-desc-title">Rotas</h2>
            <p class="texto-desc-subtitle">Conheça as principais rotas de passagens</p>

            <!-- Texto no background -->

            {{-- FORM PESQUISA --}}
            @include('layouts.includes.form-pesquisa')
            {{-- FIM FORM-PESQUISA --}}

    </div>

</div>

<div class="container mb-5 container-main">


    <div class="most_wanted_area">
        <div class="container">

            @if(session('sessionSemViagem'))
                {{-- <div class="alert alert-danger">
                    {{ session('sessionSemViagem') }}
                </div> --}}
                <script>
                    swal('oops!','De momento estamos sem viagem para esta rota','error');
                </script>
            @endif

            {{-- ROTAS DA AGENCIA --}}
                <div class="section-rota">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="section_title text-center mb_20">
                                <h3>Principais Rotas da Destino.ao</h3>
                            </div>
                        </div>
                    </div>
                    <div class="list-group list-group-flush">
                    @if(isset($rotas))
                        @foreach($rotas as $rota)
                            <a href="{{ route('passagem',[$rota->idPartida,$rota->idDestino]) }}" class="list-group-item list-group-item-action">
                                <span>{{ $rota->local_partida }}</span> 
                                <i class="fa fa-arrow-right"></i> 
                                <span>{{ $rota->local_destino }}</span>
                            </a>
                        @endforeach
                    @endif
                    </div>
                </div>
            {{-- FIM ROTA DA AGENCIA --}}

    </div>
    </div>

</div>

@endsection

