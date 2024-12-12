<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOpcaoQuestionarioTable extends Migration
{
    public function up()
    {
        Schema::create('opcao_questionario', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pergunta_id')->constrained('pergunta_questionario')->onDelete('cascade');
            $table->string('texto');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('opcao_questionario');
    }
}

