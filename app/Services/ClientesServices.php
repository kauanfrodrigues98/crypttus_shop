<?php

namespace App\Services;

use App\Exceptions\CustomException;
use App\Helpers\FuncoesHelpers;
use App\Http\Requests\UpdateClientesRequest;
use App\Models\Clientes;
use App\Repository\clientes\ClientesRepository;

class ClientesServices
{
    public static function findAll()
    {
        try {
            return (new ClientesRepository(new Clientes))->findAll();
        } catch(Exception $e) {
            return Response($e->getMessage(), $e->getCode());
        }
    }

    public static function store($request)
    {
        try {
            $dados['nome']              = $request->nome;
            $dados['email']             = $request->email;
            $dados['cpf']               = $request->cpf;
            $dados['data_nascimento']   = FuncoesHelpers::dataBRparaSQL($request->data_nascimento);
            $dados['celular']           = $request->celular;
            $dados['cep']               = $request->cep;
            $dados['logradouro']        = $request->logradouro;
            $dados['numero']            = $request->numero;
            $dados['bairro']            = $request->bairro;
            $dados['cidade']            = $request->cidade;
            $dados['uf']                = $request->uf;
            $dados['complemento']       = $request->complemento;

            $repository = ( new ClientesRepository( new Clientes ) )->store($dados);

            if(!$repository) {
                throw new CustomException('Não foi possivel cadastrar cliente.', 430);
            }

            return Response('Cliente cadastrado com sucesso.', 200);
        } catch (CustomException $e) {
            return Response($e->getMessage(), 430);
        } catch (Exception $e) {
            return Response($e->getMessage(), 430);
        }
    }

    public static function get($request)
    {
        $search = $request->search ?? '';

        return (new ClientesRepository(new Clientes()))->get($search);
    }

    public static function update(int $id, UpdateClientesRequest $request)
    {
        try {
            $dados['nome'] = $request->nome;
            $dados['email'] = $request->email;
            $dados['cpf'] = $request->cpf;
            $dados['data_nascimento'] = FuncoesHelpers::dataBRparaSQL($request->data_nascimento);
            $dados['celular'] = $request->celular;
            $dados['cep'] = $request->cep;
            $dados['logradouro'] = $request->logradouro;
            $dados['numero'] = $request->numero;
            $dados['bairro'] = $request->bairro;
            $dados['cidade'] = $request->cidade;
            $dados['uf'] = $request->uf;
            $dados['complemento'] = $request->complemento;

            $repository = (new ClientesRepository(new Clientes))->update($id, $dados);

            if (!$repository) {
                throw new CustomException('Não foi possivel atualizar dados do cliente.', 430);
            }

            return Response('Os dados de ' . $request->nome . ' foram atualizados com sucesso.', 200);
        } catch (CustomException $e) {
            return Response($e->getMessage(), 430);
        } catch (\Throwable $e) {
            return Response($e->getMessage(), 430);
        }
    }
}
