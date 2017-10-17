<?php
/**
 * Created by PhpStorm.
 * User: westham
 * Date: 12.10.2017
 * Time: 10:21
 */

namespace App\Http\Traits;

use Illuminate\Support\Facades\Auth;

trait Owned
{
    public function scopeOwned($query)
    {
        return $query->where('created_by', '=', Auth::id());
    }
}