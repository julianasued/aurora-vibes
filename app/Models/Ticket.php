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
        'user_id',
    ];

    public function compras()
    {
        return $this->hasMany(Compra::class); // Um ticket pode ter várias compras
    }
}
