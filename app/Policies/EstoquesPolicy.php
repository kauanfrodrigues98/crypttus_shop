<?php

namespace App\Policies;

use App\Models\Estoques;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class EstoquesPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param \App\Models\User $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        foreach ($user->acessos as $value) {
            if ($value->acesso === 'adminEstoque') {
                return Response::allow();
            }
        }

        return Response::deny('Acesso negado! Fale com o seu responsável.');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Estoques $estoques
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Estoques $estoques)
    {
        foreach ($user->acessos as $value) {
            if ($value->acesso === 'adminEstoque' || $value->acesso === 'relatorioEstoque') {
                return Response::allow();
            }
        }

        return Response::deny('Acesso negado! Fale com o seu responsável.');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param \App\Models\User $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        foreach ($user->acessos as $value) {
            if ($value->acesso === 'adminEstoque' || $value->acesso === 'cadastrarEstoque') {
                return Response::allow();
            }
        }

        return Response::deny('Acesso negado! Fale com o seu responsável.');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Estoques $estoques
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Estoques $estoques)
    {
        foreach ($user->acessos as $value) {
            if ($value->acesso === 'adminEstoque' || $value->acesso === 'atualizarEstoque') {
                return Response::allow();
            }
        }

        return Response::deny('Acesso negado! Fale com o seu responsável.');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Estoques $estoques
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Estoques $estoques)
    {
        foreach ($user->acessos as $value) {
            if ($value->acesso === 'adminEstoque' || $value->acesso === 'deletarEstoque') {
                return Response::allow();
            }
        }

        return Response::deny('Acesso negado! Fale com o seu responsável.');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Estoques $estoques
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Estoques $estoques)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Estoques $estoques
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Estoques $estoques)
    {
        //
    }
}
