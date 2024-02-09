<?php

namespace App\Policies;

use App\Models\Commentary;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class CommentaryPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    /*public function viewAny(User $user): bool
    {
        //
    }*/

    /**
     * Determine whether the user can view the model.
     */
    /*public function view(User $user, Commentary $commentary): bool
    {
        //
    }*/

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->role == 'user';
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Commentary $commentary): bool
    {
        return $commentary->user()->is($user);
    }

    /**
     * Determine whether the user can delete the model.
     */
    /*public function delete(User $user, Commentary $commentary): bool
    {
        //
    }*/

    /**
     * Determine whether the user can restore the model.
     */
    /*public function restore(User $user, Commentary $commentary): bool
    {
        //
    }*/

    /**
     * Determine whether the user can permanently delete the model.
     */
    /*public function forceDelete(User $user, Commentary $commentary): bool
    {
        //
    }*/
}
