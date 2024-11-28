<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuSemanal extends Model
{
    use HasFactory;

    protected $table = 'cardapio';

    protected $fillable = [
        'dia_semana', 
        'prato_principal', 
        'guarnicao', 
        'acompanhamento', 
        'sobremesa', 
        'salada', 
        'vegetariano'
    ];

    // Relacionamento com usuário
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

