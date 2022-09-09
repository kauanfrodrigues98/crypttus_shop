<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cores extends Model
{
    use HasFactory;

    protected $fillable = [
        'codigo',
        'cor',
        'descricao',
    ];

    public function codigoGrade()
    {
        return $this->hasMany(CodigoGrades::class, 'cores_id', 'id');
    }
}
