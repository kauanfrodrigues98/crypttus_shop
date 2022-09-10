<?php

namespace App\Services;

use App\Exceptions\CustomException;
use App\Models\User;
use App\Repository\users\UserRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserServices
{
    public static function logar($request)
    {
        try {
            $dados['usuario'] = $request->usuario;
            $dados['password'] = $request->senha;

            if(!Auth::attempt($dados)) {
                throw new CustomException('Usuário não localizado em nosso sistema.');
            }

            return Response('Login efetuado com sucesso!', 200);
        } catch(CustomException $e) {
            return Response($e->getMessage(), 430);
        } catch(\Throwable $e) {
            return Response($e->getMessage(), 430);
        }
    }

    public static function findAll()
    {
        try {
            return (new UserRepository(new User))->findAll();
        } catch(\Throwable $e) {
            return Response($e->getMessage(), 430);
        }
    }

    public static function store($request)
    {
        try {
            $dados['nome'] = $request->nome;
            $dados['email'] = $request->email;
            $dados['usuario'] = $request->usuario;
            $dados['password'] = Hash::make('123');

            $repository = (new UserRepository(new User))->store($dados);

            if(!$repository)
            {
                throw new CustomException('Não foi possível cadastrar funcionário.');
            }

            return Response('Funcionário cadastrado com sucesso.', 200);
        } catch (CustomException $e) {
            return Response($e->getMessage(), 430);
        } catch (\Throwable $e) {
            return Response($e->getMessage(), 430);
        }
    }

    public static function get($request)
    {
        try {
            $search = $request->search ?? '';

            return (new UserRepository(new User))->get($search);
        } catch (\Exception $e) {
            return Response($e->getMessage(), 430);
        }
    }
}
