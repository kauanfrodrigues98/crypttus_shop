<?php

namespace App\Services;

use App\Exceptions\CustomException;
use App\Models\Sangrias;
use App\Repository\sangrias\SangriasRepository;

class SangriasServices
{
    public static function findAll()
    {
        return (new SangriasRepository(new Sangrias))->findAll();
    }

    public static function store(array $request)
    {
        try {
            return Response('Sangria cadastrada com sucesso.', 200);
        } catch (CustomException $e) {
            return Response($e->getMessage(), $e->getCode());
        } catch (\Throwable $e) {
            return Response($e->getMessage(), 430);
        }
    }
}
