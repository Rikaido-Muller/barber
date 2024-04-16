<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('agendamentos', function (Blueprint $table) {
            $table->id();
            $table->date('data');
            $table->string('hora');
            $table->unsignedBiginteger('id_cliente');
            $table->unsignedBiginteger('id_barbearia');
            $table->unsignedBiginteger('id_barbeiro');
            $table->unsignedBiginteger('id_servico');
            
            $table->foreign('id_cliente')->references('id')->on('clientes');
            $table->foreign('id_barbearia')->references('id')->on('barbearias');
            $table->foreign('id_barbeiro')->references('id')->on('barbeiros');
            $table->foreign('id_servico')->references('id')->on('servicos');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agendamentos');
    }
};
