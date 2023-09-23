<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bilhete Digital</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            outline: 1px solid #000;
        }
        body {
            /* background: red; */
            font-family: Arial, sans-serif;
        }
        .container {
            padding: 10px;
        }
        .img-header {
            display: flex;
        }
        .info-passageiro {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            background: green;
        }
    </style>
</head>
<body>

    <div class="container">

        <div class="img-header">
            {{-- <img src="{{ asset('storage/agencias/macon.png') }}" alt="Logo da Macon"> --}}
        </div>

        <div class="info-passageiro">
            <div>
                <span>Passageiro</span> <br>
                <span>Milagres Junior</span>
            </div>
            <div>
                <span>Documento</span> <br>
                <span>1234567-8</span>
            </div>
        </div>

        <div class="info-rotas">
            <div class="origem">
                <p><i class="fa fa-map-marker"></i> <span>Origem</span> Luanda</p>
                <p><span>Embarque</span> Terminal do kikolo</p>
            </div>
            <div class="destino">
                <p><i class="fa fa-flag"></i> <span>Destino</span> Lubango</p>
                <p><span>Desembarque</span> Terminal do luvo</p>
            </div>
        </div>
        <div class="info-times">
            <div class="date">
                <h4>Data</h4>
                <p>Quinta, 24 de Setembro</p>
            </div>
            <div class="hora-partida">
                <h4>Hora de Partida</h4>
                <p>12:00</p>
            </div>
            <div class="hora-chegada">
                <h4>Hora de Chegada</h4>
                <p>19:00</p>
            </div>
        </div>
        <div class="rota">
            <h4>Rota</h4>
            <p>Luanda - Lubango</p>
        </div>
        <div class="assento">
            <div class="poltrona">
                <h4>Poltrona</h4>
                <p><i class="fa fa-laptop"></i> 54</p>
            </div>
            <div class="classe-poltrona">
                <h4>Tipo de Poltrona</h4>
                <p>Semi-Leito</p>
            </div>
        </div>
        <div class="info-agencia">
            <h4>Agência</h4>
            <p>Macon</p>
        </div>

    </div>
    
</body>
</html>