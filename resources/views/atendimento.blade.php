@extends('layouts.app')

@section('conteudo')

<!-- slider_area_start -->
<div class="slider_area">

    <div class="bg-title">

            <!-- Texto no background -->

            <h2 class="texto-desc-title">Central de Atendimento</h2>
            <p class="texto-desc-subtitle">Tire as suas duvidas e entre em contacto connosco</p>

            <!-- Texto no background -->

            {{-- FORM PESQUISA --}}
            @include('layouts.includes.form-pesquisa')
            {{-- FIM FORM-PESQUISA --}}

    </div>

</div>
<!-- slider_area_end -->
<div class="container mb-5">

<!--
    <div class="row justify-content-center">
        <div class="col-lg-3 col-12 mb-3">
            <div class="card text-center" style="width: 17rem;">
                <div class="card-body">
                  <h5 class="card-title">Special title treatment</h5>
                  <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                  <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-12 mb-3">
            <div class="card text-center" style="width: 18rem;">
                <div class="card-body">
                  <h5 class="card-title">Special title treatment</h5>
                  <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                  <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
      </div>
        </div>
        <div class="col-lg-3 col-12 mb-3">
            <div class="card text-center" style="width: 17rem;">
                <div class="card-body">
                <h5 class="card-title">Special title treatment</h5>
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-12 mb-3">
            <div class="card text-center" style="width: 17rem;">
                <div class="card-body">
                <h5 class="card-title">Special title treatment</h5>
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
    </div>
-->
    <div class="most_wanted_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section_title text-center mb_20">
                        <h3>Duvidas mais procuradas</h3>
                    <!--    <p>Mais de 5 mil destinos pra escolheres sem saires de sua casa</p> -->
                    </div>
                </div>
            </div>
            <div class="accordion accordion-flush" id="accordionFlushExample">
                <div class="accordion-item">
                  <h2 class="accordion-header" id="flush-headingOne">
                    <button class="accordion-button shadow collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                        Como comprar passagem de autocarro na plataforma?
                    </button>
                  </h2>
                  <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        Para comprar a sua passagem de autocarro com a Destino.ao você deve acessar o site.
                        É necessário preencher a origem e o destino da sua viagem no campo de pesquisa e em seguida clicar
                        em buscar. Você também pode selecionar a data de ida. É importante fazer a sua reserva com
                        antecedência pra evitar certos transtornos.
                    </div>
                  </div>
                </div>
                <div class="accordion-item">
                  <h2 class="accordion-header" id="flush-headingTwo">
                    <button class="accordion-button shadow collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                        Com quantos anos pode viajar sozinho?
                    </button>
                  </h2>
                  <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        Apartir dos 16 anos de idade podem viajar de autocarro sozinhos sem autorização dos pais ou responsáveis.
                    </div>
                  </div>
                </div>
                <div class="accordion-item">
                  <h2 class="accordion-header" id="flush-headingThree">
                    <button class="accordion-button shadow collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                        Pode viajar com animal?
                    </button>
                  </h2>
                  <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        Você pode embarcar com seu cão ou gato nas viagens, porém, é necessário atender as regras da companhia de viagens.
                        Para tanto o animal deve ser dde pequeno ou médio porte e não comprometer a segurança dos passageiros e da viagem.
                    </div>
                  </div>
                </div>
            </div>
    </div>
    </div>

</div>

@endsection

