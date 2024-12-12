<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerguntaQuestionarioTable extends Migration
{
    public function up()
    {
        Schema::create('pergunta_questionario', function (Blueprint $table) {
            $table->id();
            $table->foreignId('questionario_id')->constrained('questionario')->onDelete('cascade');
            $table->string('texto');
            $table->enum('tipo', ['texto', 'multipla_escolha']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pergunta_questionario');
    }
}

