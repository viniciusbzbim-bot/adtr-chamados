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
    Schema::create('chamados', function (Blueprint $table) {

        $table->id();

        $table->foreignId('user_id')
              ->constrained()
              ->onDelete('cascade');

        $table->string('assunto');

        $table->text('descricao');

        $table->string('categoria');

        $table->enum('prioridade', [
            'baixa',
            'media',
            'alta'
        ]);

        $table->enum('status', [
            'aberto',
            'em_andamento',
            'finalizado'
        ])->default('aberto');

        $table->timestamp('data_abertura');

        $table->timestamps();
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
