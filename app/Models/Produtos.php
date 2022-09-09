<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produtos extends Model
{
    use HasFactory;

    protected $fillable = [
        'codigo',
        'nome',
        'descricao',
        'colecoes_id',
        'preco_compra',
        'preco_venda',
    ];

    protected $hidden = [
        'colecoes_id'
    ];

    public function colecoes()
    {
        return $this->belongsTo(Colecoes::class, 'colecoes_id', 'id');
    }

    public function codigoGrade()
    {
        return $this->hasMany(CodigoGrades::class, 'produtos_id', 'id');
    }
}
