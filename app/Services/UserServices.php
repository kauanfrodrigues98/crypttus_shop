<?php

namespace App\Services;

use App\Exceptions\CustomException;
use App\Models\User;
use App\Repository\users\UserRepository;
use Illuminate\Support\Facades\Auth;

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
            return Response($e->getMessage(), $e->getCode());
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
}
