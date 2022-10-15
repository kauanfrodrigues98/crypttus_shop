<?php

namespace App\Services;

use App\Exceptions\CustomException;
use App\Helpers\FuncoesHelpers;
use App\Http\Requests\StoreSangriasRequest;
use App\Models\Sangrias;
use App\Repository\sangrias\SangriasRepository;
use Illuminate\Support\Facades\Auth;

class SangriasServices
{
    public static function findAll()
    {
        return (new SangriasRepository(new Sangrias))->findAll();
    }

    public static function store(StoreSangriasRequest $request)
    {
        try {
            $dados['user_id'] = Auth::id();
            $dados['data'] = $request->data;
            $dados['descricao'] = $request->descricao;
            $dados['total'] = FuncoesHelpers::moedaBRparaSQL($request->total);

            $repository = (new SangriasRepository(new Sangrias))->store($dados);

            if (!$repository) {
                throw new CustomException('Não foi possivel cadastrar sua sangria.', 403);
            }

            return Response('Sangria cadastrada com sucesso.', 200);
        } catch (CustomException $e) {
            return Response($e->getMessage(), $e->getCode());
        } catch (\Throwable $e) {
            return Response($e->getMessage(), 430);
        }
    }
}
