<?php
/**
 * Created by PhpStorm.
 * User: westham
 * Date: 13.10.2017
 * Time: 22:00
 */

namespace App\Observers;

use App\Campaign;
use Illuminate\Support\Facades\Auth;

class CampaignObserver
{
    public function creating(Campaign $campaign)
    {
        $campaign->created_by = Auth::user()->id;
        $campaign->updated_by = Auth::user()->id;
    }
    public function updating(Campaign $campaign)
    {
        $campaign->updated_by = Auth::user()->id;
    }
}