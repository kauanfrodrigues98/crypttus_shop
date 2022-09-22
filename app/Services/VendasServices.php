<?php

namespace App\Services;

use App\Exceptions\CustomException;
use App\Models\ProdutoVendas;
use App\Models\Vendas;
use App\Repository\produtoVendas\ProdutoVendasRepository;
use App\Repository\vendas\VendasRepository;

class VendasServices
{
    public static function findAll(array $dados)
    {
        try {
            return (new VendasRepository(new Vendas()))->findAll($dados);
        } catch (\Exception $e) {
            return Response($e->getMessage(), 430);
        }
    }

    public static function store($request)
    {
        try {
            $dados['user_id'] = $request->funcionario;
            $dados['clientes_id'] = $request->cliente;
            $dados['subtotal'] = $request->total;
            $dados['desconto_real'] = 0;
            $dados['desconto_perc'] = 0;
            $dados['total'] = $request->total;
            $dados['status'] = 1;

            $repository = (new VendasRepository(new Vendas))->store($dados);

            if (!$repository) {
                throw new CustomException('Não foi possivel cadastrar produto.', 430);
            }

            if (!empty($request->codigo)) {
                for ($index = 0; $index < count($request->codigo); $index++) {
                    $data['vendas_id'] = $repository->id;
                    $data['codigo_grade'] = $request->codigo[$index];
                    $data['quantidade'] = $request->quantidade[$index];
                    $data['preco_unitario'] = $request->preco_unitario[$index];
                    $data['desconto_real'] = $request->desconto_real[$index];
                    $data['desconto_perc'] = $request->desconto_perc[$index];
                    $data['subtotal'] = $request->subtotal[$index];

                    $repository = (new ProdutoVendasRepository(new ProdutoVendas))->store($data);

                    if (!$repository) {
                        throw new CustomException('Não conseguimos salvar os produtos da venda.', 430);
                    }
                }
            }

            return Response('Venda registrada com sucesso.', 200);
        } catch (CustomException $e) {
            return Response($e->getMessage(), 430);
        } catch (\Throwable $e) {
            return Response($e->getMessage(), 430);
        }
    }

    public static function find(int $id)
    {
        try {
            $repository = (new VendasRepository(new Vendas))->find($id);

            if (!$repository) {
                throw new CustomException('Não conseguimos localizar a venda.', 430);
            }

            return $repository;
        } catch (CustomException $e) {
            return Response($e->getMessage(), 430);
        } catch (\Throwable $e) {
            return Response($e->getMessage(), 430);
        }
    }
}
