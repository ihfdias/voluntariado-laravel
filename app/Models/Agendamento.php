<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Agendamento extends Model
{
    protected $fillable = [
        'nome',
        'email',
        'data',
        'hora',
        'mensagem',
        'concluido' 
    ];
}
