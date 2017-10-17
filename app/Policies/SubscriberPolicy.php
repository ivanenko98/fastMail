<?php

namespace App\Policies;

use App\Bunch;
use App\Subscriber;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class SubscriberPolicy
{
    use HandlesAuthorization;

    public function view(User $user, Subscriber $subscriber)
    {
        if (Auth::user()->id === $subscriber->created_by){
            return true;
        }else{
            return false;
        }
    }

    public function delete(User $user, Subscriber $subscriber)
    {
        if (Auth::user()->id === $subscriber->created_by){
            return true;
        }else{
            return false;
        }
    }
}
