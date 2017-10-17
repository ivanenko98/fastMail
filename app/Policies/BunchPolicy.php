<?php

namespace App\Policies;

use App\Bunch;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class BunchPolicy
{
    use HandlesAuthorization;

    public function view(User $user, Bunch $bunch)
    {
        if (Auth::user()->id === $bunch->created_by){
            return true;
        }else{
            return false;
        }
    }

    public function delete(User $user, Bunch $bunch)
    {
        if (Auth::user()->id === $bunch->created_by){
            return true;
        }else{
            return false;
        }
    }
}
