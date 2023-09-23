<footer class="footer">
    <div class="footer_top">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-md-6 col-lg-4 ">
                    <div class="footer_widget">
                        <div class="footer_title">
                             Destino.ao
                               <!-- <img src="{{ asset('img/logo2.png') }}" style="width: 150px;" alt=""> -->
                        </div>
                       <!-- <p>5th flora, 700/D kings road, green <br> lane New York-1782 <br> -->
                            <a href="#">+244 943654311</a> <br>
                            <a href="#">multisocial.geral@gmail.com</a>
                        </p>
                        <div class="socail_links">
                            <ul>
                                <li>
                                    <a href="#">
                                        <i class="ti-facebook"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="ti-twitter-alt"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-instagram"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-pinterest"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-youtube-play"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>
                <div class="col-xl-2 col-md-6 col-lg-2">
                    <div class="footer_widget">
                        <h3 class="footer_title">
                            Informações
                        </h3>
                        <ul class="links">
                            <li><a href="{{ route('atendimento') }}">Atendimento</a></li>
                            <li><a href="{{ route('termos') }}">Termos de uso</a></li>
                            {{-- <li><a href="#"> Politica de privacidade</a></li> --}}
                            <li><a href="{{ route('sobre') }}"> Quem somos</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 col-lg-3">
                    <div class="footer_widget">
                        <h3 class="footer_title">
                            Agencias
                        </h3>
                        <ul class="links double_links">
                            <li><a href="#">Macon</a></li>
                            <li><a href="#">Huambo Expresso</a></li>
                            <li><a href="#">Transport DT</a></li>
                            <li><a href="#">Macon</a></li>
                            <li><a href="#">Macon</a></li>
                            <li><a href="#">Huambo Expresso</a></li>
                            <li><a href="#">Transport DT</a></li>
                            <li><a href="#">Macon</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 col-lg-3">
                    <div class="footer_widget">
                        <h3 class="footer_title">
                            Subscrever a newsletter
                        </h3>
                        <div class="news">
                        <div class="mail_form">
                            <div class="row no-gutters">
                                <div class="col-12">
                                    <div class="newsletter_field">
                                        <input type="email" class="form-control" placeholder="Seu e-mail" >
                                    </div>
                                </div>
                                <div class="col-12 mt-3">
                                    <div class="newsletter_btn float-right">
                                        <button class="btn-subscrever" type="submit" >Subscrever</button>
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
    <div class="copy-right_text">
        <div class="container">
            <div class="footer_border"></div>
            <div class="row">
                <div class="col-xl-12">
                    <p class="copy_right text-center">
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy; <script>document.write(new Date().getFullYear());</script> All rights reserved | Destino.ao
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>


<div class="mod">

</div>

<!-- Modal -->
<div class="modal fade custom_search_pop" id="modal-loading" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
  <div class="modal-content p-3" style="display: inline;">
  <img src="{{ asset('img/preloader.gif') }}" alt="Loading.." style="width: 40px; height:40px;">
    <span style="font-size: 14pt; font-weight: 500;"> Carregando...</span>
  </div>
  <button type="button" id="btnFecharModalCarregando" class="d-none close" data-dismiss="modal" aria-label="Close">
</div>
</div>
<!-- link that opens popup -->
<!--
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://static.codepen.io/assets/common/stopExecutionOnTimeout-de7e2ef6bfefd24b79a3f68b414b87b8db5b08439cac3f1012092b2290c719cd.js"></script>

<script src=" https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"> </script> -->
<!-- JS here -->
{{-- <script src="{{ asset('js/vendor/modernizr-3.5.0.min.js') }}"></script> --}}
{{-- <script src="{{ asset('js/vendor/jquery-1.12.4.min.js') }}"></script> --}}
{{-- <script src="{{ asset('js/popper.min.js') }}"></script> --}}
{{-- <script src="{{ asset('js/owl.carousel.min.js') }}"></script> --}}
<script src="{{ asset('js/code.jquery.com_jquery-3.7.1.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.bundle.js') }}"></script>
{{-- <script src="{{ asset('js/ajax-form.js') }}"></script> --}}
{{-- <script src="{{ asset('js/waypoints.min.js') }}"></script> --}}
{{-- <script src="{{ asset('js/jquery.counterup.min.js') }}"></script> --}}
{{-- <script src="{{ asset('js/imagesloaded.pkgd.min.js') }}"></script> --}}
{{-- <script src="{{ asset('js/scrollIt.js"') }}"></script> --}}
{{-- <script src="{{ asset('js/jquery.scrollUp.min.js') }}"></script> --}}
{{-- <script src="{{ asset('js/wow.min.js">') }}"></script> --}}
{{-- <script src="{{ asset('js/nice-select.min.js') }}"></script> --}}
{{-- <script src="{{ asset('js/jquery.slicknav.min.js') }}"></script> --}}
{{-- <script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script> --}}
{{-- <script src="{{ asset('js/plugins.js') }}"></script> --}}
{{-- <script src="{{ asset('js/gijgo.min.js') }}"></script> --}}
{{-- <script src="{{ asset('js/slick.min.js') }}"></script> --}}

<script src="{{ asset('js/swiper-bundle.min.js') }}"></script>
<script src="{{ asset('js/flick.js') }}"></script>
{{-- <script src="{{ asset('js/jquery-2.1.4.min.js') }}"></script>  --}}

<!--contact js-->
{{-- <script src="{{ asset('js/contact.js') }}"></script>
<script src="{{ asset('js/jquery.ajaxchimp.min.js') }}"></script>
<script src="{{ asset('js/jquery.form.js') }}"></script>
<script src="{{ asset('js/jquery.validate.min.js') }}"></script>
<script src="{{ asset('js/mail-script.js') }}"></script> --}}
<script src="{{ asset('js/jquery-ui-1.13.2/jquery-ui.min.js') }}"></script>

<script src="{{ asset('js/moment.min.js') }}"></script>
{{--  <script src="{{ asset('js/main.js') }}"></script> --}}
{{-- <script src="{{ asset('js/jquery-2.1.4.min.js') }}"></script> --}}
<script src="{{ asset('js/sweetalert.min.js') }}"></script>
<script src="{{ asset('js/custom.js') }}"></script>
{{-- <script src="{{ asset('js/search.js') }}"></script> --}}
<script src="{{ asset('js/autocomplete.js') }}"></script>

<script>
    var swiper1 = new Swiper(".mySwiper1", {
          slidesPerView: 3,
          spaceBetween: 25,
          slidesPerGroup: 1,
          loop: false,
          centerSlide: 'true',
          fade: 'true',
          grabCursor: 'true',
         // loopFillGroupWithBlank: true,
          pagination: {
            el: ".swiper-pagination",
            clickable: true,
            dynamicBullets: true,
          },
          navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
          },
          breakpoints:{
            0: {
                slidesPerView: 1,
            },
            520: {
                slidesPerView: 2,
            },
            950: {
                slidesPerView: 3,
            },
          },
        });

        var swiper1 = new Swiper(".swiperDatasViagens", {
          slidesPerView: 1,
          spaceBetween: 10,
          slidesPerGroup: 1,
          loop: true,
          centerSlide: 'true',
          fade: 'true',
          grabCursor: 'true',
         // loopFillGroupWithBlank: true,
          navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
          },
          breakpoints:{
            0: {
                slidesPerView: 6,
            },
            520: {
                slidesPerView: 8,
            },
            950: {
                slidesPerView: 10,
            },
          },
        });

</script>

<script>
    $('.flickity-page-dots').remove();

    let dataAtual = new Date();
    document.getElementById("dataatual").innerHTML = "asdfggfgdf";
    let data = document.getElementById("dataatual").innerHTML = "asdfggfgdf";
     data.innerText = dataAtual;
</script>

<script>    
    // alert('olaaaa');
    
    $(document).ready(function() {
        
        $('#datepicker').datepicker({
            iconsLibrary: 'fontawesome',
            dateFormat: 'dd/mm/yy',
            altFormat: 'DD, MMMM',
            icons: {
             rightIcon: '<span class="fa fa-caret-down"></span>'
         }
        }).on('change', function(){
            var date = moment($(this).datepicker('getDate')).format('DD, MMMM');
            //Faca qualquer coisa com a data aqui...
            // alert(date);
            // $(this).val(date);
        });

    });



</script>
@if(session('sessionSemViagem'))
    <script>
        var msg ='De momento estamos sem viagem marcada para esta rota!'
        swal('oops!',msg,'error');
    </script>
@endif
</body>

</html>
