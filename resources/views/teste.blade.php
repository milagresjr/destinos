@extends('layouts.app')

@section('conteudo')
<div style="background-color: green; padding-bottom: 10px;">

    <div class="container cont-datas">

               @for ($i = 0; $i <= 4; $i++)
               <div><span>Quinta <br><span style="font-weight: 700; font-size: 13pt;">10</span><br> Junho</span></div>
               @endfor
    </div>

    @for ($i = 0; $i <= 5; $i++)
   <div class="container cont-principal " style="background-color: #fff">

       <div class="row">

           <div class="col-12 col-lg-3">
               <h5>Convencional</h5>
           <img src="{{ asset('img/logo.png') }}" alt="">
           </div>

           <div class="col-12 col-lg-5">

               <div class="route">
                   <div class="route-info">
                       <div class="route-info-row">
                           <span class="route-info-hour route-info-hour-start">09:00</span>
                           <div class="route-info-line route-info-line-start"></div>
                           <div class="route-info-time">
                               <p class="route-info-time-child time">11h 30min</p>
                           </div>
                           <div class="route-info-line route-info-line-end"></div>
                           <span class="route-info-hour route-info-hour-end">14:00</span>
                       </div>
                       <div class="route-info-row">
                           <div class="route-info-city-name route-info-city-name-start">
                               <p>Luanda - Lda</p>
                               <p></p>
                           </div class="route-info-city-name route-info-city-name-end">
                           <div>
                               <p>Malanje - Mj</p>
                               <p></p>
                           </div>
                       </div>
                   </div>
               </div>

               </div>

            <div class="col-12 col-lg-2 d-flex" style="align-items:center; justify-content:right;">
               <div class="div-preco">
                   <span class="valor">1.800,00 Kz</span>
               </div>
            </div>
           <div class="col-12 col-lg-2 d-flex" style="align-items:center; justify-content:right;"">
               <a href="#" class="btn btn-success d-none d-lg-block">Selecionar</a>
           </div>
       </div>

   </div>
   @endfor
</div>


<!-- Button trigger modal -->
<button type="button" class="btn btn-primary mt-5" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Launch demo modal
  </button>
  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>


@endsection
