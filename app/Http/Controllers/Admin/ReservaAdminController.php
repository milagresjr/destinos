<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\ReservaAdmin;

class ReservaAdminController extends Controller
{
    public function index()
    {
        $data = [];
        // $data['reservas'] = ReservaAdmin::all();
        $data['reservas'] = \DB::select("SELECT r.id,r.viagem_id,r.numero_poltrona,r.preco_total,r.nome_passageiro,r.idade_passageiro,r.status,r.created_at,c.nome AS nome_cliente 
        FROM reservas r JOIN clients c ON r.client_id=c.id");
        return view('admin.reserva-admin', $data);
    }

    public function store()
    {
        //return view();
    }
}
