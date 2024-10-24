<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlunoUsoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aluno_uso', function (Blueprint $table) {
            $table->id(); // Chave primária
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Referência ao aluno
            $table->foreignId('ticket_id')->constrained('tickets')->onDelete('cascade'); // Referência ao ticket
            $table->foreignId('cardapio_id')->constrained('cardapio')->onDelete('cascade'); // Referência ao cardápio
            $table->integer('quantidade_usada'); // Quantidade usada
            $table->date('data_uso'); // Data de uso
            $table->enum('status', ['validado', 'invalidado']); // Status de uso
            $table->timestamps(); // Colunas created_at e updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aluno_uso');
    }
}
