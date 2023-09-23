<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\AgenciaAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AgenciaAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];
        $data['agencias'] = AgenciaAdmin::all();
        return view('admin.agencia-admin',$data);
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
        $nome = $request->nome;
        $ende = $request->endereco;
        $email = $request->email;
        $tel = $request->telefone;
        $desc = $request->descricao;
        
        if($request->hasFile('imagem')) {
            
            $file = $request->file('imagem');
            // $fotoName = $file->getClientOriginalName();
            //Upload da imagem
            $upload = $file->store('agencias','public');

            // Obtenha o nome gerado aleatoriamente pelo Laravel e a extensão do arquivo original
            $baseName = pathinfo($upload)['basename'];

            $create = AgenciaAdmin::create([
                'nome' => $nome,
                'descricao' => $desc,
                'logo' => $baseName,
                'endereco' => $ende,
                'email' => $email,
                'telefone' => $tel
            ]);           

            return ($create) ? redirect()->route('admin.agencia.index')->with('success', 'Cadastrado com sucesso!') : 
            redirect()->route('admin.agencia.index')->with(['success' => 'Cadastro não realizado!']);

        } else {
            $semFoto = "semfoto.png";
            $create = AgenciaAdmin::create([
                'nome' => $nome,
                'descricao' => $desc,
                'endereco' => $ende,
                'logo' => $semFoto,
                'email' => $email,
                'telefone' => $tel
            ]);           

            return ($create) ? redirect()->route('admin.agencia.index')->with('success', 'Cadastrado com sucesso!') : 
            redirect()->route('admin.agencia.index')->with(['success' => 'Cadastro não realizado!']);

        }
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
        $agencia = AgenciaAdmin::find($id);
        return response()->json($agencia);
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
        $nome = $request->nome;
        $ende = $request->endereco;
        $email = $request->email;
        $tel = $request->telefone;
        $desc = $request->descricao;
        
        if($request->hasFile('imagem')) {
            
            $file = $request->file('imagem');
            // $fotoName = $file->getClientOriginalName();
            //Upload da imagem
            $upload = $file->store('agencias','public');

            // Obtenha o nome gerado aleatoriamente pelo Laravel e a extensão do arquivo original
            $baseName = pathinfo($upload)['basename'];

            $create = AgenciaAdmin::where('id',$newId)->update([
                'nome' => $nome,
                'descricao' => $desc,
                'logo' => $baseName,
                'endereco' => $ende,
                'email' => $email,
                'telefone' => $tel
            ]);           

            return ($create) ? redirect()->route('admin.agencia.index')->with('success', 'Agência alterada com sucesso!') : 
            redirect()->route('admin.agencia.index')->with(['success' => 'Alteração não realizado!']);

        } else {
            // $semFoto = "semfoto.png";
            $logo = $request->imagem_2;
            $create = AgenciaAdmin::where('id',$newId)->update([
                'nome' => $nome,
                'descricao' => $desc,
                'endereco' => $ende,
                'logo' => $logo,
                'email' => $email,
                'telefone' => $tel
            ]);           

            return ($create) ? redirect()->route('admin.agencia.index')->with('success', 'Agência alterada com sucesso!') : 
            redirect()->route('admin.agencia.index')->with(['success' => 'Alteração não realizado!']);

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $newId = $request->id;

        $agencia = AgenciaAdmin::find($newId);

        $fullPath = 'public/agencias/' . $agencia->logo;

        Storage::delete($fullPath);

        $delete = $agencia->delete();

        return ($delete) ? redirect()->route('admin.agencia.index')->with('success','Agência excluído com sucesso!')
        : redirect()->route('admin.agencia.index')->with('danger','agência não excluído!');

    }
}
