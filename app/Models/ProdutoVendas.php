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
        return $this->belongsTo(Vendas::class);
    }

    public function codigoGrade()
    {
        return $this->belongsTo(CodigoGrades::class, 'codigo_grade', 'codigo_grade');
    }
}
