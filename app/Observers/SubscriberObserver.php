<?php
/**
 * Created by PhpStorm.
 * User: westham
 * Date: 10.10.2017
 * Time: 14:40
 */

namespace App\Observers;


use App\Subscriber;
use Illuminate\Support\Facades\Auth;

class SubscriberObserver
{
    public function creating(Subscriber $subscriber)
    {
        $subscriber->created_by = Auth::user()->id;
        $subscriber->updated_by = Auth::user()->id;
    }
    public function updating(Subscriber $subscriber)
    {
        $subscriber->updated_by = Auth::user()->id;
    }
}