<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MovimentacaoCaixas extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'operacao',
        'valor',
        'valor_caixa_anterior',
        'valor_caixa_atual',
    ];
}
