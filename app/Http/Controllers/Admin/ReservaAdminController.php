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
        $data['reservas'] = \DB::select("SELECT DISTINCT r.codigo_reserva,r.viagem_id,r.preco_total,r.status,r.created_at,c.nome AS nome_cliente,
        (SELECT count(*) AS total_passageiros FROM reservas)
        FROM reservas r JOIN clients c ON r.client_id=c.id");
        return view('admin.reserva-admin', $data);
    }

    public function show($codigoReserva){

        $data = [];
        // $data['reservas'] = ReservaAdmin::all();
        $data['reservas'] = \DB::select("SELECT DISTINCT r.codigo_reserva,r.viagem_id,r.preco_total,r.status,r.created_at,c.nome AS nome_cliente,
        (SELECT count(*) AS total_passageiros FROM reservas)
        FROM reservas r JOIN clients c ON r.client_id=c.id WHERE r.codigo_reserva = '$codigoReserva'");
        
        $data['info_passageiro'] = \DB::select("SELECT DISTINCT r.codigo_reserva,r.numero_poltrona,r.nome_passageiro,r.idade_passageiro 
        FROM reservas r JOIN clients c ON r.client_id=c.id WHERE r.codigo_reserva = '$codigoReserva'");
        
        return view('admin.detalhe-reserva-admin', $data);

    }

    public function store()
    {
        //return view();
    }

    public function cancelReserva($codeReserva) {

        $update = \DB::table("reservas")->where('codigo_reserva',$codeReserva)->update([
            'status' => 'Cancelado'
        ]);

        return ($update) ? back()->with('reserva-cancel','cancel')
        : back()->with('reserva-not-cancel','cancel');

    }

    public function validarPagReserva($codeReserva) {

        $update = \DB::table("reservas")->where('codigo_reserva',$codeReserva)->update([
            'status' => 'Pago'
        ]);

        return ($update) ? back()->with('reserva-validar','Validando')
        : back()->with('reserva-not-valid','Error Valid');

    }

    public function downloadBilhete() {



    }

}
