<?php

namespace App\Policies;

use App\Campaign;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class CampaignPolicy
{
    use HandlesAuthorization;

    /**
     * @param User $user
     * @param Campaign $campaign
     * @return bool
     */
    public function view(User $user, Campaign $campaign)
    {
        if (Auth::user()->id === $campaign->created_by){
            return true;
        }else{
            return false;
        }
    }

    /**
     * @param User $user
     * @param Campaign $campaign
     * @return bool
     */
    public function delete(User $user, Campaign $campaign)
    {
        if (Auth::user()->id === $campaign->created_by){
            return true;
        }else{
            return false;
        }
    }
}
