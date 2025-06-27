<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AgendamentoController;

Route::get('/', function () {
    return redirect()->route('agendamentos.index');
});

Route::get('/agendamentos', [AgendamentoController::class, 'index'])->name('agendamentos.index');
Route::get('/agendamentos/create', [AgendamentoController::class, 'create'])->name('agendamentos.create');
Route::post('/agendamentos', [AgendamentoController::class, 'store'])->name('agendamentos.store');
Route::get('/agendamentos/{agendamento}/edit', [AgendamentoController::class, 'edit'])->name('agendamentos.edit');
Route::put('/agendamentos/{agendamento}', [AgendamentoController::class, 'update'])->name('agendamentos.update');
Route::delete('/agendamentos/{agendamento}', [AgendamentoController::class, 'destroy'])->name('agendamentos.destroy');
