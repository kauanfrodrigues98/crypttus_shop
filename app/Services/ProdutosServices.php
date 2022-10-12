<?php

namespace App\Services;

use App\Exceptions\CustomException;
use App\Helpers\FuncoesHelpers;
use App\Http\Requests\UpdateProdutosRequest;
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

    public static function getDetalhes($request)
    {
        $codigo = $request->codigo;

        return (new ProdutosRepository(new Produtos))->getDetalhes($codigo);
    }

    public static function show(int $id)
    {
        try {
            $repository = (new ProdutosRepository(new Produtos))->show($id);

            if (!$repository) {
                throw new CustomException('Não conseguimos localizar seu produto.', 430);
            }

            return $repository;
        } catch (CustomException $e) {
            return Response($e->getMessage(), 430);
        } catch (\Throwable $e) {
            return Response($e->getMessage(), 430);
        }
    }

    public static function localizarProduto($request)
    {
        try {
            $codigo = $request->localizar_produto ?? '';

            $repository = (new ProdutosRepository(new Produtos))->localizarProduto($codigo);

            if (!$repository) {
                throw new CustomException('Não foi possivel localizar o produto informado.', 430);
            }

            return $repository->id;
        } catch (CustomException $e) {
            return Response($e->getMessage(), 430);
        }
    }

    public static function update(int $id, UpdateProdutosRequest $request)
    {
        try {
            $dados['codigo'] = $request->codigo;
            $dados['nome'] = $request->nome;
            $dados['descricao'] = $request->descricao;
            $dados['colecoes_id'] = $request->colecao;
            $dados['preco_compra'] = FuncoesHelpers::moedaBRparaSQL($request->preco_compra);
            $dados['preco_venda'] = FuncoesHelpers::moedaBRparaSQL($request->preco_venda);

            $repository = (new ProdutosRepository(new Produtos()))->update($id, $dados);

            if (!$repository) {
                throw new CustomException('Não foi possivel atualizar o produto.', 430);
            }

            return Response('O produto ' . $request->nome . ' foi atualizado com sucesso!', 200);
        } catch (CustomException $e) {
            return Response($e->getMessage(), 430);
        } catch (\Throwable $e) {
            return Response($e->getMessage(), 430);
        }
    }
}
