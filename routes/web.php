<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AgendamentoController;

// Rota inicial que redireciona para a lista de agendamentos
Route::get('/', function () {
    return redirect()->route('agendamentos.index');
});

// Rotas do CRUD de agendamentos
Route::get('/agendamentos', [AgendamentoController::class, 'index'])->name('agendamentos.index');
Route::get('/agendamentos/create', [AgendamentoController::class, 'create'])->name('agendamentos.create');
Route::post('/agendamentos', [AgendamentoController::class, 'store'])->name('agendamentos.store');
Route::get('/agendamentos/{id}/edit', [AgendamentoController::class, 'edit'])->name('agendamentos.edit');
Route::put('/agendamentos/{id}', [AgendamentoController::class, 'update'])->name('agendamentos.update');
Route::delete('/agendamentos/{id}', [AgendamentoController::class, 'destroy'])->name('agendamentos.destroy');
