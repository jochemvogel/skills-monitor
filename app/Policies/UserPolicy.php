<?php

namespace App\Policies;

use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\User  $model
     * @return mixed
     */
    public function view(User $user, User $model)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\User  $model
     * @return mixed
     */
    public function update(User $user, User $model)
    {
        // check if current user is an admin
        if($user->role_id === DB::table('roles')->where('name', '=', 'admin')->pluck('id')->first()){
            // make sure the current user can't change an other admin
            if($model->role_id === DB::table('roles')->where('name', '=', 'admin')->pluck('id')->first()){
                return false;
            }else{
                return true;
            }
        // check if the current user is a teacher
        }elseif($user->role_id === DB::table('roles')->where('name', '=', 'teacher')->pluck('id')->first()){
            // make sure the current user can't change an admin
            if($model->role_id === DB::table('roles')->where('name', '=', 'admin')->pluck('id')->first()){
                return false;
            // make sure the current user can't change an other teacher
            }elseif($model->role_id === DB::table('roles')->where('name', '=', 'teacher')->pluck('id')->first()){
                return false;
            }else{
                return true;
            }
        }else{
            return false;
        }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\User  $model
     * @return mixed
     */
    public function delete(User $user, User $model)
    {
        //
    }
}