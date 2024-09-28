<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'descricao',
        'amount',
        'vencimento',
        'quantidade',
        'user_id'
    ];
}
