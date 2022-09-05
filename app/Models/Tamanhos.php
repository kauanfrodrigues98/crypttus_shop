<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tamanhos extends Model
{
    use HasFactory;

    protected $fillable = [
        'codigo',
        'tamanho',
        'descricao',
    ];

    public function produto()
    {
        return $this->belongsToMany(Produtos::class, 'produtos_id', 'id');
    }
}
