<?php

namespace App\Http\Controllers;

// use PDF;
// use Dompdf\Dompdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use mPDF;
use ZipArchive;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

// use Dompdf\Options;

class BilheteController extends Controller
{
    public function gerarBilhete() {

        $data = [
            'name' => 'John Simon',
            'email' => 'john@example.com',
        ];
        $content = 'Outro texto...';
        $data['qrcode'] = QrCode::format('png')->size(200)->generate($content);
        // $pdf = \PDF::loadView('bilhete', $data);

        // return $pdf->download('user_info2.pdf');
        $html = view('bilhete',$data)->render();
        // $html = '<h1>Meu PDF com Mpdf</h1>';//View::make('bilhete')->render();
        // $html .= "<img src='file:///home/milagresjr/Documentos/destino/public/img/agencias/huambo-expresso.png' style='width: 150px; height: 150px;'>";
        
        $pdf = new \Mpdf\Mpdf([
            'format' => 'A6',
            'mode' => 'utf-8',
            'margin_left' => 2,
            'margin_right' => 2,
            'margin_top' => 10,
            'margin_bottom' => 10
        ]);
        // $pdf->SetMargins(0,0,0,0);
        $pdf->WriteHTML($html);

        return $pdf->Output();

        // $dompdf = new Dompdf();

        // $imagePath = public_path('img/mapa-onibus.png');

        // // $dompdf->setHttpContext(fopen('file:///home/milagresjr/Documentos/destino/public/img/agencias/huambo-expresso.png','r'));
        // // [
        // //     'isHtml5ParserEnabled' => true,
        // //     'isPhpEnable' => true,
        // //     'isRemoteEnabled' => true,
        // //     'base_path' => public_path()
        // // ]
        // // $dompdf->set_option('enable_remote',true);
        // $dados = "<h1>Celke - Gerar PDF com PHP</h1>";

       // // $dados .= "<img src='data:image/png;base64,'".base64_encode(file_get_contents($imagePath))."' style='width: 150px; height: 150px;'>";
        // // $dados .= "<img src='http://localhost:8000/img/agencias/huambo-expresso.png'>";

        // $dompdf->loadHtml($html);
        // $dompdf->setPaper('A6','portrait');
        // $dompdf->render();
        // $output = $dompdf->output();

        // $dompdf->stream('documentPDF.pdf');

        // dd($dados);

        // return $dados;

        // return response($output, 200)->header('Content-Type','application/pdf');

    }

    public function downloadBilhete($codeReserva) {

        /*$data['reservas'] */ 
        $reservas = \DB::select("SELECT r.codigo_reserva,r.viagem_id,r.preco_total,r.numero_poltrona,r.nome_passageiro,r.idade_passageiro 
        FROM reservas r JOIN clients c ON r.client_id=c.id WHERE r.codigo_reserva = '$codeReserva'");
        
        $idViagem = $reservas[0]->viagem_id;

        $zip = new ZipArchive();
        $zipFileName = 'multiple_pdfs.zip';

        if ($zip->open($zipFileName, ZipArchive::CREATE | ZipArchive::OVERWRITE) !== true) {
            return "Erro ao criar o arquivo ZIP.";
        }

        foreach ($reservas as $key => $value) {
           $data = [];
            // ,ter1.nome AS terminal_partida,ter2.nome AS terminal_desino
           $infoViagem = \DB::select("SELECT d1.nome AS provi_partida, d2.nome AS provi_destino,t.id AS idViagem,
           r.local_partida,r.local_destino,t.data_partida,t.hora_partida,t.preco_bilhete,r.agencia_id,a.nome,
           a.logo AS fotoAgencia FROM destinos d1 INNER JOIN routes r ON d1.id=r.local_partida INNER JOIN destinos d2 
           ON d2.id=r.local_destino 
           INNER JOIN travels t ON t.rota=r.id INNER JOIN agencias a ON r.agencia_id=a.id WHERE t.id=$idViagem
           ");

           $content = $codeReserva;
           $data['qrcode'] = QrCode::format('png')->size(200)->generate($content);
        
           /** INFO DO PASSAGEIRO */
           $data['nome_passageiro'] = $value->nome_passageiro;
           $data['idade_passageiro'] = $value->idade_passageiro;
           $data['numero_poltrona'] = $value->numero_poltrona;
           $data['codigo_reserva'] = $value->codigo_reserva;
       
            /** INFO DA VIAGEM */
           $data['provi_partida'] = $infoViagem[0]->provi_partida;
           $data['provi_destino'] = $infoViagem[0]->provi_destino;
           $data['data_partida'] = $infoViagem[0]->data_partida;
           $data['hora_partida'] = $infoViagem[0]->hora_partida;
           $data['rota'] = $data['provi_partida'].' - '.$data['provi_destino'];
           $data['nome_agencia'] = $infoViagem[0]->nome;
           $data['foto_agencia'] = $infoViagem[0]->fotoAgencia;

           $html = view('bilhete',$data)->render();
        
           $pdf = new \Mpdf\Mpdf([
                'format' => 'A6',
                'mode' => 'utf-8',
                'margin_left' => 2,
                'margin_right' => 2,
                'margin_top' => 10,
                'margin_bottom' => 10
           ]);

           $pdf->WriteHTML($html);

            // Gere o nome de arquivo para o PDF
            $pdfFileName = "bilhete-passag_$key";

            // Gere o conteúdo do PDF em uma variável
            $pdfContent = $pdf->output($pdfFileName.'.pdf', 'S');

            // Adicione o PDF ao arquivo ZIP
            $zip->addFromString($pdfFileName.'.pdf',$pdfContent);

            //return $pdf->Output('bilhete.pdf', 'D');

        }

        // Feche o arquivo ZIP
        $zip->close();

        // Configure os cabeçalhos para o download do arquivo ZIP
        header('Content-Type: application/zip');
        header("Content-Disposition: attachment; filename=\"$zipFileName\"");
        header('Content-Length: ' . filesize($zipFileName));

        // Envie o arquivo ZIP para o navegador
        readfile($zipFileName);

        // Exclua o arquivo ZIP após o download
        unlink($zipFileName);

        return "Download de múltiplos PDFs concluído!";

    }
}
