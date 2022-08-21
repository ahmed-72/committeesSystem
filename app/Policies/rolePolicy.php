<?php

namespace App\Policies;

use App\Models\User;
use App\Models\role;
use Illuminate\Auth\Access\HandlesAuthorization;

class rolePolicy
{
    use HandlesAuthorization;
    public function before(User $user, $abilities) {
        if ($user->type == 'super-admin')
            return false;
    }

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
      return  $user->hasAbility('role.view');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\role  $role
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, role $role)
    {
        return  $user->hasAbility('role.view');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return  $user->hasAbility('role.add');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\role  $role
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, role $role)
    {
        return  $user->hasAbility('role.edit');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\role  $role
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, role $role)
    {
        return  $user->hasAbility('role.delete');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\role  $role
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, role $role)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\role  $role
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, role $role)
    {
        //
    }
}
