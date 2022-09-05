<?php

namespace App\Services;

use App\Exceptions\CustomException;
use App\Helpers\FuncoesHelpers;
use App\Models\Produtos;
use App\Repository\produtos\ProdutosRepository;

class ProdutosServices
{
    public static function findAll()
    {
        try {
            return (new ProdutosRepository(new Produtos))->findAll();
        } catch (Exception $e) {
            return Response($e->getMessage(), $e->getCode());
        }
    }

    public static function store($request)
    {
        try {
            $dados['codigo'] = $request->codigo;
            $dados['nome'] = $request->nome;
            $dados['descricao'] = $request->descricao;
            $dados['colecoes_id'] = $request->colecao;
            $dados['preco_compra'] = FuncoesHelpers::moedaBRparaSQL($request->preco_compra);
            $dados['preco_venda'] = FuncoesHelpers::moedaBRparaSQL($request->preco_venda);

            $repository = (new ProdutosRepository(new Produtos()))->store($dados);

            if (!$repository) {
                throw new CustomException('Não foi possivel cadastrar produto.', 430);
            }

            return Response('Produto cadastrado com sucesso.', 200);
        } catch (CustomException $e) {
            return Response($e->getMessage(), 430);
        } catch (\Throwable $e) {
            return Response($e->getMessage(), 430);
        }
    }

    public static function get($request)
    {
        $search = $request->search ?? '';

        return (new ProdutosRepository(new Produtos))->get($search);
    }
}
