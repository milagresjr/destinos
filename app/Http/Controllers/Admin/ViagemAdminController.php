<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\RotaAdmin;
use App\Models\Admin\TerminalAdmin;
use App\Models\Admin\ViagemAdmin;
use Illuminate\Http\Request;

class ViagemAdminController extends Controller
{
    public function index() {

        $data = [];

        $data['viagem'] = \DB::select("SELECT d1.nome AS provi_partida, d2.nome AS provi_destino, t.id AS idViagem, 
        t.preco_bilhete, t.data_partida, t.hora_partida, t.hora_chegada, r.local_partida, r.local_destino, 
        a.nome AS nomeAgencia, te1.nome AS terminalPartida, te2.nome AS terminalChegada FROM destinos d1 
        INNER JOIN routes r ON d1.id=r.local_partida INNER JOIN destinos d2 ON d2.id=r.local_destino 
        INNER JOIN travels t ON t.rota=r.id INNER JOIN agencias a ON a.id=r.agencia_id 
        INNER JOIN terminais te1 ON te1.id=t.terminal_partida 
        INNER JOIN terminais te2 ON te2.id=t.terminal_chegada ORDER BY t.id DESC");

        $data['rotas'] = \DB::select("SELECT r.id, d1.nome AS provi_partida, d2.nome AS provi_destino, a.nome AS nomeAgencia 
        FROM routes r INNER JOIN destinos d1 ON r.local_partida=d1.id 
        INNER JOIN destinos d2 ON r.local_destino=d2.id 
        INNER JOIN agencias a ON r.agencia_id=a.id ORDER BY r.id");
        $data['agencias'] = \DB::select("SELECT * FROM agencias");

        $data['terminais'] = \DB::select("SELECT t.id, t.nome AS nomeTerminal, a.nome AS nomeAgencia FROM terminais t INNER JOIN agencias a ON t.agencia_id=a.id");

        return view('admin.viagem-admin',$data);
    }

    public function store(Request $request) {

        $rota = $request->rota;
        $preco = $request->preco;
        $dataViagem = $request->data_viagem;
        $agencia = $request->agencia;
        $horaPartida = $request->hora_partida;
        $horaChegada = $request->hora_chegada;
        $terminalPartida = $request->terminal_partida;
        $terminalChegada = $request->terminal_chegada;

        // dd($horaChegada);
        $create = ViagemAdmin::create([
            'rota' => $rota,
            'preco_bilhete' => $preco,
            'data_partida' => $dataViagem,
            'hora_partida' => $horaPartida,
            'hora_chegada' => $horaChegada,
            'agencia_id' => $agencia,
            'terminal_partida' => $terminalPartida,
            'terminal_chegada' => $terminalChegada
        ]);

        return ($create) ? redirect()->route('admin.viagem.index')->with('success','Viagem cadastrada com sucesso!') : 
        redirect()->route('admin.viagem.index')->with('danger','Viagem não cadastrada!');

    }

    public function edit($id) {

        $viagem = \DB::select("SELECT d1.nome AS provi_partida, d2.nome AS provi_destino, t.id AS idViagem, 
        t.preco_bilhete, t.data_partida, t.hora_partida, t.hora_chegada, r.id AS idRota, r.local_partida, r.local_destino, a.id AS idAgencia,
        a.nome AS nomeAgencia, te1.id AS idTerminalPartida, te1.nome AS terminalPartida, te2.id AS idTerminalChegada, te2.nome AS terminalChegada FROM destinos d1 
        INNER JOIN routes r ON d1.id=r.local_partida INNER JOIN destinos d2 ON d2.id=r.local_destino 
        INNER JOIN travels t ON t.rota=r.id INNER JOIN agencias a ON a.id=r.agencia_id 
        INNER JOIN terminais te1 ON te1.id=t.terminal_partida 
        INNER JOIN terminais te2 ON te2.id=t.terminal_chegada WHERE t.id = $id");

        return response()->json($viagem);

    }

    public function update(Request $request, $id) {

        $newId = $request->id;
        $rota = $request->rota;
        $preco = $request->preco;
        $dataViagem = $request->data_viagem;
        $agencia = $request->agencia;
        $horaPartida = $request->hora_partida;
        $horaChegada = $request->hora_chegada;
        $terminalPartida = $request->terminal_partida;
        $terminalChegada = $request->terminal_chegada;

        $update = ViagemAdmin::where('id',$newId)->update([
            'rota' => $rota,
            'preco_bilhete' => $preco,
            'data_partida' => $dataViagem,
            'hora_partida' => $horaPartida,
            'hora_chegada' => $horaChegada,
            'agencia_id' => $agencia,
            'terminal_partida' => $terminalPartida,
            'terminal_chegada' => $terminalChegada
        ]);

        return ($update) ? redirect()->route('admin.viagem.index')->with('success','Viagem alterada com sucesso!') : 
        redirect()->route('admin.viagem.index')->with('danger','Viagem não alterada!');

    }

    public function destroy(Request $request, $id) {

        $newId = $request->id;

        $delete = ViagemAdmin::where('id',$newId)->delete();

        return ($delete) ? redirect()->route('admin.viagem.index')->with('success','Viagem excluída com sucesso!') : 
        redirect()->route('admin.viagem.index')->with('danger','Viagem não excluída!');

    }
}
