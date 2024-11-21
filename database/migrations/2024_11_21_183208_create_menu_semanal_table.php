<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenuSemanalTable extends Migration
{
    public function up()
    {
        Schema::create('menu_semanal', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->enum('dia_semana', ['Segunda-feira', 'Terça-feira', 'Quarta-feira', 'Quinta-feira', 'Sexta-feira', 'Sábado', 'Domingo']);
            $table->enum('refeicao', ['Almoço', 'Jantar']);
            $table->string('salada', 255)->nullable();
            $table->string('prato_principal', 255)->nullable();
            $table->string('guarnicao', 255)->nullable();
            $table->text('acompanhamentos')->nullable();
            $table->string('sobremesa', 255)->nullable();
            $table->text('observacoes')->nullable();
            $table->date('data_inicio');
            $table->date('data_fim');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('menu_semanal');
    }
}
