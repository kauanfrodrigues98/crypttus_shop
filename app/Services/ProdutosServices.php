<?php

namespace App\Services;

use App\Exceptions\CustomException;

class ProdutosServices
{
    public static function store($request)
    {
        try {
            $dados['codigo'] = $request->codigo;
            $dados['nome'] = $request->nome;
            $dados['descricao'] = $request->descricao;
            $dados['colecao'] = $request->colecao;
            $dados['preco_compra'] = $request->preco_compra;;
            $dados['preco_venda'] = $request->preco_venda;



        } catch(CustomException $e) {
            return Response($e->getMessage(), 430);
        } catch(\Throwable $e) {
            return Response($e->getMessage(), 430);
        }
    }
}
