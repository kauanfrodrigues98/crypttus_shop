<?php

namespace App\Services;

use App\Exceptions\CustomException;
use App\Models\Tamanhos;
use App\Repository\tamanhos\TamanhosRepository;

class TamanhosServices
{
    public static function findAll()
    {
        try {
            return (new TamanhosRepository(new Tamanhos))->findAll();
        } catch (Exception $e) {
            return Response($e->getMessage(), $e->getCode());
        }
    }

    public static function store($request)
    {
        try {
            $dados['codigo'] = $request->codigo;
            $dados['tamanho'] = $request->tamanho;
            $dados['descricao'] = $request->descricao;

            $repository = (new TamanhosRepository(new Tamanhos))->store($dados);

            if (!$repository) {
                throw new CustomException('Não foi possivel cadastrar tamanho.', 430);
            }

            return Response('Tamanho cadastrado com sucesso.');
        } catch (CustomException $e) {
            return Response($e->getMessage(), 430);
        } catch (\Throwable $e) {
            return Response($e->getMessage(), 430);
        }
    }
}
