@extends('layouts.app')

@section('conteudo')

    <!-- slider_area_start -->
    <div class="slider_area">

        <div class="bg-main">

            <!-- Texto no background -->

            <h2 class="texto-desc">Viage por todo país com a Destino.ao</h2>
            <p class="subtext-desc">Reserva fácil com segurança e preços justo</p>
            <!-- Texto no background -->

            <!-- where_togo_area_start  -->
            <div class="where_togo_area form-pesquisa shadow">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-3">
                            <div class="form_area">
                                <h3 style="color: #040e27; text-align: center;">Ache sua passagem</h3>
                            </div>
                        </div>
                        <div class="col-lg-9">
                            <div class="search_wrap">
                                <form class="search_form" action="{{ url('/search/passagem/') }}">
                                    <!--
                                        <div class="input_field">
                                            <i class="fa fa-calendar-o icon-input"> </i>
                                            <input id="" type="date" class="form-control data-viagem date-input" name="data" placeholder="Date">
                                        </div>
                                        <div class="input_field">
                                            <i class="fa fa-circle-o icon-input"> </i>
                                            <input id="partindo_de" class="form-control data-viagem" name="partindo_de" placeholder="Partindo de" >
                                            {{ csrf_field() }}
                                            <div id="listaPartindo" style="position: relative;">
                                            </div>
                                        </div>
                                        <div class="input_field">
                                            <i class="fa fa-map-marker icon-input icon-indo-para"> </i>
                                            
                                        </div>
                                    -->
                                    <div class="input_field">
                                        <i class="fa fa-calendar-o icon-input"> </i>
                                        <input type="date" id="datepicker" placeholder="Data de ida" name="data">
                                    </div>
                                    <div class="input_field" style="width: 50%; margin-inline: 8px;">
                                        
                                        <input type="text" list="autocompletes" class="data-viagem" name="rota" placeholder="Rota" id="partindo_de">
                                        <datalist id="autocompletes">
                                            @foreach ($rotas as $rota)
                                                <option value="{{ $rota->local_partida }} - {{ $rota->local_destino }}"></option>    
                                            @endforeach
                                        </datalist>
                                    </div>
                                    <div class="search_btn">
                                        <button class="boxed-btn4 btnSearch" type="submit">
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
            <!-- where_togo_area_end  -->

        </div>

    </div>
    <!-- slider_area_end -->

    <!-- Area das provincias 1 -->
    <div class="popular_destination_area d-block d-lg-none">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section_title text-center mb_20">
                        <h3>Destinos Populares</h3>
                        <p></p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="swiper mySwiper1">
                    <div class="swiper-wrapper">
                        <div class="col-lg-4 col-md-6 swiper-slide">
                            <div class="single_destination">
                                <div class="thumb">
                                    <img src="{{ asset('img/provincias/luanda.jpg') }}" class="img-destino" alt="">
                                </div>
                                <div class="content">
                                    <p class="d-flex align-items-center">Luanda</p>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 swiper-slide">
                            <div class="single_destination">
                                <div class="thumb">
                                    <img src="{{ asset('img/provincias/benguela.jpg') }}" class="img-destino"
                                        alt="">
                                </div>
                                <div class="content">
                                    <p class="d-flex align-items-center">Benguela</p>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 swiper-slide">
                            <div class="single_destination">
                                <div class="thumb">
                                    <img src="{{ asset('img/provincias/huambo.jpg') }}" class="img-destino" alt="">
                                </div>
                                <div class="content">
                                    <p class="d-flex align-items-center">Huambo</p>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 swiper-slide ">
                            <div class="single_destination">
                                <div class="thumb">
                                    <img src="{{ asset('img/provincias/huila.jpg') }}" class="img-destino" alt="">
                                </div>
                                <div class="content">
                                    <p class="d-flex align-items-center">Huila</p>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 swiper-slide">
                            <div class="single_destination">
                                <div class="thumb">
                                    <img src="{{ asset('img/provincias/cabinda.jpg') }}" class="img-destino"
                                        alt="">
                                </div>
                                <div class="content">
                                    <p class="d-flex align-items-center">Cabinda</p>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 swiper-slide">
                            <div class="single_destination">
                                <div class="thumb">
                                    <img src="{{ asset('img/provincias/cunene.jpg') }}" class="img-destino"
                                        alt="">
                                </div>
                                <div class="content">
                                    <p class="d-flex align-items-center">Cunene</p>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Area das provincias 1 -->

    <!-- Area das provincias 2 -->
    <div class="popular_destination_area d-none d-lg-block">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section_title text-center mb_20">
                        <h3>Destinos Populares</h3>
                        <p>Escolha os melhores destinos para viajar</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="single_destination">
                        <div class="thumb thumb2">
                            <img src="{{ asset('img/provincias/cunene.jpg') }}" alt="Luanda">
                        </div>
                        <div class="content">
                            <p class="d-flex align-items-center">Cunene </p>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single_destination">
                        <div class="thumb thumb2">
                            <img src="{{ asset('img/provincias/benguela.jpg') }}" alt="">
                        </div>
                        <div class="content">
                            <p class="d-flex align-items-center">Benguela </p>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single_destination">
                        <div class="thumb thumb2">
                            <img src="{{ asset('img/provincias/luanda.jpg') }}" alt="">
                        </div>
                        <div class="content">
                            <p class="d-flex align-items-center">Luanda </p>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single_destination">
                        <div class="thumb thumb2">
                            <img src="{{ asset('img/provincias/cabinda.jpg') }}" alt="">
                        </div>
                        <div class="content">
                            <p class="d-flex align-items-center">Cabinda </p>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single_destination">
                        <div class="thumb thumb2">
                            <img src="{{ asset('img/provincias/huila.jpg') }}" alt="">
                        </div>
                        <div class="content">
                            <p class="d-flex align-items-center">Huila </p>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single_destination">
                        <div class="thumb thumb2">
                            <img src="{{ asset('img/provincias/huambo.jpg') }}" alt="">
                        </div>
                        <div class="content">
                            <p class="d-flex align-items-center">Huambo </p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Area das provincias 2 -->

    <!-- newletter_area_start  -->
    <!--
    <div class="newletter_area overlay">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-10">
                    <div class="row align-items-center">
                        <div class="col-lg-5">
                            <div class="newsletter_text">
                                <h4>Subscreva em nossa Newsletter</h4>
                                <p>Subscreva em nossa newsletter para receber offers and about
                                    new places to discover.</p>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="mail_form">
                                <div class="row no-gutters">
                                    <div class="col-lg-9 col-md-8">
                                        <div class="newsletter_field">
                                            <input type="email" placeholder="Seu e-mail" >
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-4">
                                        <div class="newsletter_btn">
                                            <button class="boxed-btn4 " type="submit" >Subscrever</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    -->
    <!-- newletter_area_end  -->

    <div class="popular_places_area" id="destinos">

        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section_title text-center mb_20">
                        <h3>Principais ofertas de passagens</h3>
                        <p>Confira as ofertas exclusivas de passagens mais buscada em nosso site</p>
                    </div>
                </div>
            </div>

            <div class="main-carousel" data-flickity='{"cellAlign": "center", "contain": true, "pageDots": false }'>
                @if (isset($Rotasofertas))
                    @foreach ($Rotasofertas as $r)
                        <div class="carousel-cell" style="margin-inline: 10px;">
                            <div class="card shadow" style="width: 21rem; position: relative;">
                                <span class="desconto">20% off</span>
                                <img src="{{ asset('img/uploads/' . $r->fotoProvi) }}" class="card-img-top" alt="..."
                                    style="height: 200px;">
                                <div class="card-body">
                                    <div class="topo">
                                        <div class="icones">
                                            <i class="fa fa-circle-o"></i>
                                            <i class="fa fa-map-marker" style="color: #C02720;"></i>
                                        </div>
                                        <div class="rotas">
                                            <span>Saindo de</span>
                                            <h5 style="margin-bottom: 15px;font-weight: bold;">{{ $r->provi_1 }} -
                                                Rodovia de santo andre</h5>
                                            <span>Partindo para</span>
                                            <h5 style="font-weight: bold;">{{ $r->provi_2 }} - RJ</h5>
                                        </div>
                                    </div>
                                    <div class="rodape">
                                        <div>
                                            <span>A partir de</span>
                                            <h4 class="preco-passagem">{{ number_format($r->preco_bilhete, 2, ',', '.') }} kz
                                            </h4>
                                        </div>
                                        <button class="btn-conf">
                                            <a href="{{ route('passagem', [$r->idPartida, $r->idDestino]) }}">Conferir
                                                oferta <i class="fa fa-arrow-right"></i></a>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="more_place_btn text-center">
                        <a class="boxed-btn4 btn-outline-danger d-none" href="#">Mais destinos</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--
    <div class="video_area video_bg overlay">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="video_wrap text-center">
                        <h3>Enjoy Video</h3>
                        <div class="video_icon">
                            <a class="popup-video video_play_button" href="https://www.youtube.com/watch?v=f59dDEk57i0">
                                <i class="fa fa-play"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    -->
    <div class="travel_top" style="margin-bottom: 40px">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section_title text-center mb_20">
                        <h3>Escolha seu destino</h3>
                        <p>Mais de 5 mil destinos pra escolheres sem saires de sua casa</p>
                    </div>
                </div>
            </div>
            <div class="">
                <div class="row">

                    <div class="main-carousel"
                        data-flickity='{"prevNextButtons": false, "cellAlign": "center", "contain": true, "pageDots": false }'>
                        @for ($x = 1; $x <= 3; $x++)
                            <div class="carousel-cell">

                                <div class="col-12 col-lg-4">
                                    <ul class="list-group">
                                        <table class="table table-bordered table-striped">
                                            <tr>
                                                <th>Partindo de</th>
                                                <th>Indo para</th>
                                                <th></th>
                                            </tr>
                                            @if (isset($rotas2))
                                                @foreach ($rotas2 as $r1)
                                                    <tr>
                                                        <td style="vertical-align: middle;"> {{ $r1->provi_1 }}</td>
                                                        <td style="vertical-align: middle;"> {{ $r1->provi_2 }}</td>
                                                        <td style="text-align: center;">
                                                            <a href="{{ route('search_passagem_com_param', [$r1->provi_1, $r1->provi_2, $r1->data_partida]) }}"
                                                                class="boxed-btn4">Comprar</a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                        </table>
                                    </ul>
                                </div>

                            </div>
                        @endfor
                    </div>

                </div>
            </div>
        </div>
    </div>


    <div class="travel_variation_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="single_travel text-center">
                        <div class="icon">
                            <!--  <img src="img/svg_icon/1.svg" alt=""> -->
                            <i class="icones-destaques fa fa-bus"></i>
                        </div>
                        <h3>Viagem confortavel</h3>
                        <p>Descubra o prazer de uma viagem tranquila e confortável</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single_travel text-center">
                        <div class="icon">
                            <!--  <img src="img/svg_icon/2.svg" alt=""> -->
                            <i class="icones-destaques fa fa-money"></i>
                        </div>
                        <h3>Pagamentos 100% seguros</h3>
                        <p>Garantimos a segurança total dos seus pagamentos.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single_travel text-center">
                        <div class="icon">
                            <!--  <img src="img/svg_icon/3.svg" alt=""> -->
                            <i class="icones-destaques fa fa-search"></i>
                        </div>
                        <h3>Pesquise e Encontre</h3>
                        <p>Pesquise e encontre horários e diferentes rotas por todo país</p>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- testimonial_area  -->
    <!--
    <div class="testimonial_area">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="testmonial_active owl-carousel">
                        <div class="single_carousel">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <div class="single_testmonial text-center">
                                        <div class="author_thumb">
                                            <img src="img/testmonial/author.png" alt="">
                                        </div>
                                        <p>"Working in conjunction with humanitarian aid agencies, we have supported programmes to help alleviate human suffering.</p>
                                        <div class="testmonial_author">
                                            <h3>- Micky Mouse</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="single_carousel">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <div class="single_testmonial text-center">
                                        <div class="author_thumb">
                                            <img src="img/testmonial/author.png" alt="">
                                        </div>
                                        <p>"Working in conjunction with humanitarian aid agencies, we have supported programmes to help alleviate human suffering.</p>
                                        <div class="testmonial_author">
                                            <h3>- Tom Mouse</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="single_carousel">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <div class="single_testmonial text-center">
                                        <div class="author_thumb">
                                            <img src="img/testmonial/author.png" alt="">
                                        </div>
                                        <p>"Working in conjunction with humanitarian aid agencies, we have supported programmes to help alleviate human suffering.</p>
                                        <div class="testmonial_author">
                                            <h3>- Jerry Mouse</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    -->
    <!-- /testimonial_area  -->

    <!-- Collapse -->

    <div class="faq" style="margin-block: 40px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section_title text-center mb_20">
                        <h3>Perguntas Frequentes (FAQ)</h3>
                        <p>Algumas perguntas frequentes.</p>
                    </div>
                </div>
            </div>
            <div class="accordion accordion-flush" id="accordionFlushExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingOne">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                            Como comprar passagem de autocarro na plataforma?
                        </button>
                    </h2>
                    <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne"
                        data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            Para comprar a sua passagem de autocarro com a Destino.ao você deve acessar o site.
                            É necessário preencher a origem e o destino da sua viagem no campo de pesquisa e em seguida
                            clicar
                            em buscar. Você também pode selecionar a data de ida. É importante fazer a sua reserva com
                            antecedência pra evitar certos transtornos.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                            Com quantos anos pode viajar sozinho?
                        </button>
                    </h2>
                    <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo"
                        data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            Apartir dos 16 anos de idade podem viajar de autocarro sozinhos sem autorização dos pais ou
                            responsáveis.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseThree" aria-expanded="false"
                            aria-controls="flush-collapseThree">
                            Pode viajar com animal?
                        </button>
                    </h2>
                    <div id="flush-collapseThree" class="accordion-collapse collapse"
                        aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            Você pode embarcar com seu cão ou gato nas viagens, porém, é necessário atender as regras da
                            companhia de viagens.
                            Para tanto o animal deve ser dde pequeno ou médio porte e não comprometer a segurança dos
                            passageiros e da viagem.
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- -->
    <!--

    <div class="recent_trip_area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section_title text-center mb_70">
                        <h3>Recent Trips</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="single_trip">
                        <div class="thumb">
                            <img src="img/trip/1.png" alt="">
                        </div>
                        <div class="info">
                            <div class="date">
                                <span>Oct 12, 2019</span>
                            </div>
                            <a href="#">
                                <h3>Journeys Are Best Measured In
                                    New Friends</h3>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single_trip">
                        <div class="thumb">
                            <img src="img/trip/2.png" alt="">
                        </div>
                        <div class="info">
                            <div class="date">
                                <span>Oct 12, 2019</span>
                            </div>
                            <a href="#">
                                <h3>Journeys Are Best Measured In
                                    New Friends</h3>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single_trip">
                        <div class="thumb">
                            <img src="img/trip/3.png" alt="">
                        </div>
                        <div class="info">
                            <div class="date">
                                <span>Oct 12, 2019</span>
                            </div>
                            <a href="#">
                                <h3>Journeys Are Best Measured In
                                    New Friends</h3>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    -->

@endsection
