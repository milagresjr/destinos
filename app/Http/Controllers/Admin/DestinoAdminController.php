<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\DestinoAdmin;
use Illuminate\Support\Facades\Storage;

class DestinoAdminController extends Controller
{
    public function index() {

        $data = [];
        $data['destinos'] = DestinoAdmin::all();
        return view('admin.destino-admin',$data); 

    }

    public function store(Request $request) {

       
        // $request->validate([
        //     'nome' => 'string|required',
        //     'descricao' => 'string',
        //     'imagem' => 'file'
        // ]);

        if($request->hasFile('imagem')) {

            $nome = $request->nome;
            $desc = $request->descricao;
            $file = $request->file('imagem');
            // $fotoName = $file->getClientOriginalName();
            //Upload da imagem
            $upload = $file->store('destinos','public');

            // Obtenha o nome gerado aleatoriamente pelo Laravel e a extensão do arquivo original
            $baseName = pathinfo($upload)['basename'];

            $create = DestinoAdmin::create([
                'nome' => $nome,
                'descricao' => $desc,
                'foto' => $baseName
            ]);           

            return ($create) ? redirect()->route('admin.destino.index')->with('success', 'Cadastrado com sucesso!') : 
            redirect()->route('admin.destino.index')->with(['success' => 'Cadastro não realizado!']);

        } else {
            return redirect()->route('admin.destino.index')->with(['danger' => 'Nenhum arquivo foi enviado!']);
        }

    }

    public function edit($id) {

        $destino = DestinoAdmin::find($id);
        return response()->json($destino);
        
    }

    public function update(Request $request, $id) {

        if($request->hasFile('imagem')) {

            $newId = $request->id;
            $nome = $request->nome;
            $desc = $request->descricao;
            $file = $request->file('imagem');
            // $fotoName = $file->getClientOriginalName();
            //Upload da imagem
            $upload = $file->store('destinos','public');

            // Obtenha o nome gerado aleatoriamente pelo Laravel e a extensão do arquivo original
            $baseName = pathinfo($upload)['basename'];

            $create = DestinoAdmin::where('id',$newId)->update([
                'nome' => $nome,
                'descricao' => $desc,
                'foto' => $baseName
            ]);           

            return ($create) ? redirect()->route('admin.destino.index')->with('success', 'Alterado com sucesso!') : 
            redirect()->route('admin.destino.index')->with(['danger' => 'Alteração não realizada!']);

        } else {
            
            $id = $request->id;
            $nome = $request->nome;
            $desc = $request->descricao;

            $create = DestinoAdmin::where('id',$id)->update([
                'nome' => $nome,
                'descricao' => $desc
            ]);           

            return ($create) ? redirect()->route('admin.destino.index')->with('message', 'Alterado com sucesso!') : 
            redirect()->route('admin.destino.index')->with(['danger' => 'Alteração não realizada!']);

        }

    }

    public function destroy(Request $request, $id) {

        $newId = $request->id;

        $destino = DestinoAdmin::find($newId);

        $fullPath = 'public/destinos/' . $destino->foto;

        Storage::delete($fullPath);

        $delete = $destino->delete();

        return ($delete) ? redirect()->route('admin.destino.index')->with('success','Destino excluído com sucesso!')
        : redirect()->route('admin.destino.index')->with('danger','Destino não excluído!');

    }
}
