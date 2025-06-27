<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTimestampsToAgendamentosTable extends Migration

{
    public function up()
    {
        Schema::table('agendamentos', function (Blueprint $table) {
            $table->timestamps(); // Adiciona os campos created_at e updated_at
        });
    }

   
    public function down()
    {
        Schema::table('agendamentos', function (Blueprint $table) {
            $table->dropTimestamps(); // Remove os campos created_at e updated_at
        });
    }
}