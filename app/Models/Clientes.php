<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Clientes extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'nome',
        'cpf',
        'email',
        'data_nascimento',
        'celular',
        'cep',
        'logradouro',
        'numero',
        'bairro',
        'cidade',
        'uf',
        'complemento',
    ];

    public function venda()
    {
        return $this->hasMany(Vendas::class, 'clientes_id', 'id');
    }
}
