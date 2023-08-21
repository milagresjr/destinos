<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reserva;

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
        for($i=1; $i<=$qtdPass; $i++)
        {
            $nomePassageiro = $request->input("nome_passageiro$i");
            $numPoltrona = $request->input("num_poltrona$i");
            $precoTotal = $request->input("precoTotal");
            $idade = $request->input("idade$i");
            $idCliente = \Auth::guard('client')->user()->id;
            $idViagem = $request->input("idViagem");

            $insert = Reserva::create([
                'nome_passageiro'=>$nomePassageiro,
                'numero_poltrona'=>$numPoltrona,
                'idade'=>$idade,
                'preco_total'=>$precoTotal,
                'client_id'=>$idCliente,
                'viagem_id'=>$idViagem
            ]);
        }

        if($insert)
        {
            return redirect()->route("home");
        }else{
            return "Nao cadastrado!";
        }

    }
}
