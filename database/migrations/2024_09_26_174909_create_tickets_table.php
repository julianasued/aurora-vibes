<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tickets', function (Blueprint $table) {
            Schema::create('tickets', function (Blueprint $table) {
                $table->id();
                $table->string('titulo'); 
                $table->text('descrição'); 
                $table->decimal('amount', 8,2);
                $table->date('vencimento');
                $table->enum('status', ['aberto','chamado'])->default('aberto'); 
                $table->enum('prioridade', ['baixa', 'media', 'alta'])->default('baixa'); 
                $table->foreignId('users') ->references('id')->on('users')->onDelete('cascade');
                $table->timestamps(); 
            });
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
