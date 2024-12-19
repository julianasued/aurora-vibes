<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Questionario extends Model
{
    use HasFactory;

    protected $table = 'questionario';

    protected $fillable = ['titulo', 'descricao'];

    public function respostas()
    {
        return $this->hasMany(RespostaQuestionario::class, 'questionario_id');
    }
}
