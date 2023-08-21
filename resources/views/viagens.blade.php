@extends("layouts.app")

@section('conteudo')
<div class="bg-gray" style="background-color: #f6f6f6; padding-bottom: 10px; padding-top:40px;">


    <div class="container titulo-destino">
        <div class="row">
            @if(isset($destinos))
            @foreach ($destinos as $d)
                <div class="col-5"><p>{{$d->provi_1}}</p></div>
                <div class="col-2"><p><i class="fa fa-arrow-right"></i></p></div>
                <div class="col-5"><p>{{$d->provi_2}}</p></div>
            @endforeach
            @endif
        </div>
    </div>

    @if(isset($viagem_info))
    <div class="container">
        <div class="main-carousel" data-flickity='{ "cellAlign": "center", "contain": true, "pageDots": false }'>
              
                 @foreach($datas as $v)
                   
                      <a class="carousel-cell data-viagens" href="">
                      <span>
                           <!-- date('l',strtotime($d->data_partida)) -->
                           {{ date('d/M',strtotime($v->data_partida)) }} <br> 
                           {{ strftime('%A',strtotime($v->data_partida)) }}
                       </span>
                       </a>
                 @endforeach
              
           </div>
   </div>
   @endif


    @if(isset($viagem_info))
    @foreach($viagem_info as $v)
   <div class="container cont-principal " style="background-color: #fff">

       <div class="row">

           <div class="col-12 col-lg-3">
               <h5>Convencional</h5>
           <img src="{{ asset('img/agencias/'.$v->fotoAgencia) }}" alt="Agencias" width="100">
           </div>

           <div class="col-12 col-lg-5">

               <div class="route">
                   <div class="route-info">
                       <div class="route-info-row">
                           <span class="route-info-hour route-info-hour-start">{{
                            str_replace(':','h',date("H:i", strtotime($v->hora_partida)))
                            }}
                            </span>
                           <div class="route-info-line route-info-line-start"></div>
                           <div class="route-info-time">
                               <p class="route-info-time-child time">11h 30min</p>
                           </div>
                           <div class="route-info-line route-info-line-end"></div>
                           <span class="route-info-hour route-info-hour-end">{{ str_replace(':','h',date("H:i", strtotime($v->hora_partida))) }}</span>
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
           <div class="col-12 col-lg-2 d-flex" style="align-items:center; justify-content:right;"">
               <a href="#" class="btn btn-success d-none d-lg-block">Selecionar</a>
           </div>
       </div>

   </div>
     @endforeach
   @endif
</div>
@endsection
