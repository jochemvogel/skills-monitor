<?php

namespace App\Policies;

use App\User;
use App\Rubrics;
use Illuminate\Auth\Access\HandlesAuthorization;

class RubricsPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the rubrics.
     *
     * @param  \App\User  $user
     * @param  \App\Rubrics  $rubrics
     * @return mixed
     */
    public function view(User $user, Rubrics $rubrics)
    {
        return true;
    }

    /**
     * Determine whether the user can create rubrics.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        if($user->role_id === 1){
            return true;
        }elseif($user->role_id === 2){
            return true;
        }else{
            return false;
        }
    }

    /**
     * Determine whether the user can update the rubrics.
     *
     * @param  \App\User  $user
     * @param  \App\Rubrics  $rubrics
     * @return mixed
     */
    public function update(User $user, Rubrics $rubrics)
    {
        if($user->role_id === 1){
            return true;
        }elseif($user->role_id === 2){
            return true;
        }else{
            return false;
        }
    }

    /**
     * Determine whether the user can delete the rubrics.
     *
     * @param  \App\User  $user
     * @param  \App\Rubrics  $rubrics
     * @return mixed
     */
    public function delete(User $user, Rubrics $rubrics)
    {
        if($user->role_id === 1){
            return true;
        }elseif($user->role_id === 2){
            return true;
        }else{
            return false;
        }
    }
}
