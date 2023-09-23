<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        return view("admin.home-admin");
    }

    public function logar(Request $request)
    {
        if ($request->isMethod("POST")) {
            $email_tel = $request->email_tel;
            $password = $request->senha;

            $credencias = ['email' => $email_tel, 'password' => $password];

            if (Auth::attempt($credencias)) {
                //LOGADO
                return response()->json(['success'=>true]);
            } else {
                //N LOGADO
                return response()->json(['success'=>false]);
            }
        }
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('home');
    }
}
