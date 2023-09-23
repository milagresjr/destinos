@extends("layouts.app2")

@section("titulo","Escolha de poltrona")

@section("conteudo2")
  

<div class="fundo-principal">

  <div class="fundo-branco container shadow" id="fundo-branco">

  <div class="row div-details">
    @foreach($viagem as $v)
    <div class="col-12 col-sm-4 col-lg-2 ">
      <h5>Convencional</h5>
      <img src="{{ asset('storage/agencias/'.$v->fotoAgencia) }}" alt="Agencias" width="100">
    </div>
    <div class="col-12 col-sm-4 col-lg-8 ">
      <div class="row">
        <div class="title-container">
         <p class="title">{{ $v->provi_partida }} <span>para</span> {{ $v->provi_destino }} <span>saida</span> 1 de Junho</p>
        </div>
      </div>
    </div>
    <div class="col-12 col-sm-4 col-lg-2 ">
      <h3 id="dataatual">{{ date("d-M-Y",strtotime($v->data_partida)) }}</h3>
    </div>
    <!-- Input que armazena o valor do preco da viagem -->
    <input type="hidden" value="{{ $v->preco_bilhete }}" id="inputPrecoViagem">
    <input type="hidden" value="{{ $v->idViagem }}" id="inputIdViagem">
    @endforeach
  </div>


    <!--  Div para a construcao do design do onibus -->
  <div class="container-bus">
    <div class="bus">
        {{ csrf_field() }}  
          <div class="coluna1">
          <?php for ($i = 37; $i >= 1; $i=$i-4) { 
            $numFormatado = sprintf("%02d",$i);
          ?>
            <div class="poltrona <?php if(in_array($i,$poltronas)){ echo 'ocupado'; } ?>" data-value="<?= $i ?>">
                <?= $numFormatado ?>
            </div>            
          <?php
           }
          ?>
          <?php for ($i = 38; $i >= 2; $i=$i-4) { 
            $numFormatado = sprintf("%02d",$i);
            ?>       
             <div class="poltrona <?php if(in_array($i,$poltronas)){ echo 'ocupado'; } ?>" data-value="<?= $i ?>">
              <?= $numFormatado ?>
            </div>
          <?php
           }
          ?>
          </div>
    
          <div class="coluna2">
          <?php for ($i = 39; $i >= 3; $i=$i-4) { 
            $numFormatado = sprintf("%02d",$i);
          ?>       
             <div class="poltrona <?php if(in_array($i,$poltronas)){ echo 'ocupado'; } ?>" data-value="<?= $i ?>">
              <?= $numFormatado ?>
            </div>
          <?php
           }
          ?>
          <?php for ($i = 40; $i >= 4; $i=$i-4) { 
           $numFormatado = sprintf("%02d",$i);
          ?>       
             <div class="poltrona <?php if(in_array($i,$poltronas)){ echo 'ocupado'; } ?>" data-value="<?= $i ?>">
              <?= $numFormatado ?>
            </div>
          <?php
           }
          ?>
          </div>
    
        </div>

    </div>
  </div>

  </div>

</div>



<div class="footer">

  <div class="row">
  
    <div class="col-12 col-lg-6 col-xs-12">
      <div class="row">
        <div class="col" style="text-align:center;"><div style="margin: 0 auto;" class="status selected"></div><span class="texto">Selecionada</span></div>
        <div class="col" style="text-align:center;"><div style="margin: 0 auto;" class="status occupied">x</div><span class="texto">Ocupada</span></div>
        <div class="col" style="text-align:center;"><div style="margin: 0 auto;" class="status available"></div><span class="texto">Disponível</span></div>
      </div>
  
  </div>
  <div class="col-12 col-lg-6 col-xs-12">
      <div class="row">
          <div class="col-6 section-valor-tot" >
          <div>
            <span>Valor total: </span>
            <span id="preco">{{ number_format('0','2',',','.') }}</span>
          </div>
          </div>
      <div class="col-6 col-xs-6">
        {{ csrf_field() }}
        <!-- onclick="window.location = ' //route("checkout",$v->idViagem) }}?<?php //echo "idViagem=$v->idViagem"; ?>'" -->
        <button class="continue disabled" style="" id="btContinuarReserva"  >Continuar reserva</button>
      </div>
      </div>
  </div>
  
  </div>

</div>
  

<script>

    let meses = ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"];
    let diadesemana = ["Domingo","Segunda","Terça","Quarta","Quinta","Sexta","Sábado"];
    let dataAtual = new Date();
    let data = document.getElementById("dataatual");
    data.innerText = diadesemana[dataAtual.getDay()] + ",  " + dataAtual.getDate() + " de " + meses[dataAtual.getMonth()] + " de " + dataAtual.getFullYear();
   
</script>

@endsection