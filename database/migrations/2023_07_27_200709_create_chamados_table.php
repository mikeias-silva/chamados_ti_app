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
        Schema::create('chamados', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->unsignedBigInteger('categoria_id');
            $table->text('descricao');
            $table->date('prazo_solucao');
            $table->unsignedBigInteger('situacao_id');
            $table->date('data_criacao');
            $table->date('data_solucao')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->foreign('situacao_id')->references('id')->on('situacoes');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('categoria_id')->references('id')->on('categorias');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chamados');
    }
};
