<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin\ReservaAdmin as Reserva;

class CheckoutController extends Controller
{
    public function index()
    {

    }

    public function store(Request $request)
    {
        //dd("oiii");
        $n = 2;
        $qtdPass = $request->input("qtdPassageiro");
        //dd($qtdPass);
        $codigoReserva = $this->gerarNewCode();
        // dd($codigoReserva);
        for($i=1; $i<=$qtdPass; $i++)
        {
            $nomePassageiro = $request->input("nome_passageiro$i");
            $numPoltrona = $request->input("num_poltrona$i");
            $precoViagem = $request->input("precoTotal");
            $idade = $request->input("idade$i");
            $idCliente = \Auth::guard('client')->user()->id;
            $idViagem = $request->input("idViagem");
            $formaPag = $request->input("forma-pag");
            $status = "Aguardando Pagamento";

            $precoTotal = $precoViagem * $qtdPass;
            
            // dd($codigoReserva);

            $insert = Reserva::create([
                'nome_passageiro'=>$nomePassageiro,
                'numero_poltrona'=>$numPoltrona,
                'idade_passageiro'=>$idade, 
                'preco_total'=> $precoTotal,
                'client_id'=>$idCliente,
                'viagem_id'=>$idViagem,
                'status' => $status,
                'codigo_reserva' => $codigoReserva
            ]);
        }

        if($insert)
        {
            // return redirect()->route("home");
            return view('finish');
        }else{
            return "Nao cadastrado!";
        }

    }

    public function gerarCodigo() {

        // $caracteres = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        $caracteres = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        $codigo = '';
        for($i=0; $i<=4; $i++) {

            $codigo .= $caracteres[rand(0,strlen($caracteres) -1)]; 

        }

        return $codigo;

    }

    public function gerarNewCode() {

        do {
            $code = $this->gerarCodigo();
        }while(Reserva::where('codigo_reserva',$code)->exists());

        return $code;

    }

    public function finishBuy() {

        return view('finish');

    }
}
