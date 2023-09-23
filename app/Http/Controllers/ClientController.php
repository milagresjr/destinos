<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Viagem;

class ClientController extends Controller
{
    public function cadastrar(Request $request)
    {
        $nome = $request->nome;
        $email = $request->email;
        $telefone = $request->telefone;
        $senha = bcrypt($request->senha1);
        //$senha = \Hash::make($request->senha1);
        $senha2 = bcrypt($request->senha2);
        //if($senha != $senha2)
          //  return redirect()->back()->with('As senhas n�o correspondem!');
       // dd("stop");
        $create = Client::create([
            'nome' => $nome,
            'email' => $email,
            'telefone' => $telefone,
            'senha' => $senha
        ]);
        if($create)
        {
            //dd("Cadastro feito com sucesso!");
            return response()->json(['success'=>true]);
        }else{
            //dd("Cadastro nao feito!");
            return response()->json(['success'=>false]);
        }
    }

    public function logar(Request $request)
    {
        $email_tel = $request->email_tel;
        $senha = $request->senha;
        $credencias1 = ['email'=>$email_tel, 'password'=>$senha];
        $credencias2 = ['telefone'=>$email_tel, 'password'=>$senha];
        if(\Auth::guard('client')->attempt($credencias1) || \Auth::guard('client')->attempt($credencias2))
        {
            //LOGADO
            return response()->json(['success'=>true]);
        }else{
            //NÃO LOGADO
            return response()->json(['success'=>false]);
        }
    }

    public function logout()
    {
        \Auth::guard('client')->logout();
        return redirect()->route('home');
    }

    public function teste()
    {
        return view('teste');
       /* $t = "Junior Melquior";
        $n = "";
        $array = str_split($t);
        for($i=0;$i<=strlen($t)-1;$i++)
        {

           if($array[$i] != "")
            {
                $n = $n."".$array[$i];
            }
        }
        return $n;
    */
    }

    public function getApi() {

        $clients = Viagem::all();

        return $clients;

    }
}
