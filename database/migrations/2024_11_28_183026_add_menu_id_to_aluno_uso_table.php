<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMenuIdToAlunoUsoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('aluno_uso', function (Blueprint $table) {
            $table->foreignId('menu_id') // Cria a coluna menu_id
                  ->nullable() // Torna a coluna opcional (remova se for obrigatória)
                  ->constrained('menu_semanal') // Define a chave estrangeira referenciando a tabela menu_semanal
                  ->onDelete('cascade'); // Remove o registro caso o menu relacionado seja deletado
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('aluno_uso', function (Blueprint $table) {
            $table->dropForeign(['menu_id']); // Remove a chave estrangeira
            $table->dropColumn('menu_id'); // Remove a coluna menu_id
        });
    }
}
