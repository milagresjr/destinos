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
        $data['reservas'] = ReservaAdmin::all();
        return view('admin.reserva-admin', $data);
    }

    public function store()
    {
        //return view();
    }
}
