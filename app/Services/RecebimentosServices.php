<?php

namespace App\Services;

use App\Exceptions\CustomException;
use App\Models\Recebimentos;
use App\Repository\recebimentos\RecebimentosRepository;
use Illuminate\Support\Facades\Auth;

class RecebimentosServices
{
    public static function store($request)
    {
        try {
            $dados['fornecedores_id'] = $request->fornecedor;
            $dados['user_id'] = Auth::id();
            $dados['subtotal'] = $request->total;
            $dados['total'] = $request->total;
            $dados['status'] = 1;

            $repository = (new RecebimentosRepository(new Recebimentos))->store($dados);

            if (!$repository) {
                throw new CustomException('Não foi possivel salvar seu recebimento.', 430);
            }

            for ($index = 0; $index < count($request->codigo); $index++) {
                $data['recebimentos_id'] = $repository->id;
                $data['codigo_grade'] = $request->codigo[$index];
                $data['quantidade'] = $request->quantidade[$index];
                $data['preco_unitario'] = $request->preco_unitario[$index];
                $data['desconto_real'] = 0.00;
                $data['desconto_perc'] = 0.00;
                $data['subtotal'] = $request->subtotal;
                $data['status'] = 1;
            }

            return Response('Recebimento realizado com sucesso!', 200);
        } catch (CustomException $e) {
            return Response($e->getCode(), 430);
        }
    }
}
