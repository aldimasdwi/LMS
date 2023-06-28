<?php

namespace App\Policies;

use App\Models\Kelas;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class KelasPolicy
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
        return $user->status->name === 'Admin';
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Kelas  $kelas
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Kelas $kelas)
    {
    }

    /**
     * Determine whether the user can create mpodels.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Kelas  $kelas
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Kelas $kelas)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Kelas  $kelas
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Kelas $kelas)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Kelas  $kelas
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Kelas $kelas)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Kelas  $kelas
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Kelas $kelas)
    {
        //
    }
}
