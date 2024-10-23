<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('retiro2025', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('nome_completo');
            $table->string('telefone');
            $table->dateTime('birthday');
            $table->string('cpf');
            $table->string('rg');
            $table->enum('forma_pagamento', ['a_vista', 'dividido']);
            $table->boolean('pagamento_realizado')->default(false);
            $table->string('lote')->default('lote-1');

            // Campos para as novas perguntas
//            $table->enum('adventista', [
//                'Sim, sou batizado.',
//                'Não, sou adventista.',
//                'Sou adventista mas afastado.',
//                'Não sou adventista mas pretendo ser.',
//                'Não sou adventista batizado mas estou sempre envolvido em programas e eventos.',
//                'Sou de outra denominação.'
//            ]);

            $table->enum('adventista', [
                0, 1, 2, 3, 4, 5
            ]);

            $table->string('bairro_igreja')->nullable(); // Para "Se adventista, qual o bairro e cidade da sua igreja?"
            $table->string('outra_denominação')->nullable(); // Para "Se de outra denominação, qual seria?"
//            $table->enum('vegetariano', ['Sim', 'Sim, e vegano.', 'Não']);
            $table->enum('vegetariano', [0, 1, 2]);
            $table->text('expectativa_retiro')->nullable(); // Para "O que você espera encontrar no Retiro 180º?!"


            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('retiro');
    }
};
