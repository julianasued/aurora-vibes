<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerguntaQuestionario extends Model
{
    use HasFactory;

    protected $table = 'pergunta_questionario';

    protected $fillable = [
        'questionario_id',
        'texto',
        'tipo',
    ];

    public function opcoes()
    {
        return $this->hasMany(OpcaoQuestionario::class, 'pergunta_id');
    }

    public function questionario()
{
    return $this->belongsTo(Questionario::class);
}
}
