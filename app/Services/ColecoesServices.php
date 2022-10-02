<?php

namespace App\Services;

use App\Exceptions\CustomException;
use App\Models\Colecoes;
use App\Repository\colecoes\ColecoesRepository;

class ColecoesServices
{
    public static function findAll()
    {
        try {
            $repository = (new ColecoesRepository(new Colecoes))->findAll();

            if (!$repository) {
                throw new CustomException('Não foi possivel acessar as coleções cadastradas.', 430);
            }

            return $repository;
        } catch (CustomException $e) {
            return Response($e->getMessage(), 430);
        } catch (\Throwable $e) {
            return Response($e->getMessage(), 430);
        }
    }

    public static function store($request)
    {
        try {
            $dados['nome'] = $request->nome;

            $repository = (new ColecoesRepository(new Colecoes))->store($dados);

            if (!$repository) {
                throw new CustomException('Não foi possivel cadastrar nova coleção.', 430);
            }

            return Response('Coleção cadastrada com sucesso.', 200);
        } catch (CustomException $e) {
            return Response($e->getMessage(), 430);
        } catch (\Throwable $e) {
            return Response($e->getMessage(), 430);
        }
    }

    public static function get($request)
    {
        $search = $request->search ?? '';

        return (new ColecoesRepository(new Colecoes))->get($search);
    }
}
