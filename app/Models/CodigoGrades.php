<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CodigoGrades extends Model
{
    use HasFactory;

    protected $fillable = [
        'produtos_id',
        'cores_id',
        'tamanhos_id',
        'codigo_grade',
    ];

    protected $hidden = [
        'produtos_id',
        'cores_id',
        'tamanhos_id',
    ];

    public function produto()
    {
        return $this->belongsTo(Produtos::class, 'produtos_id', 'id');
    }

    public function cor()
    {
        return $this->belongsTo(Cores::class, 'cores_id', 'id');
    }

    public function tamanho()
    {
        return $this->belongsTo(Tamanhos::class, 'tamanhos_id', 'id');
    }

    public function produtoVenda()
    {
        return $this->hasOne(ProdutoVendas::class, 'codigo_grade', 'codigo_grade');
    }

    public function estoques()
    {
        return $this->hasOne(Estoques::class, 'codigo_grade', 'codigo_grade');
    }
}
