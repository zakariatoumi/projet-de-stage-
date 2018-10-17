<?php

namespace App\Policies;

use App\User;
use Auth;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function talkTo(User $user,User $to)
    {
        //return $user->id !== $to->id;
        if(Auth::user()->id !== $to->id) {
            return true;
        }
    
        return false;
    }
}
