<?php

namespace App\Services;

use App\Exceptions\CustomException;
use App\Models\User;
use App\Notifications\UserNotification;
use App\Repository\users\UserRepository;
use Illuminate\Http\Request;
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

            self::notifyLogin();

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

            if (!$repository) {
                throw new CustomException('Não foi possível cadastrar funcionário.');
            }

            $id = $repository->id;

            if (!empty($request->acessos)) {
                foreach ($request->acessos as $acesso) {
                    $data['user_id'] = $id;
                    $data['acesso'] = $acesso;

                    AcessosServices::store($data);
                }
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

    public static function show(int $id)
    {
        try {
            $repository = (new UserRepository(new User))->show($id);

            if (!$repository) {
                throw new CustomException('Não conseguimos localizar o usuário solicitado.', 430);
            }

            return $repository;
        } catch (CustomException $e) {
            return Response($e->getMessage(), $e->getCode());
        } catch (\Throwable $e) {
            return Response($e->getMessage(), 430);
        }
    }

    public static function update(int $id, Request $request)
    {
        try {
            $dados['nome'] = $request->nome;
            $dados['email'] = $request->email;
            $dados['usuario'] = $request->usuario;

            $repository = (new UserRepository(new User))->update($id, $dados);

            if (!$repository) {
                throw new CustomException('Não foi possível atualizar dados do funcionário.');
            }

            AcessosServices::destroy($id);

            if (!empty($request->acessos)) {
                foreach ($request->acessos as $acesso) {
                    $data['user_id'] = $id;
                    $data['acesso'] = $acesso;

                    AcessosServices::store($data);
                }
            }

            return Response('Funcionário atualizado com sucesso.', 200);
        } catch (CustomException $e) {
            return Response($e->getMessage(), $e->getCode());
        } catch (\Throwable $e) {
            return Response($e->getMessage(), 430);
        }
    }

    private static function notifyLogin()
    {
        $user = User::find(Auth::id());
        $user->notify(new UserNotification($user));
    }
}
