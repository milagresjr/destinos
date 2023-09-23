<?php

namespace App\Http\Controllers;

use App\Models\Agencia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AgenciaController extends Controller
{
    public function index() {
        $data = [];
        $data['agencias'] = Agencia::all();
        return view('agencia', $data);
    }

    public function show($id) {
        $data = [];
        $data['agencia'] = Agencia::find($id);
        $data['infoRotas'] = DB::select("SELECT d1.nome AS local_partida, d2.nome AS local_destino, d1.id AS idPartida, d2.id AS idDestino FROM routes r INNER JOIN destinos d1 ON d1.id=r.local_partida INNER JOIN destinos d2 ON d2.id=r.local_destino INNER JOIN agencias a ON r.agencia_id=a.id 
        WHERE (a.id = $id) GROUP BY d1.nome,d2.nome,d1.id,d2.id");
        $data['terminais'] = DB::select("SELECT t.nome AS nomeTerminal, a.id, d.nome AS nomeCidade FROM terminais t INNER JOIN agencias a ON t.agencia_id=a.id INNER JOIN destinos d ON t.destino_id=d.id WHERE a.id = $id");
        $data['outrasAgencias'] = DB::select("SELECT * FROM agencias WHERE id <> $id");
        return view('agencia-param',$data);
    }
}
