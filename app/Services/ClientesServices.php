<?php

namespace App\Services;

use App\Models\Clientes;
use App\Repository\clientes\ClientesRepository;

class ClientesServices
{
    public static function findAll()
    {
        try {
            return (new ClientesRepository(new Clientes))->findAll();
        } catch(Exception $e) {
            return Response($e->getMessage(), $e->getCode());
        }
    }

    public static function create()
    {
        try {

        } catch(Exception $e) {

        }
    }
}
