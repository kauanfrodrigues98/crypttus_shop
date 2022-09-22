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
        'parcela',
        'valor',
        'valor_parcela',
    ];
}
