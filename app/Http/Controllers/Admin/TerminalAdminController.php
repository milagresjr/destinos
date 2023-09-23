<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\DestinoAdmin;
use App\Models\Admin\TerminalAdmin;
use Illuminate\Http\Request;

class TerminalAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];
        $data['terminais'] = \DB::select("SELECT t.nome AS nomeTerminal, t.id, a.nome AS nomeAgencia, d.nome AS nomeDestino 
        FROM terminais t INNER JOIN agencias a ON a.id=t.agencia_id INNER JOIN destinos d ON d.id=t.destino_id
        ORDER BY t.id DESC");

        $data['destinos'] = DestinoAdmin::all();
        $data['agencias'] = \DB::select("SELECT * FROM agencias");

        return view('admin.terminal-admin', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $local = $request->local;
        $destino = $request->provi_muni;
        $agencia = $request->agencia;

        $create = TerminalAdmin::create([
            'nome' => $local,
            'agencia_id' => $agencia,
            'destino_id' => $destino
        ]);

        return ($create) ? redirect()->route('admin.terminal.index')->with('success', 'Terminal cadastrado com sucesso!') :
        redirect()->route('admin.terminal.index')->with('danger', 'Terminal não cadastrado!');        

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $terminal = \DB::select("SELECT t.nome AS nomeTerminal, t.id, a.id AS idAgencia, a.nome AS nomeAgencia, d.id AS idDestino, d.nome AS nomeDestino 
        FROM terminais t INNER JOIN agencias a ON a.id=t.agencia_id INNER JOIN destinos d ON d.id=t.destino_id
        WHERE t.id = $id");
        return response()->json($terminal);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $newId = $request->id;
        $local = $request->local;
        $destino = $request->provi_muni;
        $agencia = $request->agencia;

        $update = TerminalAdmin::where('id',$newId)->update([
            'nome' => $local,
            'agencia_id' => $agencia,
            'destino_id' => $destino
        ]);

        return ($update) ? redirect()->route('admin.terminal.index')->with('success', 'Terminal alterado com sucesso!') :
        redirect()->route('admin.terminal.index')->with('danger', 'Terminal não alterado!');        

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $newId = $request->id;
        $delete = TerminalAdmin::where('id',$newId)->delete();

        return ($delete) ? redirect()->route('admin.terminal.index')->with('success', 'Terminal excluida com sucesso!') : 
          redirect()->route('admin.terminal.index')->with('danger','Terminal não excluida!');
    }
}
