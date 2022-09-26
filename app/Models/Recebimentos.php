<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recebimentos extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'fornecedores_id',
        'subtotal',
        'total',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
