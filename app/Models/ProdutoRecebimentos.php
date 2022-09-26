<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdutoRecebimentos extends Model
{
    use HasFactory;


    protected $fillable = [
        'recebimentos_id',
        'codigo_grade',
        'quantidade',
        'preco_unitario',
        'desconto_real',
        'desconto_perc',
        'subtotal',
        'status',
    ];
}
