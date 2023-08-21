<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\{
    Viagem,
    Provincia
};

class HomeController extends Controller
{
    public function index()
    {
        //
        $data = [];
        //$data['viagens'] = Viagem::all();
        \DB::statement("SET SQL_MODE=''");
        $data['viagens'] = DB::select(DB::raw("SELECT viagens.destino as idDestino,viagens.preco_bilhete,provincias.foto,provincias.nome as destino FROM `viagens` JOIN provincias ON viagens.destino=provincias.id GROUP BY viagens.destino LIMIT 6"));
        //$data['viagens'] = Viagem::select('id','ponto_partida','destino')->groupBy("destino")->get();
        $data['provincias'] = [
            'Luanda', 'Bengo', 'Benguela', 'Bie', 'Cabinda', 'Cuando-cubango', 'Malanje', 'Namibe',
            'Cuanza-Norte', 'Cuanza-Sul', 'Lunda-Norte', 'Lunda-Sul', 'Moxico', 'Huambo', 'Huila', 'Uige', 'Zaire', 'Cunene'
        ];

        $data['rotas1'] = DB::select("SELECT DISTINCT p.nome AS provi_1, p2.nome AS provi_2, v.id, v.data_partida, v.ponto_partida AS idPartida, v.destino AS idDestino FROM provincias p INNER JOIN viagens v ON p.id=v.ponto_partida INNER JOIN provincias p2 ON p2.id=v.destino ORDER BY v.id LIMIT 3");
        $ultRota1 = $data['rotas1'][2]->id;
        $data['rotas2'] = DB::select("SELECT DISTINCT p.nome AS provi_1, p2.nome AS provi_2, v.id, v.data_partida, v.ponto_partida AS idPartida, v.destino AS idDestino FROM provincias p INNER JOIN viagens v ON p.id=v.ponto_partida INNER JOIN provincias p2 ON p2.id=v.destino WHERE v.id > $ultRota1 ORDER BY v.id LIMIT 3");
        $ultRota2 = $data['rotas2'][2]->id;
        $data['rotas3'] = DB::select("SELECT DISTINCT p.nome AS provi_1, p2.nome AS provi_2, v.id, v.data_partida, v.ponto_partida AS idPartida, v.destino AS idDestino FROM provincias p INNER JOIN viagens v ON p.id=v.ponto_partida INNER JOIN provincias p2 ON p2.id=v.destino WHERE v.id > $ultRota2 ORDER BY v.id LIMIT 3");

        $data['Rotasofertas'] = DB::select("SELECT p.nome AS provi_1, p2.nome AS provi_2, v.ponto_partida AS idPartida, v.destino AS idDestino, v.preco_bilhete,p.foto AS fotoProvi FROM provincias p INNER JOIN viagens v ON p.id=v.ponto_partida INNER JOIN provincias p2 ON p2.id=v.destino GROUP BY p.nome LIMIT 4");

        $data['destinos'] = DB::table("provincias")->get();

        return view('home', $data);
    }
}
