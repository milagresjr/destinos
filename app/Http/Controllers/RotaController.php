<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RotaController extends Controller
{
    public function index() {
        $data = [];
        $data["rotas"] = DB::select("SELECT d1.nome AS local_partida, d2.nome AS local_destino, d1.id AS idPartida, d2.id AS idDestino FROM routes r INNER JOIN destinos d1 ON d1.id=r.local_partida 
        INNER JOIN destinos d2 ON d2.id=r.local_destino GROUP BY d1.nome,d2.nome,d1.id,d2.id");
        return view('rotas',$data);
    }
}
