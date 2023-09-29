<?php

namespace App\Policies;

use App\Models\Member;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class MemberPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        //
        return $user->permisos->where('pizarra', 'members')->first()->ver;
    }

    /**
     * Determine whether the user can view the model.
     * Para que funcione el view es necesario el update también.
     */
    public function view(User $user, Member $member): bool
    {
        //
        return $user->permisos->where('pizarra', 'members')->first()->ver;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        //
        return $user->permisos->where('pizarra', 'members')->first()->editar;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Member $member): bool
    {
        //
        return $user->permisos->where('pizarra', 'members')->first()->editar;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Member $member): bool
    {
        //
        return $user->permisos->where('pizarra', 'members')->first()->borrar;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Member $member): bool
    {
        //
        return $user->permisos->where('pizarra', 'members')->first()->editar;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Member $member): bool
    {
        //
        return false;
    }
}
