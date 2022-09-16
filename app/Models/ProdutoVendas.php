<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdutoVendas extends Model
{
    use HasFactory;

    protected $fillable = [
        'vendas_id',
        'codigo_grade',
        'quantidade',
        'preco_unitario',
        'desconto_real',
        'desconto_perc',
        'subtotal',
    ];

    public function venda()
    {
        return $this->hasOne(Vendas::class, 'vendas_id', 'id');
    }
}
