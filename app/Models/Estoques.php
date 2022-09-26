<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estoques extends Model
{
    use HasFactory;

    protected $fillable = [
        'codigo_grade',
        'quantidade',
        'quantidade_anterior'
    ];
}
