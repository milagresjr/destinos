@extends('layouts.app')

@section('conteudo')

<!-- slider_area_start -->
<div class="slider_area">

    <div class="bg-title">

            <!-- Texto no background -->

            <h2 class="texto-desc-title">Agência {{ $agencia->nome }}</h2>
            <p class="texto-desc-subtitle">Conheça a agência de viagem {{ $agencia->nome }} </p>

            <!-- Texto no background -->

            {{-- FORM PESQUISA --}}
            @include('layouts.includes.form-pesquisa')
            {{-- FIM FORM-PESQUISA --}}

    </div>

</div>

<div class="container mb-5 container-main">

    <div class="most_wanted_area">
        <div class="container">

            {{-- ROTAS DA AGENCIA --}}
                <div class="section-rota">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="section_title text-center mb_20">
                                <h3>Principais Rotas</h3>
                            </div>
                        </div>
                    </div>
                    <div class="list-group list-group-flush">
                    @if(isset($infoRotas))
                        @foreach($infoRotas as $r)
                        <a href="{{ route('passagem',[$r->idPartida,$r->idDestino]) }}" class="list-group-item list-group-item-action">
                            <span>{{ $r->local_partida }}</span> 
                            <i class="fa fa-arrow-right"></i> 
                            <span>{{ $r->local_destino }}</span>
                        </a>
                        @endforeach
                    @endif
                    </div>
                </div>
            {{-- FIM ROTA DA AGENCIA --}}

        {{-- SOBRE DA AGENCIA --}}
            <div class="section-sobre">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="section_title text-center mb_20">
                            <h3>Sobre</h3>
                        </div>
                    </div>
                </div>
                @if(isset($agencia))
                    <div class="paragrafo">
                        <p>
                            {{ $agencia->descricao }}
                        </p>
                    </div>
                @endif
            </div>
        {{-- FIM SOBRE DA AGENCIA --}}

        {{-- TERMINAIS DA AGENCIA --}}
        <div class="section-terminais">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section_title text-center mb_20">
                        <h3>Terminais</h3>
                    </div>
                </div>
            </div>
            <div class="">
                <table class="table table-striped">
                    <tr>
                        <th>Terminal</th>
                        <th>Cidade</th>
                    </tr>
                    @if(isset($terminais))
                        @foreach($terminais as $t)
                            <tr>
                                <td>{{ $t->nomeTerminal }}</td>
                                <td>{{ $t->nomeCidade }}</td>
                            </tr>
                        @endforeach
                    @endif
                </table>
            </div>
        </div>
        {{-- FIM TERMINAIS DA AGENCIA --}}

        {{-- COMO COMPRAR NA AGENCIA --}}
        <div class="section-como-comprar">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section_title text-center mb_20">
                        <h3>Como comprar passagens da agência {{ $agencia->nome }}</h3>
                    </div>
                </div>
            </div>
            <div class="">
                <p>Para comprar uma passagem da agência {{ $agencia->nome }} siga os seguintes passos.</p>
                <ol>
                    <li>Acesse o site destino.ao</li>
                    <li>Selecione a data da sua viagem e a rota desejada.</li>
                    <li>Clique em Buscar.</li>
                    <li>Para visualizar apenas resultados de passagens da agência {{ $agencia->nome }},
                    vai até filtrar resultados e escolha a agência {{ $agencia->nome }}.</li>
                    <li>Escolha a opção com o melhor horário a sua escolha.</li>
                    <li>Selecione as poltrona(s) desejada(s).</li>
                    <li>Preencha os dados do(s) passageiro(s).</li>
                    <li>Complete as informações sobre o comprador, forma de pagamento e finalize a compra.</li>
                </ol>
            </div>
        </div>
        {{-- FIM COMO COMPRAR NA AGENCIA --}}

        {{-- CONTACTOS NA AGENCIA --}}
        <div class="section-contactos">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section_title text-center mb_20">
                        <h3>Contactos e Horários</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="card col-12 col-md-4 m-3" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Endereço</h5>
                        <p class="card-text">{{ $agencia->endereco }}</p>
                    </div>
                </div>
                <div class="card col-12 col-md-4 m-3" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Telefone</h5>
                        <p class="card-text">{{ $agencia->telefone }}</p>
                    </div>
                </div>
                <div class="card col-12 col-md-4 m-3" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Email</h5>
                        <p class="card-text">{{ $agencia->email }}</p>
                    </div>
                </div>
            </div>
        </div>
    {{-- FIM CONTACTOS NA AGENCIA --}}

    {{-- OUTRAS AGENCIA --}}
    <div class="section-outras-agencias">
        <div class="row">
            <div class="col-lg-6">
                <div class="section_title text-center mb_20">
                    <h3>Outras agências</h3>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($outrasAgencias as $a)
            <div class="col">
                <a href="#">
                    <img src="{{ asset('storage/agencias/'.$a->logo) }}" alt="Logo de {{ $a->nome }}">
                </a>
            </div>
            @endforeach
        </div>
    </div>
{{-- FIM OUTRAS AGENCIA --}}
    </div>
    </div>

</div>

@endsection

