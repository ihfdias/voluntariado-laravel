<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use Illuminate\Routing\Controller;

class AdminAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $admin = Admin::where('email', $request->email)->first();

        if ($admin && Hash::check($request->password, $admin->password)) {
            session(['admin_logado' => $admin->id]);
            return redirect()->route('agendamentos.index');
        }

        return back()->with('erro', 'Credenciais inválidas');
    }

    public function logout()
    {
        session()->forget('admin_logado');
        return redirect()->route('admin.login.form');
    }
}

