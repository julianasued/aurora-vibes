<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRespostaQuestionarioTable extends Migration
{
    public function up()
    {
        Schema::create('resposta_questionario', function (Blueprint $table) {
            $table->id();
            $table->foreignId('users_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('questionario_id')->constrained('questionario')->onDelete('cascade');
            $table->foreignId('pergunta_id')->constrained('pergunta_questionario')->onDelete('cascade');
            $table->text('resposta')->nullable(); // Para respostas de texto
            $table->foreignId('opcao_id')->nullable()->constrained('opcao_questionario')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('resposta_questionario');
    }
}
