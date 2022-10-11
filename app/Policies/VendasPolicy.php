<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Vendas;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class VendasPolicy
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
            if ($value->acesso === 'adminFuncionarios') {
                return Response::allow();
            }
        }

        return Response::deny('Acesso negado! Fale com o seu responsável.');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param \App\Models\User $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user)
    {
        foreach ($user->acessos as $value) {
            if ($value->acesso === 'adminFuncionarios' || $value->acesso === 'relatorioFuncionarios') {
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
            if ($value->acesso === 'adminFuncionarios' || $value->acesso === 'cadastrarFuncionarios') {
                return Response::allow();
            }
        }

        return Response::deny('Acesso negado! Fale com o seu responsável.');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Vendas $vendas
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user)
    {
        foreach ($user->acessos as $value) {
            if ($value->acesso === 'adminFuncionarios' || $value->acesso === 'atualizarFuncionarios') {
                return Response::allow();
            }
        }

        return Response::deny('Acesso negado! Fale com o seu responsável.');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Vendas $vendas
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Vendas $vendas)
    {
        foreach ($user->acessos as $value) {
            if ($value->acesso === 'adminFuncionarios' || $value->acesso === 'deletarFuncionarios') {
                return Response::allow();
            }
        }

        return Response::deny('Acesso negado! Fale com o seu responsável.');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Vendas $vendas
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Vendas $vendas)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Vendas $vendas
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Vendas $vendas)
    {
        //
    }
}
