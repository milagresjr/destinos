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
        // $data['destinos'] = \DB::select("SELECT p.nome AS provi_1, p2.nome AS provi_2,v.data_partida,v.hora_partida,v.preco_bilhete,v.agencia_id,a.nome,a.logo AS fotoAgencia FROM provincias p INNER JOIN viagens v ON p.id=v.ponto_partida INNER JOIN provincias p2 ON p2.id=v.destino INNER JOIN agencias a ON v.agencia_id=a.id WHERE v.ponto_partida=$p_inicial AND v.destino=$destino LIMIT 1");
        
        // $data['viagem_info'] = \DB::select("SELECT p.nome AS provi_partida, p2.nome AS provi_destino,v.data_partida,v.hora_partida,v.preco_bilhete,v.agencia_id,a.nome,a.logo AS fotoAgencia FROM provincias p INNER JOIN viagens v ON p.id=v.ponto_partida INNER JOIN provincias p2 ON p2.id=v.destino INNER JOIN agencias a ON v.agencia_id=a.id WHERE v.ponto_partida=$p_inicial AND v.destino=$destino");
       
        $data["viagem_info"] = \DB::select("SELECT d1.nome AS provi_partida, d2.nome AS provi_destino, t.rota AS idRota, 
        t.data_partida, t.hora_partida, t.hora_chegada, t.preco_bilhete, routes.local_partida, routes.local_destino, 
        agencias.nome AS agencia, agencias.id AS idAgencia, agencias.logo AS logoAgencia FROM destinos d1 
        INNER JOIN routes ON d1.id=routes.local_partida INNER JOIN destinos d2 ON d2.id=routes.local_destino 
        INNER JOIN travels t ON t.rota=routes.id INNER JOIN agencias ON agencias.id=routes.agencia_id 
        WHERE routes.local_partida=$p_inicial AND routes.local_destino=$destino");
       
       if($data["viagem_info"]){

            $nomeProviPartida = $data['viagem_info'][0]->provi_partida;
            $nomeProviDestino = $data['viagem_info'][0]->provi_destino;

            $rotas = \DB::select("SELECT travels.data_partida,routes.local_partida,routes.local_destino FROM travels 
            INNER JOIN routes ON travels.rota=routes.id 
            WHERE routes.local_partida = $p_inicial AND routes.local_destino = $destino ORDER BY travels.data_partida");
            
            $ultima_data = $rotas[0]->data_partida;

            return redirect("search/passagem/param/$nomeProviPartida/$nomeProviDestino/$ultima_data");
        } else {

            return back()->with('sessionSemViagem','De momento estamos sem viagem marcada para esta rota');

        }     
        
       // DB::select("SELECT * FROM viagens WHERE data_partida")

        //$data['passagens'] = Viagem::where('ponto_partida',$p_inicial,'AND','destino',$destino)->get();
        // $data['datas'] = \DB::select("SELECT DISTINCT data_partida FROM viagens WHERE ponto_partida=$partindo_id AND destino=$indo_id ORDER BY data_partida");
        
        //return view('viagens',$data);
        //return redirect()->route("search_passagem_com_param",[]);
    }

    public function search(Request $request)
    {
        $rota = str_replace(" ","",$request->input('rota'));
        $rotaArray = explode("-",$rota);
        // dd($rotaArray);
        $partindo =  $rotaArray[0]; //Input::get('partindo_de');
        $indo = $rotaArray[1]; //$Input::get('indo_para');
        $dataPartida = strtotime($request->input('data')); //Input::get('data');

        return $this->sendSeacrhPage($partindo,$indo,$dataPartida);

    }

    public function searchComParametro($partindo_de, $indo_para, $data_passagem)
    {
        $partindo =  $partindo_de;
        $indo = $indo_para;
        $dataPartida = strtotime($data_passagem); //Input::get('data');

        return $this->sendSeacrhPage($partindo,$indo,$dataPartida);
    }

    public function sendSeacrhPage($partindo, $indo, $dataPartida) {

        $partindo_id = DB::table("destinos")->where('nome','=',$partindo)->get()[0]->id;
        $indo_id = DB::table("destinos")->where('nome','=',$indo)->get()[0]->id;

        $dataFormatada = date('Y-m-d',$dataPartida);

        //dd($dataFormatada);
        
        $data = [];
        
        $data['destinos'] = \DB::select("SELECT d1.nome AS provi_1, d2.nome AS provi_2,t.data_partida,r.local_partida,
        r.local_destino,t.hora_partida,t.hora_chegada,t.preco_bilhete,r.agencia_id,a.nome,a.logo AS fotoAgencia 
        FROM destinos d1 INNER JOIN routes r ON d1.id=r.local_partida INNER JOIN destinos d2 ON d2.id=r.local_destino 
        INNER JOIN travels t ON r.id=t.rota INNER JOIN agencias a ON r.agencia_id=a.id 
        WHERE r.local_partida=$partindo_id AND r.local_destino=$indo_id AND t.data_partida='$dataFormatada'");
        
        $data['viagem_info'] = \DB::select("SELECT d1.nome AS provi_partida, d2.nome AS provi_destino,t.id AS idViagem,
        r.local_partida,r.local_destino,t.data_partida,t.hora_partida,t.hora_chegada,t.preco_bilhete,r.agencia_id,
        a.nome AS nomeAgencia,a.logo AS fotoAgencia FROM destinos d1 INNER JOIN routes r ON d1.id=r.local_partida 
        INNER JOIN destinos d2 ON d2.id=r.local_destino INNER JOIN travels t ON t.rota=r.id 
        INNER JOIN agencias a ON r.agencia_id=a.id 
        WHERE r.local_partida=$partindo_id AND r.local_destino=$indo_id AND t.data_partida='$dataFormatada'");
    
        $data['viagem_info_pra_datas'] = \DB::select("SELECT d1.nome AS provi_partida, d2.nome AS provi_destino,t.id AS idViagem,
        r.local_partida,r.local_destino,t.data_partida,t.hora_partida,t.hora_chegada,t.preco_bilhete,r.agencia_id,
        a.nome AS nomeAgencia,a.logo AS fotoAgencia FROM destinos d1 INNER JOIN routes r ON d1.id=r.local_partida 
        INNER JOIN destinos d2 ON d2.id=r.local_destino INNER JOIN travels t ON t.rota=r.id 
        INNER JOIN agencias a ON r.agencia_id=a.id 
        WHERE r.local_partida=$partindo_id AND r.local_destino=$indo_id AND t.data_partida='$dataFormatada'");
    
        $data['datas'] = \DB::select("SELECT DISTINCT t.data_partida FROM travels t INNER JOIN routes r ON t.rota=r.id WHERE r.local_partida=$partindo_id AND r.local_destino=$indo_id ORDER BY t.data_partida ASC");

        $data["rotas"] = \DB::select("SELECT d1.nome AS local_partida, d2.nome AS local_destino FROM routes r INNER JOIN destinos d1 ON d1.id=r.local_partida INNER JOIN destinos d2 ON d2.id=r.local_destino GROUP BY d1.nome,d2.nome");

        $data['agencias'] = \DB::select("SELECT * FROM agencias");

        return view('search',$data);
    }

    public function filter(Request $request) {

        $minValue = $request->min_value;
        $maxValue = $request->max_value;
        $agencia = $request->agencia_filtro;
        $partindo = $request->partindo_de;
        $indo = $request->indo_para;
        $dataFormatada = $request->data;

        // dd($partindo);

        $partindo_id = DB::table("destinos")->where('nome','=',$partindo)->get()[0]->id;
        $indo_id = DB::table("destinos")->where('nome','=',$indo)->get()[0]->id;

        // $dataFormatada = date('Y-m-d',$dataPartida);

        //dd($dataFormatada);
        
        $data = [];
        
        if($agencia){
            // dd("NULL");
            $data['destinos'] = \DB::select("SELECT d1.nome AS provi_1, d2.nome AS provi_2,t.data_partida,r.local_partida,
            r.local_destino,t.hora_partida,t.hora_chegada,t.preco_bilhete,r.agencia_id,a.nome,a.logo AS fotoAgencia 
            FROM destinos d1 INNER JOIN routes r ON d1.id=r.local_partida INNER JOIN destinos d2 ON d2.id=r.local_destino 
            INNER JOIN travels t ON r.id=t.rota INNER JOIN agencias a ON r.agencia_id=a.id 
            WHERE r.local_partida=$partindo_id AND r.local_destino=$indo_id AND t.data_partida='$dataFormatada' AND (t.preco_bilhete >= $minValue AND t.preco_bilhete <= $maxValue) AND r.agencia_id=$agencia");
            
            $data['viagem_info'] = \DB::select("SELECT d1.nome AS provi_partida, d2.nome AS provi_destino,t.id AS idViagem,
            r.local_partida,r.local_destino,t.data_partida,t.hora_partida,t.hora_chegada,t.preco_bilhete,r.agencia_id,
            a.nome AS nomeAgencia,a.logo AS fotoAgencia FROM destinos d1 INNER JOIN routes r ON d1.id=r.local_partida 
            INNER JOIN destinos d2 ON d2.id=r.local_destino INNER JOIN travels t ON t.rota=r.id 
            INNER JOIN agencias a ON r.agencia_id=a.id 
            WHERE r.local_partida=$partindo_id AND r.local_destino=$indo_id AND t.data_partida='$dataFormatada' AND (t.preco_bilhete >= $minValue AND t.preco_bilhete <= $maxValue) AND r.agencia_id=$agencia");

            
            $data['viagem_info_pra_datas'] = \DB::select("SELECT d1.nome AS provi_partida, d2.nome AS provi_destino,t.id AS idViagem,
            r.local_partida,r.local_destino,t.data_partida,t.hora_partida,t.hora_chegada,t.preco_bilhete,r.agencia_id,
            a.nome AS nomeAgencia,a.logo AS fotoAgencia FROM destinos d1 INNER JOIN routes r ON d1.id=r.local_partida 
            INNER JOIN destinos d2 ON d2.id=r.local_destino INNER JOIN travels t ON t.rota=r.id 
            INNER JOIN agencias a ON r.agencia_id=a.id 
            WHERE r.local_partida=$partindo_id AND r.local_destino=$indo_id AND t.data_partida='$dataFormatada' AND (t.preco_bilhete >= $minValue AND t.preco_bilhete <= $maxValue) AND r.agencia_id=$agencia");


            } else {
            // dd("NOT NULL");
            $data['destinos'] = \DB::select("SELECT d1.nome AS provi_1, d2.nome AS provi_2,t.data_partida,r.local_partida,
            r.local_destino,t.hora_partida,t.hora_chegada,t.preco_bilhete,r.agencia_id,a.nome,a.logo AS fotoAgencia 
            FROM destinos d1 INNER JOIN routes r ON d1.id=r.local_partida INNER JOIN destinos d2 ON d2.id=r.local_destino 
            INNER JOIN travels t ON r.id=t.rota INNER JOIN agencias a ON r.agencia_id=a.id 
            WHERE r.local_partida=$partindo_id AND r.local_destino=$indo_id AND t.data_partida='$dataFormatada' AND (t.preco_bilhete >= $minValue AND t.preco_bilhete <= $maxValue)");
            
            $data['viagem_info'] = \DB::select("SELECT d1.nome AS provi_partida, d2.nome AS provi_destino,t.id AS idViagem,
            r.local_partida,r.local_destino,t.data_partida,t.hora_partida,t.hora_chegada,t.preco_bilhete,r.agencia_id,
            a.nome AS nomeAgencia,a.logo AS fotoAgencia FROM destinos d1 INNER JOIN routes r ON d1.id=r.local_partida 
            INNER JOIN destinos d2 ON d2.id=r.local_destino INNER JOIN travels t ON t.rota=r.id 
            INNER JOIN agencias a ON r.agencia_id=a.id 
            WHERE r.local_partida=$partindo_id AND r.local_destino=$indo_id AND t.data_partida='$dataFormatada' AND (t.preco_bilhete >= $minValue AND t.preco_bilhete <= $maxValue)");

            $data['viagem_info_pra_datas'] = \DB::select("SELECT d1.nome AS provi_partida, d2.nome AS provi_destino,t.id AS idViagem,
            r.local_partida,r.local_destino,t.data_partida,t.hora_partida,t.hora_chegada,t.preco_bilhete,r.agencia_id,
            a.nome AS nomeAgencia,a.logo AS fotoAgencia FROM destinos d1 INNER JOIN routes r ON d1.id=r.local_partida 
            INNER JOIN destinos d2 ON d2.id=r.local_destino INNER JOIN travels t ON t.rota=r.id 
            INNER JOIN agencias a ON r.agencia_id=a.id 
            WHERE r.local_partida=$partindo_id AND r.local_destino=$indo_id AND t.data_partida='$dataFormatada' AND (t.preco_bilhete >= $minValue AND t.preco_bilhete <= $maxValue)");

            }

            $data['datas'] = \DB::select("SELECT DISTINCT t.data_partida FROM travels t INNER JOIN routes r ON t.rota=r.id WHERE r.local_partida=$partindo_id AND r.local_destino=$indo_id ORDER BY t.data_partida ASC");

            $data["rotas"] = \DB::select("SELECT d1.nome AS local_partida, d2.nome AS local_destino FROM routes r INNER JOIN destinos d1 ON d1.id=r.local_partida INNER JOIN destinos d2 ON d2.id=r.local_destino GROUP BY d1.nome,d2.nome");

            $data['agencias'] = \DB::select("SELECT * FROM agencias");

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
        
        // $data['viagem'] = \DB::select("SELECT p.nome AS provi_partida, p2.nome AS provi_destino,v.id AS idViagem,v.ponto_partida,v.destino,v.data_partida,v.hora_partida,v.preco_bilhete,v.agencia_id,a.nome,a.logo AS fotoAgencia FROM provincias p INNER JOIN viagens v ON p.id=v.ponto_partida INNER JOIN provincias p2 ON p2.id=v.destino INNER JOIN agencias a ON v.agencia_id=a.id WHERE v.id=$idViagem");
        
        $data['viagem'] = \DB::select("SELECT d1.nome AS provi_partida, d2.nome AS provi_destino,t.id AS idViagem,
        r.local_partida,r.local_destino,t.data_partida,t.hora_partida,t.preco_bilhete,r.agencia_id,a.nome,
        a.logo AS fotoAgencia FROM destinos d1 INNER JOIN routes r ON d1.id=r.local_partida INNER JOIN destinos d2 
        ON d2.id=r.local_destino 
        INNER JOIN travels t ON t.rota=r.id INNER JOIN agencias a ON r.agencia_id=a.id WHERE t.id=$idViagem");

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
        // $data['viagem'] = \DB::select("SELECT p.nome AS provi_partida, p2.nome AS provi_destino,v.id AS idViagem,v.ponto_partida,v.destino,v.data_partida,v.hora_partida,v.preco_bilhete,v.agencia_id,a.nome,a.logo AS fotoAgencia FROM provincias p INNER JOIN viagens v ON p.id=v.ponto_partida INNER JOIN provincias p2 ON p2.id=v.destino INNER JOIN agencias a ON v.agencia_id=a.id WHERE v.id=$idViagem");
        
        $data['viagem'] = \DB::select("SELECT d1.nome AS provi_partida, d2.nome AS provi_destino,t.id AS idViagem,
        r.local_partida,r.local_destino,t.data_partida,t.hora_partida,t.hora_chegada,t.preco_bilhete,r.agencia_id,a.nome,
        a.logo AS fotoAgencia FROM destinos d1 INNER JOIN routes r ON d1.id=r.local_partida INNER JOIN destinos d2 
        ON d2.id=r.local_destino 
        INNER JOIN travels t ON t.rota=r.id INNER JOIN agencias a ON r.agencia_id=a.id WHERE t.id=$idViagem");
        
        $data['poltronas'] = $novoArray;

        $arrayDecodificado = json_decode(urldecode($arrayP));
        $data['arrayDecode'] = $arrayDecodificado;
        $data['precoTotal'] = $preco;
        $data['idViagem'] = $idViagem;

        return view("checkout",$data);
    }
}
