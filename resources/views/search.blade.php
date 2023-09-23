<?php setlocale(LC_TIME, 'pt_BR.utf-8'); ?>
@extends("layouts.app")

@section('conteudo')
<div class="bg-gray" style="background-color: #f6f6f6; padding-bottom: 10px; padding-top:40px;">

    <!-- where_togo_area_start  -->
<div class="where_togo_area container mb-4 cont-pesquisa">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-3">
                <div class="form_area">
                    <h3 style="color: #000; text-align: center;">Ache sua passagem</h3>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="search_wrap">
                    <form class="search_form" action="{{ url('/search/passagem/') }}">
                        <div class="input_field">
                                <i class="fa fa-calendar-o icon-input"> </i>
                                <input id="datepicker" placeholder="Data de ida" name="data">
                            </div>
                            <div class="input_field" style="width: 50%; margin-inline: 8px;">
                                <input type="text" class="data-viagem" name="rota" placeholder="Selecione a sua rota" id="rota-autocomplete-search">
                            </div>
                            <div class="search_btn">
                                <button class="boxed-btn4 " type="submit" >
                                    <i class="fa fa-search"> </i>
                                    Buscar
                                </button>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>


@if(!$destinos)
<div class="section-not-found">
    <i class="fa fa-search"></i>
    <p>
        Resultado não encontrado para esta rota e data.
    </p>
</div>
@endif

<!-- where_togo_area_end  -->
    @if(isset($destinos))
    @foreach ($destinos as $d)
    <div class="container titulo-destino">
        <div class="row">
            
                <div class="col-5"><p>{{$d->provi_1}}</p></div>
                <div class="col-2"><p><i class="fa fa-arrow-right"></i></p></div>
                <div class="col-5"><p>{{$d->provi_2}}</p></div>
            
        </div>
    </div>
    @endforeach
    @endif

    
    <div class="d-none filtros">
        <!-- Button trigger modal -->
        <button class="btn btn-primary" type="button" data-bs-target="#modalFiltrar" data-bs-toggle="modal">
            Filtrar
        </button>
        
        <!-- Modal -->
        <div class="modal fade" id="modalFiltrar" tabindex="-2" aria-labelledby="modalFiltrarLabel" aria-hidden="false">
            <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="modalFiltrarLabel">Filtrar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('filtrar') }}" id="formFiltro" method="get">
                    <input type="hidden" name="partindo_de" id="partindo-de">
                    <input type="hidden" name="indo_para" id="indo-para">
                    <input type="hidden" name="data" id="data-viagem">
                    <input type="hidden" name="rota" id="rota-input">
                    <div class="modal-body">

                        <div class="accordion accordion-flush" id="accordionFlushExample">

                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingOne">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                        <strong>Horário de Partida</strong>
                                    </button>
                                </h2>
                                <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne"
                                    data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        <input type="range" min="2000" max="200000" step="500" value="1000,50000" name="filtro_horario" id="filtro-horario">
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                        <strong>Preço</strong>
                                    </button>
                                </h2>
                                <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo"
                                    data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        
                                        <div class="price-input">
                                            <div class="field">
                                                <span>Min</span>
                                                <input type="number" name="min_value" id="min-value" class="input-min" value="2000">
                                            </div>
                                            <div class="separator">-</div>
                                            <div class="field">
                                                <span>Max</span>
                                                <input type="number" name="max_value" id="max-value" class="input-max" value="15000">
                                            </div>
                                        </div>
                                        <div class="slider">
                                            <div class="progress"></div>
                                        </div>
                                        <div class="range-input">
                                            <input type="range" name="" id="" class="range-min" min="0" max="15000" value="2000" step="100">
                                            <input type="range" name="" id="" class="range-max" min="0" max="15000" value="15000" step="100">
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#flush-collapseThree" aria-expanded="false"
                                        aria-controls="flush-collapseThree">
                                        <strong>Companhia</strong>
                                    </button>
                                </h2>
                                <div id="flush-collapseThree" class="accordion-collapse collapse"
                                    aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        @foreach($agencias as $agencia)
                                        <input type="radio" class="" id="agencia-filtro{{ $agencia->id }}" name="agencia_filtro" value="{{ $agencia->id }}" id="">
                                        <label for="agencia-filtro{{ $agencia->id }}">{{ $agencia->nome }}</label>
                                        <br>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                    </div>
                    
                    </div>
                    <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" id="btnFiltrar">Filtrar</button>
                    </div>
                </form>
            </div>
            </div>
        </div>
    </div>
    
    @if(isset($viagem_info_pra_datas))
         @foreach($viagem_info_pra_datas as $v)
           @foreach($datas as $d)
                <div class="container">
                    <div class="main-carousel" data-flickity='{"prevNextButtons": false, "cellAlign": "center", "contain": true, "pageDots": false }'>
                        @if($v->data_partida == $d->data_partida)
                            <div class="carousel-cell data-viagens same-date">
                                    <span>
                                        @php
                                        switch (date('w',strtotime($d->data_partida))) {
                                            case 0:
                                            $dayOfWeek = 'Domingo';
                                            break;
                                            case 1:
                                            $dayOfWeek = 'Segunda';
                                            break;
                                            case 2:
                                            $dayOfWeek = 'Terça';
                                            break;
                                            case 3:
                                            $dayOfWeek = 'Quarta';
                                            break;
                                            case 4:
                                            $dayOfWeek = 'Quinta';
                                            break;
                                            case 5:
                                            $dayOfWeek = 'Sexta';
                                            break;                                   
                                            default:
                                            $dayOfWeek = 'Sábado';
                                            break;
                                            }   
                                            @endphp
                                            <!-- date('l',strtotime($d->data_partida)) -->
                                            {{ date('d/M',strtotime($d->data_partida)) }} <br> 
                                            {{ $dayOfWeek }}
                                    </span>
                            </div>
                        @else
                            <a class="carousel-cell data-viagens" href="/search/passagem/param/{{ $v->provi_partida }}/{{ $v->provi_destino }}/{{ $d->data_partida }}">
                                <span>
                                    <!-- date('l',strtotime($d->data_partida)) -->
                                    {{ date('d/M',strtotime($d->data_partida)) }} <br> 
                                    {{ $dayOfWeek }}
                                </span>
                            </a>
                       @endif
                    </div>
                </div>
            @endforeach
        @endforeach
    @endif

    @if(isset($viagem_info))
    @foreach($viagem_info as $v)
    
   <div style="position: relative;" id="div-url" data-url="{{ route('rota_especifica',$v->idViagem) }}" class="container cont-principal" style="background-color: #fff; cursor:pointer;">
   
    {{-- <div style="position: relative;" class="container cont-principal" id="div-url" data-url="{{ route('rota_especifica',$v->idViagem) }}?<?php echo "idViagem=$v->idViagem&preco=$v->preco_bilhete"; ?>" style="background-color: #fff; cursor:pointer;">    --}}
   
    
    <button class="btn btn-primary btn-info d-none d-lg-block" type="button" data-bs-toggle="collapse" data-bs-target="#collapseInfo{{$v->idViagem}}" aria-expanded="false" aria-controls="collapseInfo{{$v->idViagem}}">
        <i class="fa fa-info"> </i>
    </button>
    <button class="btn btn-primary btn-info d-block d-lg-none" type="button"  data-bs-target="#modalCollapseMobile" data-bs-toggle="modal" >
        <i class="fa fa-info"> </i>
    </button>
       <div class="row">
    
           <div class="col-12 col-lg-3">
               <h4 class="tipo-poltrona">Econômico</h4>
               <img src="{{ asset('storage/agencias/'.$v->fotoAgencia) }}" alt="Agencias" width="100">
                <div class="nome-agencia">{{ $v->nomeAgencia }}</div>
            </div>

           <div class="col-12 col-lg-5">

               <div class="route">
                   <div class="route-info">
                       <div class="route-info-row">
                           <span class="route-info-hour route-info-hour-start">{{ 
                            str_replace(':','h',date("H:i", strtotime($v->hora_partida))) 
                            }}</span>
                           <div class="route-info-line route-info-line-start"></div>
                           <div class="route-info-time">
                               <p class="route-info-time-child time">11h 30min</p>
                           </div>
                           <div class="route-info-line route-info-line-end"></div>
                           <span class="route-info-hour route-info-hour-end">{{ 
                           str_replace(':','h',date("H:i", strtotime($v->hora_chegada))) 
                           }}</span>
                       </div>
                       <div class="route-info-row">
                           <div class="route-info-city-name route-info-city-name-start">
                               <p>{{$v->provi_partida}}</p>
                               <p></p>
                           </div class="route-info-city-name route-info-city-name-end">
                           <div>
                               <p>{{$v->provi_destino}}</p>
                               <p></p>
                           </div>
                       </div>
                   </div>
               </div>

               </div>

            <div class="col-12 col-lg-2 d-flex" style="align-items:center; justify-content:right;">
               <div class="div-preco">
                   <span class="valor">{{ number_format($v->preco_bilhete,2,',','.') }} Kz</span>
               </div>
            </div>
           <div class="col-12 col-lg-2 d-flex" style="align-items:center; justify-content:left;">
               @if(Auth::guard('client')->user())
                    <a href="{{ route('rota_especifica',$v->idViagem) }}" class="btn btn-select-passagem">Selecionar</a>     
                @else
                    <a href="#"  data-bs-target="#modalLogin" data-bs-toggle="modal" class="btn btn-select-passagem">Selecionar</a>              
                @endif
            </div>

</div>

       <div class="collapse mt-3" id="collapseInfo{{$v->idViagem}}">
        <div class="card card-body">
          <div class="desc-passagem">
            <p>Passagem de ônibus de <span>{{$v->provi_partida}}</span> para <span>{{$v->provi_destino}}</span> saída às <span>
                {{ str_replace(':','h',date("H:i", strtotime($v->hora_partida))) }}</span> </p>
            <h4>Itinerário da viagem</h4>
            <p><i class="fa fa-map-marker"></i>Embarque: <span>
               <!-- /* strftime('%A',strtotime($d->data_partida)) */  -->
                {{ date('d/M',strtotime($d->data_partida)) }}
                </span> às <span>{{ 
                str_replace(':','h',date("H:i", strtotime($v->hora_partida))) 
                }}</span> em <span>{{$v->provi_partida}}</span></p>
            <p><i class="fa fa-circle"></i>Desembarque: <span>
                {{ date('d/M',strtotime($d->data_partida)) }}
                </span> às <span>{{ 
                str_replace(':','h',date("H:i", strtotime($v->hora_chegada))) 
                }}</span> em <span>{{$v->provi_destino}}</span></p>
          </div>
          <div class="row desc-onibus">
            <p class="col-12 col-lg-6 desc1">
            Viação: <span>{{ $v->nomeAgencia }}</span> <br>
            Preço da passagem de ônibus: <span>{{ number_format($v->preco_bilhete,2,',','.') }} Kz</span> <br>
            Duração da viagem: <span>4h</span>
            </p>
            <p class="col-12 col-lg-6 desc2">
            Tipo de poltrona: <span>Econômico</span> <br>
            Descrição do ônibus: Ônibus composto de no máximo 23 poltronas, 
            equipado com ar condicionado, oferta de água. Com poltronas que reclinam 150 graus.
            </p>
          </div>
        </div>
      </div>

   </div>

   <!-- MODAL CALLAPSE MOBILE -->
  <!-- Modal -->
  <div class="modal fade" id="modalCollapseMobile" tabindex="-2" aria-labelledby="modalCollapseMobile" aria-hidden="false">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
            <h3>Mais detalhes sobre a viagem</h3>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="desc-passagem">
                <p>Passagem de ônibus de <span>{{$v->provi_partida}}</span> para <span>{{$v->provi_destino}}</span> saída às <span>
                    {{ str_replace(':','h',date("H:i", strtotime($v->hora_partida))) }}</span> </p>
                <h4>Itinerário da viagem</h4>
                <p><i class="fa fa-map-marker"></i>Embarque: <span>
                    {{ strftime('%A',strtotime($d->data_partida)) }}, 
                    {{ date('d/M',strtotime($d->data_partida)) }}
                    </span> às <span>{{ 
                    str_replace(':','h',date("H:i", strtotime($v->hora_partida))) 
                    }}</span> em <span>{{$v->provi_partida}}</span></p>
                <p><i class="fa fa-circle"></i>Desembarque: <span>quarta-feira, 12/jul </span> às <span>{{ 
                    str_replace(':','h',date("H:i", strtotime($v->hora_chegada))) 
                    }}</span> em <span>{{$v->provi_destino}}</span></p>
              </div>
              <div class="row desc-onibus">
                <p class="col-12 col-lg-6 desc1">
                Viação: <span>{{ $v->nomeAgencia }}</span> <br>
                Preço da passagem de ônibus: <span>{{ number_format($v->preco_bilhete,2,',','.') }} Kz</span> <br>
                Duração da viagem: <span>4h</span>
                </p>
                <p class="col-12 col-lg-6 desc2">
                Tipo de poltrona: <span>Econômico</span> <br>
                Descrição do ônibus: Ônibus composto de no máximo 23 poltronas, 
                equipado com ar condicionado, oferta de água. Com poltronas que reclinam 150 graus.
                </p>
              </div>
        </div>
      </div>
    </div>
  </div>
<!-- FIM DO MODAL -->

     @endforeach
   @endif
</div>

<!-- MODAL  LOGIN PRA CONTINUAR-->
  <!-- Modal -->
  <div class="modal fade" id="modalLogin" tabindex="-2" aria-labelledby="exampleModalLabel" aria-hidden="false">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Faça login para continuar</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              
        </div>
        <div class="modal-body">
            <div class="alert alert-danger alert-dismissible fade show" role="alert" id="acesso-negado-modal"  style="display: none;">
                <strong>Acesso Negado:</strong> Tente novamente
                <button type="button" id="btnFecharAlert" class="btFecharAlert" style="margin-right: -50px;">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
          <form action="post" id="formLoginModal">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Email ou Numero de telefone</label>
                <input type="email" class="form-control" name="email_tel" id="exampleInputEmail1" aria-describedby="emailHelp">
              </div>
              <div class="form-group mt-3">
                <label for="exampleInputPassword1">Senha</label>
                <input type="password" class="form-control" name="senha" id="exampleInputPassword1">
              </div>
              <div class="form-group mt-3">
                <button type="submit" class="btn btn-logar-modal" id="btnLogarModal" style="float: right;">Entrar</button>
              </div>
          </form>
        </div>
      </div>
    </div>
  </div>
<!-- FIM DO MODAL -->

@endsection
