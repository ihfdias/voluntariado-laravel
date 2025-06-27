<?php

namespace App\Http\Controllers;

use App\Models\Agendamento;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AgendamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $agendamentos = Agendamento::all();
        return view('agendamentos.index', compact('agendamentos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('agendamentos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'data' => 'required|date',
            'hora' => 'required',
            'mensagem' => 'nullable|string',
        ]);

        Agendamento::create($request->all());

        return redirect()->route('agendamentos.index')
            ->with('success', 'Agendamento criado com sucesso!');
    }


    public function show(Agendamento $agendamento)
    {
        //
    }


    public function edit(Agendamento $agendamento)
    {
        return view('agendamentos.edit', compact('agendamento'));
    }


    public function update(Request $request, Agendamento $agendamento)
    {
        //
    }

    public function destroy(Agendamento $agendamento)
    {
        //
    }

    public function concluir($id)
    {
        $agendamento = Agendamento::findOrFail($id);
        $agendamento->concluido = true;
        $agendamento->save();

        return redirect()->route('agendamentos.index')->with('success', 'Agendamento marcado como concluído!');
    }
}
