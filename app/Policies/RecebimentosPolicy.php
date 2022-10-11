<?php

namespace App\Policies;

use App\Models\Recebimentos;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class RecebimentosPolicy
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
            if ($value->acesso === 'adminRecebimentos') {
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
            if ($value->acesso === 'adminRecebimentos' || $value->acesso === 'relatorioRecebimentos') {
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
            if ($value->acesso === 'adminRecebimentos' || $value->acesso === 'cadastrarRecebimentos') {
                return Response::allow();
            }
        }

        return Response::deny('Acesso negado! Fale com o seu responsável.');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param \App\Models\User $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user)
    {
        foreach ($user->acessos as $value) {
            if ($value->acesso === 'adminRecebimentos' || $value->acesso === 'atualizarRecebimentos') {
                return Response::allow();
            }
        }

        return Response::deny('Acesso negado! Fale com o seu responsável.');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Recebimentos $recebimentos
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Recebimentos $recebimentos)
    {
        foreach ($user->acessos as $value) {
            if ($value->acesso === 'adminRecebimentos' || $value->acesso === 'deletarRecebimentos') {
                return Response::allow();
            }
        }

        return Response::deny('Acesso negado! Fale com o seu responsável.');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Recebimentos $recebimentos
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Recebimentos $recebimentos)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Recebimentos $recebimentos
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Recebimentos $recebimentos)
    {
        //
    }
}
