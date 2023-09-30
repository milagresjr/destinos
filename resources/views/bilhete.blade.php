<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bilhete Digital</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            /* outline: 0px solid #000; */
        }
        body {
            /* background: red; */
            font-family: Arial, sans-serif;
            font-size: 11pt;
        }
        .container {
            padding: 10px;
        }
        table tr td{
            /* background: red; */
            height: 5px;
            padding: 5px;
            /* border-bottom: 1px solid #000; */
        }
    </style>
</head>
<body>

    <div class="container">

        <table style="border: 0px solid #000; width: 100%;">

            <tr class="img-header" style="border: 0px solid #000">
                <td>
                    <img src="file:///home/milagresjr/Documentos/destino/public/img/agencias/huambo-expresso.png" style="width: 100px;" />
                </td>
            </tr>
    
            <tr class="info-passageiro" style="width: 100%;">
                <td colspan="1" style="border: 0px solid #000; width: 50%;">
                    <h5>Passageiro</h5>
                    <p>{{ $nome_passageiro }}</p>
                </td>
            
                <td colspan="2" style="border: 0px solid #000; width: 50%; text-align: right;">
                    <h5>Documento</h5>
                    <p>1234567-8</p>    
                </td>
            </tr>
            
    
            <tr class="info-rotas">
                <td colspan="3" class="origem" style="border: 0px solid #000">
                    <p><i class="fa fa-map-marker"></i> <span style="font-weight: bold;">Origem</span> Luanda</p>
                    <p><span style="font-weight: bold;">Embarque</span> Terminal do kikolo</p>
                </td>
            </tr>
            <tr class="info-rotas">
                <td colspan="3" class="destino" style="border: 0px solid#000">
                    <p><i class="fa fa-flag"></i> <span style="font-weight: bold;">Destino</span> Lubango</p>
                    <p><span style="font-weight: bold;">Desembarque</span> Terminal do luvo</p>
                </td>
            </tr>
            <tr class="info-times" style="width: 100%; margin: 20px 0;">
                <td colspan="1" class="date" style="border: 0px solid #000; width: 33%">
                    <h5>Data</h5>
                    <p>Quinta, 24 de Setembro</p>
                </td>
                <td colspan="2" class="hora-partida" style="border: 0px solid #000; width: 33%; text-align: right;">
                    <h5>Hora</h5>
                    <p>12:00</p>
                </td>
            </tr>
            <tr class="rota">
                <td colspan="3" style="border: 0px solid #000">
                <h5>Rota</h5>
                <p>Luanda - Lubango</p>
                </td>
            </tr>
            <tr class="assento">
                <td class="poltrona" style="border: 0px solid #000">
                    <h5>Poltrona</h5>
                    <p><i class="fa fa-laptop"></i> 54</p>
                </td>
                <td colspan="2" class="classe-poltrona" style="border: 0px solid #000; text-align: right;">
                    <h5>Tipo de Poltrona</h5>
                    <p>Semi-Leito</p>
                </td>
            </tr>
            <tr class="info-agencia">
                <td colspan="3" style="border: 0px solid #000">
                    <h5>Agência</h5>
                    <p>Huambo-expresso</p>
                </td>
            </tr>

        </table>
        <hr>

        <div style="text-align: center;">
            <img src="data:image/png;base64,{{ base64_encode($qrcode) }}" style="width: 60px; height: 60px;" alt="Qr code">
        </div>
    </div>
    
</body>
</html>