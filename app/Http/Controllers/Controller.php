<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agendamento;
use Illuminate\Routing\Controller;

class AgendamentoController extends Controller
{
    public function index()
    {
        $agendamentos = Agendamento::orderBy('data', 'asc')->orderBy('hora', 'asc')->get();
        return view('agendamentos.index', compact('agendamentos'));
    }

    public function create()
    {
        return view('agendamentos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'email' => 'required|email',
            'data' => 'required|date',
            'hora' => 'required',
        ]);

        
        $existe = Agendamento::where('data', $request->data)
            ->where('hora', $request->hora)
            ->exists();

        if ($existe) {
            return back()->withErrors(['horario' => 'Já existe um agendamento nesse dia e horário'])->withInput();
        }

        Agendamento::create($request->all());

        return redirect()->route('agendamentos.index')->with('success', 'Agendamento criado com sucesso!');
    }

    public function edit($id)
    {
        $agendamento = Agendamento::findOrFail($id);
        return view('agendamentos.edit', compact('agendamento'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required',
            'email' => 'required|email',
            'data' => 'required|date',
            'hora' => 'required',
        ]);

        $existe = Agendamento::where('data', $request->data)
            ->where('hora', $request->hora)
            ->where('id', '!=', $id)
            ->exists();

        if ($existe) {
            return back()->withErrors(['horario' => 'Já existe um agendamento nesse dia e horário'])->withInput();
        }

        $agendamento = Agendamento::findOrFail($id);
        $agendamento->update($request->all());

        return redirect()->route('agendamentos.index')->with('success', 'Agendamento atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $agendamento = Agendamento::findOrFail($id);
        $agendamento->delete();

        return redirect()->route('agendamentos.index')->with('success', 'Agendamento excluído com sucesso!');
    }
}
