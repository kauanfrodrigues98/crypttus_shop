<?php

namespace App\Services;

use App\Exceptions\CustomException;
use App\Models\Fornecedores;
use App\Repository\fornecedores\FornecedoresRepository;

class FornecedoresServices
{
    public static function findAll()
    {
        try {
            return (new FornecedoresRepository(new Fornecedores))->findAll();
        } catch (\Exception $e) {
            return Response($e->getMessage(), 430);
        }
    }

    public static function store($request)
    {
        try {
            $dados['razao_social'] = $request->razao_social;
            $dados['nome_fantasia'] = $request->nome_fantasia;
            $dados['cnpj'] = $request->cnpj;
            $dados['email'] = $request->email;
            $dados['celular'] = $request->celular;
            $dados['cep'] = $request->cep;
            $dados['logradouro'] = $request->logradouro;
            $dados['numero'] = $request->numero;
            $dados['bairro'] = $request->bairro;
            $dados['cidade'] = $request->cidade;
            $dados['uf'] = $request->uf;
            $dados['complemento'] = $request->complemento;

            $repository = (new FornecedoresRepository(new Fornecedores))->store($dados);

            if (!$repository) {
                throw new CustomException('Não foi possivel cadastrar fornecedor.', 430);
            }

            return Response('Fornecedor cadastrado com sucesso!', 200);
        } catch (CustomException $e) {
            return Response($e->getMessage(), 430);
        } catch (\Throwable $e) {
            return Response($e->getMessage(), 430);
        }
    }

    public static function get($request)
    {
        $search = $request->search ?? '';

        return (new FornecedoresRepository(new Fornecedores))->get($search);
    }
}
