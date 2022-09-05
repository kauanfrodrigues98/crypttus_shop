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

    public function cor()
    {
        return $this->hasOne(Cores::class, 'produtos_id', 'id');
    }

    public function tamanho()
    {
        return $this->hasOne(Tamanhos::class, 'produtos_id', 'id');
    }
}
