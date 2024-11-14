<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlunoUso extends Model
{
    use HasFactory;

    protected $table = 'aluno_uso';

    protected $fillable = [
        'user_id',
        'ticket_id',
        'quantidade_usada',
        'status',
        'data_uso',
    ];

    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function ticket()
    {
        return $this->belongsTo(Ticket::class, 'ticket_id');
    }
}
