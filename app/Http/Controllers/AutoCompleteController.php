<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class AutoCompleteController extends Controller
{
    public function index()
    {
        return view("autocomplete");
    }
    public function fetch(Request $request)
    {
        if($request->get('query'))
        {
            $query = $request->get('query');
            //$query = $request->query;
            $data = DB::table("provincias")->where('nome','LIKE',"%{$query}%")->get();
            $output = '<ul class="dropdown-menu" style="display: block;position: absolute; width: 100%"> ';
            foreach($data as $d)
            {
                $output .= '<li><a class="dropdown-item" style="cursor:pointer;">'.$d->nome.'</a></li>';
            }
            $output .= '</ul>';
            //echo $output;
            echo "oiiiiiii";
        }
    }
}
