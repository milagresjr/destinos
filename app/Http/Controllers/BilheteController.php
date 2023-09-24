<?php

namespace App\Http\Controllers;

// use PDF;
// use Dompdf\Dompdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use mPDF;
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
}
