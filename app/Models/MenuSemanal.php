<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuSemanal extends Model
{
    use HasFactory;

    protected $table = 'menu_semanal';

    protected $fillable = [
        'user_id',
        'dia_semana',
        'refeicao',
        'salada',
        'prato_principal',
        'guarnicao',
        'acompanhamentos',
        'sobremesa',
        'observacoes',
        'data_inicio',
        'data_fim',
    ];

    // Relacionamento com usuário
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

