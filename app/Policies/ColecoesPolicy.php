<?php

namespace App\Policies;

use App\Models\Colecoes;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class ColecoesPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        foreach ($user->acessos as $value) {
            if ($value->acesso === 'adminColecoes') {
                return Response::allow();
            }
        }

        return Response::deny('Acesso negado! Fale com o seu responsável.');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user)
    {
        foreach ($user->acessos as $value) {
            if ($value->acesso === 'adminColecoes' || $value->acesso === 'relatorioColecoes') {
                return Response::allow();
            }
        }

        return Response::deny('Acesso negado! Fale com o seu responsável.');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        foreach ($user->acessos as $value) {
            if ($value->acesso === 'adminColecoes' || $value->acesso === 'cadastrarColecoes') {
                return Response::allow();
            }
        }

        return Response::deny('Acesso negado! Fale com o seu responsável.');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user)
    {
        foreach ($user->acessos as $value) {
            if ($value->acesso === 'adminColecoes' || $value->acesso === 'atualizarColecoes') {
                return Response::allow();
            }
        }

        return Response::deny('Acesso negado! Fale com o seu responsável.');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Colecoes  $colecoes
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Colecoes $colecoes)
    {
        foreach ($user->acessos as $value) {
            if ($value->acesso === 'adminColecoes' || $value->acesso === 'deletarColecoes') {
                return Response::allow();
            }
        }

        return Response::deny('Acesso negado! Fale com o seu responsável.');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Colecoes  $colecoes
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Colecoes $colecoes)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Colecoes  $colecoes
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Colecoes $colecoes)
    {
        //
    }
}
