<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormaPagamentos extends Model
{
    use HasFactory;

    protected $fillable = [
        'vendas_id',
        'forma_pagamento',
        'parcelas',
        'valor',
        'valor_parcela',
    ];

    public function vendas()
    {
        return $this->belongsTo(Vendas::class, 'vendas_id', 'id');
    }
}
