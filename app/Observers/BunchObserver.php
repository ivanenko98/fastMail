<?php
/**
 * Created by PhpStorm.
 * User: westham
 * Date: 10.10.2017
 * Time: 14:37
 */

namespace App\Observers;


use App\Bunch;
use Illuminate\Support\Facades\Auth;

class BunchObserver
{
    public function creating(Bunch $bunch)
    {
        $bunch->created_by = Auth::user()->id;
        $bunch->updated_by = Auth::user()->id;
    }
    public function updating(Bunch $bunch)
    {
        $bunch->updated_by = Auth::user()->id;
    }
}