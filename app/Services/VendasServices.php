<?php

namespace App\Services;

use App\Models\Vendas;
use App\Repository\vendas\VendasRepository;

class VendasServices
{
    public static function findAll()
    {
        try {
            return (new VendasRepository(new Vendas()))->findAll();
        } catch (\Exception $e) {
            return Response($e->getMessage(), 430);
        }
    }
}
