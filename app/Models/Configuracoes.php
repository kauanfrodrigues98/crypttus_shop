<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Configuracoes extends Model
{
    use HasFactory;

    protected $fillable = [
        'usa_caixa_inicial',
        'valor_caixa',
    ];
}
