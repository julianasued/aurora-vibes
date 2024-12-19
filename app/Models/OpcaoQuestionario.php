<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OpcaoQuestionario extends Model
{
    use HasFactory;

    protected $table = 'opcao_questionario';

    protected $fillable = [
        'pergunta_id', // Adicionado
        'texto',
        'valor',
    ];

    public function pergunta()
    {
        return $this->belongsTo(PerguntaQuestionario::class);
    }

}
