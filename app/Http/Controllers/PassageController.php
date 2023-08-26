<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Viagem;
use App\Models\SelecaoPoltronas;
use DB;

class PassageController extends Controller
{
    public function index($p_inicial,$destino)
    {
        $partindo_id = $p_inicial;
        $indo_id = $destino;
        //dd($p_inicial + " - " + $destino);
        
        $data = [];
        $data['destinos'] = \DB::select("SELECT p.nome AS provi_1, p2.nome AS provi_2,v.data_partida,v.hora_partida,v.preco_bilhete,v.agencia_id,a.nome,a.logo AS fotoAgencia FROM provincias p INNER JOIN viagens v ON p.id=v.ponto_partida INNER JOIN provincias p2 ON p2.id=v.destino INNER JOIN agencias a ON v.agencia_id=a.id WHERE v.ponto_partida=$p_inicial AND v.destino=$destino LIMIT 1");
        
        $data['viagem_info'] = \DB::select("SELECT p.nome AS provi_partida, p2.nome AS provi_destino,v.data_partida,v.hora_partida,v.preco_bilhete,v.agencia_id,a.nome,a.logo AS fotoAgencia FROM provincias p INNER JOIN viagens v ON p.id=v.ponto_partida INNER JOIN provincias p2 ON p2.id=v.destino INNER JOIN agencias a ON v.agencia_id=a.id WHERE v.ponto_partida=$p_inicial AND v.destino=$destino");
        $nomeProviPartida = $data['viagem_info'][0]->provi_partida;
        $nomeProviDestino = $data['viagem_info'][0]->provi_destino;

        $rotas = \DB::select("SELECT * FROM viagens WHERE ponto_partida = $p_inicial AND destino = $destino ORDER BY data_partida");
        $ultima_data = $rotas[0]->data_partida;
        
       // DB::select("SELECT * FROM viagens WHERE data_partida")

        //$data['passagens'] = Viagem::where('ponto_partida',$p_inicial,'AND','destino',$destino)->get();
        $data['datas'] = \DB::select("SELECT DISTINCT data_partida FROM viagens WHERE ponto_partida=$partindo_id AND destino=$indo_id ORDER BY data_partida");
        
        //return view('viagens',$data);
        return redirect()->route("search_passagem_com_param",[]);
        return redirect("search/passagem/param?partindo_de=$nomeProviPartida&indo_para=$nomeProviDestino&data=$ultima_data");
    }

    public function search(Request $request)
    {
        $rota = str_replace(" ","",$request->input('rota'));
        $rotaArray = explode("-",$rota);
        // dd($rotaArray);
        $partindo =  $rotaArray[0]; //Input::get('partindo_de');
        $indo = $rotaArray[1]; //$Input::get('indo_para');
        $dataPartida = strtotime($request->input('data')); //Input::get('data');

        $partindo_id = DB::table("provincias")->where('nome','=',$partindo)->get()[0]->id;
        $indo_id = DB::table("provincias")->where('nome','=',$indo)->get()[0]->id;

        $dataFormatada = date('Y-m-d',$dataPartida);

        $data = [];

        //dd($partindo_id);
        //$data['t'] = \DB::select("SELECT * FROM viagens");

        $data['destinos'] = \DB::select("SELECT p.nome AS provi_1, p2.nome AS provi_2,v.data_partida,v.ponto_partida,v.destino,v.hora_partida,v.hora_chegada,v.preco_bilhete,v.agencia_id,a.nome,a.logo AS fotoAgencia FROM provincias p INNER JOIN viagens v ON p.id=v.ponto_partida INNER JOIN provincias p2 ON p2.id=v.destino INNER JOIN agencias a ON v.agencia_id=a.id WHERE v.ponto_partida=$partindo_id AND v.destino=$indo_id AND v.data_partida='$dataFormatada' LIMIT 1");
        $data['viagem_info'] = \DB::select("SELECT p.nome AS provi_partida, p2.nome AS provi_destino,v.id AS idViagem,v.ponto_partida,v.destino,v.data_partida,v.hora_partida,v.hora_chegada,v.preco_bilhete,v.agencia_id,a.nome AS nomeAgencia,a.logo AS fotoAgencia FROM provincias p INNER JOIN viagens v ON p.id=v.ponto_partida INNER JOIN provincias p2 ON p2.id=v.destino INNER JOIN agencias a ON v.agencia_id=a.id WHERE v.ponto_partida=$partindo_id AND v.destino=$indo_id AND v.data_partida='$dataFormatada'");
        $data['viagem_info_pra_datas'] = \DB::select("SELECT p.nome AS provi_partida, p2.nome AS provi_destino,v.id AS idViagem,v.ponto_partida,v.destino,v.data_partida,v.hora_partida,v.hora_chegada,v.preco_bilhete,v.agencia_id,a.nome,a.logo AS fotoAgencia FROM provincias p INNER JOIN viagens v ON p.id=v.ponto_partida INNER JOIN provincias p2 ON p2.id=v.destino INNER JOIN agencias a ON v.agencia_id=a.id WHERE v.ponto_partida=$partindo_id AND v.destino=$indo_id AND v.data_partida='$dataFormatada' LIMIT 1");
        $data['datas'] = \DB::select("SELECT DISTINCT data_partida FROM viagens WHERE ponto_partida=$partindo_id AND destino=$indo_id ORDER BY data_partida ASC");
        //$data['passagens'] = \DB::select("SELECT * FROM viagens WHERE ponto_partida = $p_inicial AND destino = $destino");
        //$data['passagens'] = Viagem::where('ponto_partida',$p_inicial,'AND','destino',$destino)->get();
        return view('search',$data);
    }

    public function searchComParametro($partindo_de, $indo_para, $data_passagem)
    {
        $partindo =  $partindo_de;
        $indo = $indo_para;
        $dataPartida = strtotime($data_passagem); //Input::get('data');

        $partindo_id = DB::table("provincias")->where('nome','=',$partindo)->get()[0]->id;
        $indo_id = DB::table("provincias")->where('nome','=',$indo)->get()[0]->id;

        $dataFormatada = date('Y-m-d',$dataPartida);

        $data = [];

        //dd($partindo_id);
        //$data['t'] = \DB::select("SELECT * FROM viagens");

        $data['destinos'] = \DB::select("SELECT p.nome AS provi_1, p2.nome AS provi_2,v.data_partida,v.ponto_partida,v.destino,v.hora_partida,v.hora_chegada,v.preco_bilhete,v.agencia_id,a.nome,a.logo AS fotoAgencia FROM provincias p INNER JOIN viagens v ON p.id=v.ponto_partida INNER JOIN provincias p2 ON p2.id=v.destino INNER JOIN agencias a ON v.agencia_id=a.id WHERE v.ponto_partida=$partindo_id AND v.destino=$indo_id AND v.data_partida='$dataFormatada' LIMIT 1");
        $data['viagem_info'] = \DB::select("SELECT p.nome AS provi_partida, p2.nome AS provi_destino,v.id AS idViagem,v.ponto_partida,v.destino,v.data_partida,v.hora_partida,v.hora_chegada,v.preco_bilhete,v.agencia_id,a.nome AS nomeAgencia,a.logo AS fotoAgencia FROM provincias p INNER JOIN viagens v ON p.id=v.ponto_partida INNER JOIN provincias p2 ON p2.id=v.destino INNER JOIN agencias a ON v.agencia_id=a.id WHERE v.ponto_partida=$partindo_id AND v.destino=$indo_id AND v.data_partida='$dataFormatada'");
        $data['viagem_info_pra_datas'] = \DB::select("SELECT p.nome AS provi_partida, p2.nome AS provi_destino,v.id AS idViagem,v.ponto_partida,v.destino,v.data_partida,v.hora_partida,v.hora_chegada,v.preco_bilhete,v.agencia_id,a.nome,a.logo AS fotoAgencia FROM provincias p INNER JOIN viagens v ON p.id=v.ponto_partida INNER JOIN provincias p2 ON p2.id=v.destino INNER JOIN agencias a ON v.agencia_id=a.id WHERE v.ponto_partida=$partindo_id AND v.destino=$indo_id AND v.data_partida='$dataFormatada' LIMIT 1");
        $data['datas'] = \DB::select("SELECT DISTINCT data_partida FROM viagens WHERE ponto_partida=$partindo_id AND destino=$indo_id ORDER BY data_partida ASC");
        //$data['passagens'] = \DB::select("SELECT * FROM viagens WHERE ponto_partida = $p_inicial AND destino = $destino");
        //$data['passagens'] = Viagem::where('ponto_partida',$p_inicial,'AND','destino',$destino)->get();
        return view('search',$data);
    }

    public function escolher_poltrona($idViagem)
    {
        $data = [];
        //$data['poltronas']
        $arrayPoltronas = \DB::select("SELECT * FROM viagem_poltronas WHERE viagem_id = $idViagem");
        //dd($data['$poltronas'][4]);
        $novoArray = [];
        foreach($arrayPoltronas as $p){
         array_push($novoArray,$p->numero_poltrona);
        }
        $data['viagem'] = \DB::select("SELECT p.nome AS provi_partida, p2.nome AS provi_destino,v.id AS idViagem,v.ponto_partida,v.destino,v.data_partida,v.hora_partida,v.preco_bilhete,v.agencia_id,a.nome,a.logo AS fotoAgencia FROM provincias p INNER JOIN viagens v ON p.id=v.ponto_partida INNER JOIN provincias p2 ON p2.id=v.destino INNER JOIN agencias a ON v.agencia_id=a.id WHERE v.id=$idViagem");
        $data['poltronas'] = $novoArray;
        return view("passagem",$data);
    }

    public function armazenar_poltrona(Request $request)
    {
        $idViagem = $request->input('id_viagem');
        $poltrona = $request->input('numero_poltrona');
        $create = SelecaoPoltronas::create([
            'viagem_id' => $idViagem,
            'numero_poltrona' => $poltrona
        ]);
       if($create){
        return response()->json(['success'=>'Poltrona selecionadas!']);
       }
    }

    public function verificar_poltrona(Request $request)
    {
        $idViagem = $request->input('id_viagem');
        $poltrona = $request->input('numero_poltrona');

        $ver = SelecaoPoltronas::where('viagem_id',$idViagem)->where('numero_poltrona',$poltrona)->get();

        if(!$ver->isEmpty())
        {
            return response()->json(['res'=>true]);
        }else{
            return response()->json(['res'=>false]);
        } 
    }

    public function eliminar_poltrona($idViagem,$poltrona)
    {
        $del = SelecaoPoltronas::where('viagem_id',$idViagem)->where('numero_poltrona',$poltrona)->delete();

        if($del){
            return response()->json(['res'=>true]);
        }
    }

    public function checkout($idViagem,$preco,$arrayP)
    {
        $data = [];
        //$data['poltronas']
        $arrayPoltronas = \DB::select("SELECT * FROM viagem_poltronas WHERE viagem_id = $idViagem");
        //dd($data['$poltronas'][4]);
        $novoArray = [];
        foreach($arrayPoltronas as $p){
         array_push($novoArray,$p->numero_poltrona);
        }
        $data['viagem'] = \DB::select("SELECT p.nome AS provi_partida, p2.nome AS provi_destino,v.id AS idViagem,v.ponto_partida,v.destino,v.data_partida,v.hora_partida,v.preco_bilhete,v.agencia_id,a.nome,a.logo AS fotoAgencia FROM provincias p INNER JOIN viagens v ON p.id=v.ponto_partida INNER JOIN provincias p2 ON p2.id=v.destino INNER JOIN agencias a ON v.agencia_id=a.id WHERE v.id=$idViagem");
        $data['poltronas'] = $novoArray;

        $arrayDecodificado = json_decode(urldecode($arrayP));
        $data['arrayDecode'] = $arrayDecodificado;
        $data['precoTotal'] = $preco;
        $data['idViagem'] = $idViagem;

        return view("checkout",$data);
    }
}
