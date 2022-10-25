<?php

namespace App\Policies;

use App\Models\Medicine;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Gate;
use Illuminate\Auth\Access\Response;

class MedicinePolicy
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
        return true;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Medicine  $medicine
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Medicine $medicine)
    {
        return $user->id == $medicine->user_id
        ?Response::allow()
        :Response::deny('You don not have access to this resource');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return true
        ?Response::allow()
        :Response::deny('You don not have access to this resource');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Medicine  $medicine
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Medicine $medicine)
    {
        return $user->id == $medicine->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Medicine  $medicine
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Medicine $medicine)
    {
        return $user->id == $medicine->user_id;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Medicine  $medicine
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Medicine $medicine)
    {
        return $user->id == $medicine->user_id;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Medicine  $medicine
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Medicine $medicine)
    {
        //
    }
}
