<?php

namespace App\Policies;

use App\Models\CodigoGrades;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class CodigoGradesPolicy
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
            if ($value->acesso === 'adminCodigoGrade') {
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
            if ($value->acesso === 'adminCodigoGrade' || $value->acesso === 'relatorioCodigoGrade') {
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
            if ($value->acesso === 'adminCodigoGrade' || $value->acesso === 'cadastrarCodigoGrade') {
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
            if ($value->acesso === 'adminCodigoGrade' || $value->acesso === 'atualizarCodigoGrade') {
                return Response::allow();
            }
        }

        return Response::deny('Acesso negado! Fale com o seu responsável.');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\CodigoGrades $codigoGrades
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, CodigoGrades $codigoGrades)
    {
        foreach ($user->acessos as $value) {
            if ($value->acesso === 'adminCodigoGrade' || $value->acesso === 'deletarCodigoGrade') {
                return Response::allow();
            }
        }

        return Response::deny('Acesso negado! Fale com o seu responsável.');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\CodigoGrades $codigoGrades
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, CodigoGrades $codigoGrades)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\CodigoGrades $codigoGrades
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, CodigoGrades $codigoGrades)
    {
        //
    }
}
