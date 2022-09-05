<?php

namespace App\Services;

use App\Exceptions\CustomException;
use App\Models\Cores;
use App\Repository\cores\CoresRepository;

class CoresServices
{
    public static function findAll()
    {
        try {
            return (new CoresRepository(new Cores))->findAll();
        } catch (\Exception $e) {
            return Response($e->getMessage(), 430);
        }
    }

    public static function store($request)
    {
        try {
            $dados['codigo'] = $request->codigo;
            $dados['cor'] = $request->cor;
            $dados['descricao'] = $request->descricao;

            $repository = (new CoresRepository(new Cores))->store($dados);

            if (!$repository) {
                throw new CustomException('Não foi possivel cadastrar cor.');
            }

            return Response('Cor cadastrada com sucesso.', 200);
        } catch (CustomException $e) {
            return Response($e->getMessage(), 430);
        } catch (\Throwable $e) {
            return Response($e->getMessage(), 430);
        }
    }

    public static function get($request)
    {
        $search = $request->search ?? '';

        return (new CoresRepository(new Cores))->get($search);
    }
}
