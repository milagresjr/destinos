<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\DestinoAdmin;
use App\Models\Admin\RotaAdmin;

class RotaAdminController extends Controller
{
    public function index() {

        $data = []; 
        $data['rotas'] = \DB::select("SELECT r.id, d1.nome AS provi_partida, d2.nome AS provi_destino, 
        a.nome AS nomeAgencia FROM routes r INNER JOIN destinos d1 ON d1.id=r.local_partida 
        INNER JOIN destinos d2 ON d2.id=r.local_destino 
        INNER JOIN agencias a ON a.id=r.agencia_id ORDER BY r.id DESC");

        $data['destinos'] = DestinoAdmin::all();
        $data['agencias'] = \DB::select("SELECT * FROM agencias");

        return view("admin.rota-admin",$data);

    }

    public function store(Request $request) {

        $partindo = $request->partindoDe;
        $indo = $request->indoPara;
        $agencia = $request->agencia;

        $create = RotaAdmin::create([
            'local_partida' => $partindo,
            'local_destino' => $indo,
            'agencia_id' => $agencia
        ]);

        return ($create) ? redirect()->route('admin.rota.index')->with('success', 'Rota cadastrada com sucesso!') :
        redirect()->route('admin.rota.index')->with('danger', 'Rota não cadastrada!');        

    }

    public function edit($id) {

        // $data = [];

        $rota = \DB::select("SELECT r.id, d1.id AS idLocalPartida, d1.nome AS provi_partida, d2.id AS idLocalDestino, d2.nome AS provi_destino, 
        a.id AS idAgencia, a.nome AS nomeAgencia FROM routes r INNER JOIN destinos d1 ON d1.id=r.local_partida 
        INNER JOIN destinos d2 ON d2.id=r.local_destino 
        INNER JOIN agencias a ON a.id=r.agencia_id WHERE r.id = $id");

        // $data['destinos'] = DestinoAdmin::all();

        // dd($data);
        return response()->json($rota);

    }

    public function update(Request $request, $id) {

          $newId = $request->id;
          $partindo = $request->partindoDe;
          $indo = $request->indoPara;
          $agencia = $request->agencia;
          
          $update = RotaAdmin::where('id',$newId)->update([
            'local_partida' => $partindo,
            'local_destino' => $indo,
            'agencia_id' => $agencia
          ]);

          return ($update) ? redirect()->route('admin.rota.index')->with('success', 'Rota alterada com sucesso!') : 
          redirect()->route('admin.rota.index')->with('danger','Rota não alterada!');

    }

    public function destroy(Request $request, $id) {

        $newId = $request->id;
        $delete = RotaAdmin::where('id',$newId)->delete();

        return ($delete) ? redirect()->route('admin.rota.index')->with('success', 'Rota excluida com sucesso!') : 
          redirect()->route('admin.rota.index')->with('danger','Rota não excluida!');
    }
}
