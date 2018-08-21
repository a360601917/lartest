<?php

namespace App\Policies;

use App\Models\User;
//use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy extends Policy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    function isAdmin(User $user){
      return TRUE;
    }

}
