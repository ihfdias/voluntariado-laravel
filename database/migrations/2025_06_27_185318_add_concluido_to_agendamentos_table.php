<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::table('agendamentos', function (Blueprint $table) {
        $table->boolean('concluido')->default(false);
        });
    }
    
    public function down(): void
    {
        Schema::table('agendamentos', function (Blueprint $table) {
        $table->dropColumn('concluido');
    });
}
};
