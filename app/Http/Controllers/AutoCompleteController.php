<?php

namespace App\Http\Controllers;

use App\Models\Viagem;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redis;

class AutoCompleteController extends Controller
{
    public function index()
    {
        return view("autocomplete");
    }
    // public function fetch(Request $request)
    // {
    //     if($request->get('query'))
    //     {
    //         $query = $request->get('query');
    //         //$query = $request->query;
    //         $data = DB::table("destinos")->where('nome','LIKE',"%{$query}%")->get();
    //         $output = '<ul class="dropdown-menu" style="display: block;position: absolute; width: 100%"> ';
    //         foreach($data as $d)
    //         {
    //             $output .= '<li><a class="dropdown-item" style="cursor:pointer;">'.$d->nome.'</a></li>';
    //         }
    //         $output .= '</ul>';
    //         echo $output;
    //         // echo "oiiiiiii";
    //     }
    // }

    public function autocomplete(Request $request) {
        $termo = $request->input('term');
        $rotas = DB::select("SELECT d1.nome AS local_partida, d2.nome AS local_destino FROM routes r INNER JOIN destinos d1 ON d1.id=r.local_partida
         INNER JOIN destinos d2 ON d2.id=r.local_destino WHERE d1.nome LIKE '$termo%' GROUP BY d1.nome,d2.nome
        ");
        // $res = \DB::table("destinos")->where('nome','LIKE',"%{$termo}%")->get();
        // $res = \DB::select("SELECT * FROM destinos WHERE nome LIKE '%$termo%'");
        $response = array();
        foreach($rotas as $r){
            $newname = $r->local_partida.' - '.$r->local_destino;
            $response[] = array('value'=>$newname, 'label'=>$newname);
            // $response[] = array('value'=>$newname, 'label'=>$newname);
        }
        return response()->json($response);
    }

    // public function autocomplete(Request $request) {
    //     $search = $request->search;
    //     // $res = Viagem::where('column','LIKE', '%', $term, '%')->get();
    //     $datas = DB::table("provincias")->where('nome','LIKE',"%{$search}%")->get();

    //     dd($search);
        
    //     $response = array();
    //     foreach($datas as $data) {
    //         $response[] = array("value"=>$data->id,"label"=>$data->nome);
    //     }
    //     return response()->json($response);
    // }
}
