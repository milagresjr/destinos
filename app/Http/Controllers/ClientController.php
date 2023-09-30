<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Viagem;
use Illuminate\Hashing\BcryptHasher;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\Mailer;
use Symfony\Component\Mailer\Transport;


class ClientController extends Controller
{
    public function index() {
        
        $client = Auth::guard('client')->user();
        return view('myaccount', compact('client'));

    }

    public function passagens() {

        $data = [];
        $data['reservas'] = \DB::select("SELECT r.id,r.viagem_id,r.numero_poltrona,r.preco_total,r.nome_passageiro,r.idade_passageiro,r.status,r.created_at,c.nome AS nome_cliente 
        FROM reservas r JOIN clients c ON r.client_id=c.id");
        return view('mypassagens',$data);

    }

    public function editPerfil() {
        $id = Auth::guard('client')->user()->id;
        $client = Client::find($id)->get();
        // dd($client[0]->nome);
        return view('edit-perfil', compact('client'));
        
    }

    public function altSenha() {
        return view('alte-senha');
    }

    public function update(Request $request) {

        $idClient = Auth::guard('client')->user()->id;

        $request->validate([
            'nome' => 'string',
            'email' => 'string',
            'telefone' => 'numeric'
        ]);

        $nome = $request->nome;
        $email = $request->email;
        $telefone = $request->telefone;

        $update = Client::find($idClient)->update([
            'nome' => $nome,
            'email' => $email,
            'telefone' => $telefone
        ]);

        return ($update) ? back()->with('client-edit-success',' Sucesso! ')
        : back()->with('client-edit-danger','Error');

    }

    public function updateSenha(Request $request) {

        $client = Auth::guard('client')->user();

        $senhaAtual = $request->senha_atual;
        $senhaNova = $request->senha_nova;
        $confiSenhaNova = $request->confi_senha_nova;

        if(Hash::check($senhaAtual, $client->senha)) {
            
            if($senhaNova == $confiSenhaNova) {

                $update = Client::find($client->id)->update([
                    'senha' => bcrypt($senhaNova)
                ]);

                return ($update) ? back()->with('senha-edit-success',' Sucesso! ')
                : back()->with('senha-edit-danger','Error');

            } else {
                return back()->with('senhas-nao-correspondem',' Error! ');
            }

        } else {
                return back()->with('senha-atual-errada',' Error! ');
        }

    }

    public function cancelarPassagem($idReserva) {

        $update = \DB::table("reservas")->where('id',$idReserva)->update([
            'status' => 'Cancelado'
        ]);

        return ($update) ? back()->with('reserva-cancel','cancel')
        : back()->with('reserva-not-cancel','cancel');

    }

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

    public function send_mail() {

        try {
            $email = (new \Symfony\Component\Mime\Email())
                ->to('destinatario@example.com')
                ->subject('Olá, Mundo!')
                ->text('Olá, Mundo! Este é um email simples do Laravel.');
    
            $transport = Transport::fromDsn(config('mail.mailers.smtp.transport'));
            $mailer = new Mailer($transport);
            $mailer->send($email);
    
            return "Email enviado com sucesso!";
        } catch (TransportExceptionInterface $e) {
            return "Erro ao enviar o email: " . $e->getMessage();
        }

    }

    public function getApi() {

        $clients = Viagem::all();

        return $clients;

    }
}
