<?php

namespace App\Services;

use App\Exceptions\CustomException;
use App\Models\Estoques;
use App\Repository\estoques\EstoquesRepository;

class EstoquesServices
{
    public static function temEstoque($request)
    {
        try {
            $quantidade = $request->quantidade;
            $codigo = $request->codigo;

            $repository = (new EstoquesRepository(new Estoques))->temEstoque($quantidade, $codigo);

            if (!$repository) {
                throw new CustomException('Não conseguimos verificar se existe estoque para este produto.', 430);
            }

            return $repository;
        } catch (CustomException $e) {
            return Response($e->getMessage(), 430);
        } catch (\Throwable $e) {
            return Response($e->getMessage(), 430);
        }
    }
}
