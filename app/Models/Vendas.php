<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendas extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'clientes_id',
        'desconto_real',
        'desconto_perc',
        'subtotal',
        'total',
        'finalizado',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function cliente()
    {
        return $this->belongsTo(Clientes::class, 'clientes_id', 'id');
    }

    public function produtoVenda()
    {
        return $this->belongsToMany(ProdutoVendas::class, 'vendas_id', 'id');
    }
}
