<?php

namespace App\Services;

use App\Exceptions\CustomException;
use App\Models\Estoques;
use App\Models\ProdutoRecebimentos;
use App\Models\Recebimentos;
use App\Repository\estoques\EstoquesRepository;
use App\Repository\produtoRecebimentos\ProdutoRecebimentosRepository;
use App\Repository\recebimentos\RecebimentosRepository;
use Illuminate\Support\Facades\Auth;

class RecebimentosServices
{
    public static function findAll()
    {
        try {
            return (new RecebimentosRepository(new Recebimentos))->findAll();
        } catch (Exception $e) {
            return Response($e->getMessage(), $e->getCode());
        }
    }

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

            $recebimentoId = $repository->id;

            for ($index = 0; $index < count($request->codigo); $index++) {
                $data['recebimentos_id'] = $recebimentoId;
                $data['codigo_grade'] = $request->codigo[$index];
                $data['quantidade'] = $request->quantidade[$index];
                $data['preco_unitario'] = $request->preco_unitario[$index];
                $data['desconto_real'] = 0.00;
                $data['desconto_perc'] = 0.00;
                $data['subtotal'] = $request->subtotal[$index];
                $data['status'] = 1;

                $prodReceb = (new ProdutoRecebimentosRepository(new ProdutoRecebimentos))->store($data);

                if (!$prodReceb) {
                    throw new CustomException('Não conseguimos cadastrar os produtos do seu recebimento.', 430);
                }

                $estoque['codigo_grade'] = $request->codigo[$index];
                $estoque['quantidade'] = $request->quantidade[$index];
                $estoque['quantidade_anterior'] = $request->quantidade[$index];

                $respository = (new EstoquesRepository(new Estoques))->updateEstoque($estoque);

                if (!$repository) {
                    throw new CustomException('Não conseguimos alterar o estoque.', 430);
                }
            }

            return Response('Recebimento realizado com sucesso!', 200);
        } catch (CustomException $e) {
            return Response($e->getMessage(), 430);
        } catch (\Throwable $e) {
            return Response($e->getMessage(), 430);
        }
    }
}
