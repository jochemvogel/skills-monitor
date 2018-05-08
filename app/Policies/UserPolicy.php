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
        if($user->role_id === $model->role_id){
            return true;
        }elseif($user->role_id < 4){
            return true;
        }else{
            return false;
        }
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
        // check if the user wants to edit himself
        if($model->id === $user->id){
            return true;
        // check if current user is an admin
        }elseif($user->role_id === DB::table('roles')->where('name', '=', 'admin')->pluck('id')->first()){
            // make sure the current user can't change another admin
            if($model->role_id === DB::table('roles')->where('name', '=', 'admin')->pluck('id')->first()) {
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
        // check if current user is an admin
        if($user->role_id === DB::table('roles')->where('name', '=', 'admin')->pluck('id')->first()){
            // make sure the current user can't delete an other admin
            if($model->role_id === DB::table('roles')->where('name', '=', 'admin')->pluck('id')->first()){
                return false;
            }else{
                return true;
            }
        // check if the current user is a teacher
        }elseif($user->role_id === DB::table('roles')->where('name', '=', 'teacher')->pluck('id')->first()) {
            // check if the user has an higher role
            if($user->role_id < $model->role_id){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }
}
