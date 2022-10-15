<?php

namespace App\Services;

use App\Exceptions\CustomException;
use App\Models\Acessos;
use App\Repository\acessos\AcessosRepository;

class AcessosServices
{
    public static function store(array $dados)
    {
        try {
            $repository = (new AcessosRepository(new Acessos))->store($dados);

            if (!$repository) {
                throw new CustomException('Não conseguimos criar seu acesso ao sistema.', 430);
            }

            return $repository;
        } catch (CustomException $e) {
            return Response($e->getMessage(), 430);
        } catch (\Throwable $e) {
            return Response($e->getMessage(), 430);
        }
    }

    public static function destroy(int $id)
    {
        try {
            $repository = (new AcessosRepository(new Acessos))->destroy($id);

            if (!$repository) {
                throw new CustomException('Não conseguimos excluir os acessos solicitados.', 430);
            }

            return true;
        } catch (CustomException $e) {
            return Response($e->getMessage(), $e->getCode());
        } catch (\Throwable $e) {
            return Response($e->getMessage(), 430);
        }
    }
}
